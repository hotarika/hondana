<template>
    <div class="p-registerBooks">
        <h1 class="c-h1__head">
            <i class="fas fa-bookmark"></i>本棚に登録
            <a href="https://books.google.co.jp/"> </a>
        </h1>
        <form class="c-form__searchSection">
            <div class="c-form__searchBoxWrap">
                <input
                    class="c-form__searchInput"
                    type="text"
                    v-model="search"
                    placeholder="書籍を検索する"
                />
                <button
                    class="c-form__searchBtn"
                    type="submit"
                    @click.prevent="searchBooks"
                >
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="p-registerBooks__cards">
            <template v-for="(book, i) of books">
                <!-- カード -->
                <register-book-card-component
                    :book="book"
                    :i="i"
                    :public-path="publicPath"
                    :key="book.id"
                    @removeSearchBoxText="removeSearchBoxText"
                ></register-book-card-component>
            </template>
        </div>
        <img
            class="p-registerBooks__googlePoweredbyLogo"
            :src="publicPath + 'image/poweredby.png'"
            alt=""
        />
        <div class="p-registerBooks__noBooksMsg" v-if="this.books === ''">
            書籍を検索して、読んだ本を追加しましょう！
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        publicPath: String,
        myShelf: Array
    },
    data() {
        return {
            search: '',
            books: ''
        };
    },
    methods: {
        searchBooks() {
            // inputの空欄削除
            this.search = this.search.trim();

            // Google Books API 取得
            axios
                .get(
                    `https://www.googleapis.com/books/v1/volumes?q=${this.search}`
                )
                .then(res => {
                    const newData = [];

                    res.data.items.forEach(googleBook => {
                        // forEachは最後まで回すのに対し、someはreturnが返れば次のループへ行く
                        this.myShelf.some(myBook => {
                            if (googleBook.id === myBook.book_id) {
                                return (googleBook['registration'] = true);
                            }
                        });
                        return newData.push(googleBook);
                    });

                    console.log(newData);
                    this.books = newData;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        removeSearchBoxText() {
            this.search = '';
        }
    }
};
</script>

<style></style>
