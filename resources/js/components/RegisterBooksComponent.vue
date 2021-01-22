<template>
    <div class="p-registerBooks">
        <h1 class="c-h1__head">
            <i class="fas fa-bookmark"></i>本棚に登録
            <a href="https://books.google.co.jp/">
                <img
                    class="p-registerBooks__googlePoweredbyLogo"
                    :src="publicPath + 'image/poweredby.png'"
                    alt=""
                />
            </a>
        </h1>
        <form class="c-form__search">
            <input type="text" v-model="search" placeholder="書籍を検索する" />
            <button type="submit" @click.prevent="searchBooks">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <div class="p-registerBooks__cards">
            <template v-for="(book, i) of books">
                <!-- カード -->
                <div class="p-registerBooks__card" :key="book.id">
                    <!-- カード上部 -->
                    <div class="p-registerBooks__upper">
                        <div
                            id="js-showAllText"
                            class="p-registerBooks__bookTitle"
                            @mouseover="hoverText(i)"
                            @mouseleave="leaveText(i)"
                        >
                            {{ book.volumeInfo.title }}
                        </div>
                        <div
                            :id="`js-toolTip${i}`"
                            class="p-registerBooks__toolTip"
                        >
                            {{ book.volumeInfo.title }}
                        </div>
                        <button
                            type="submit"
                            class="p-registerBooks__registerButton"
                            @click.prevent="registerBook(book)"
                        >
                            <span class="u-sp-none">本棚に</span>追加
                        </button>
                    </div>

                    <!-- カード下部 -->
                    <div class="p-registerBooks__lower">
                        <div
                            class="p-registerBooks__bookImageWrap"
                            :class="{ '-noImage': !book.volumeInfo.imageLinks }"
                            @click.prevent="
                                googlePreview(book.volumeInfo.previewLink)
                            "
                        >
                            <img
                                v-if="book.volumeInfo.imageLinks"
                                class="p-registerBooks__bookImage"
                                :src="book.volumeInfo.imageLinks.thumbnail"
                                alt=""
                            />
                            <img
                                v-else
                                class="p-registerBooks__bookImage -noImage"
                                :src="publicPath + 'image/no-image.png'"
                                alt="no"
                            />
                            <img
                                class="p-registerBooks__googlePreviewLogo"
                                :src="publicPath + 'image/gbs_preview.gif'"
                                alt=""
                            />
                        </div>
                        <div class="p-registerBooks__bookInfoWrap">
                            <div class="p-registerBooks__authorWrap">
                                <div class="p-registerBooks__authorHead">
                                    著者
                                </div>
                                <div
                                    class="p-registerBooks__authorName"
                                    v-if="book.volumeInfo.authors"
                                >
                                    {{ book.volumeInfo.authors[0] }}
                                </div>
                            </div>
                            <div class="p-registerBooks__descWrap">
                                <div class="p-registerBooks__descHead">
                                    概要
                                </div>
                                <div class="p-registerBooks__descText">
                                    {{ book.volumeInfo.description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
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
        registerBook(book) {
            console.log(book);
            // DBへ保存
            axios
                .post(this.publicPath + 'bookshelf', {
                    book_id: book.id,
                    title: book.volumeInfo.title,
                    author:
                        book.volumeInfo.authors === undefined
                            ? null
                            : book.volumeInfo.authors[0],
                    published_date:
                        book.volumeInfo.publishedDate === undefined
                            ? null
                            : book.volumeInfo.publishedDate,
                    description:
                        book.volumeInfo.description === undefined
                            ? null
                            : book.volumeInfo.description,
                    image:
                        book.volumeInfo.imageLinks === undefined
                            ? null
                            : book.volumeInfo.imageLinks.thumbnail,
                    preview_link:
                        book.volumeInfo.previewLink === undefined
                            ? null
                            : book.volumeInfo.previewLink
                })
                .then(res => {
                    console.log(res);
                });
        },
        hoverText(i) {
            console.log(i);
            const toolTipTag = document.getElementById(`js-toolTip${i}`);
            toolTipTag.style.opacity = '1';
            toolTipTag.style.visibility = 'visible';
            toolTipTag.style.transitionDelay = '0.5s';
        },
        leaveText(i) {
            const toolTipTag = document.getElementById(`js-toolTip${i}`);
            toolTipTag.style.opacity = '0';
            toolTipTag.style.visibility = 'hidden';
            toolTipTag.style.transitionDelay = '0s';
        },
        googlePreview(url) {
            this.search = '';
            window.location.href = url;
        }
    }
};
</script>

<style></style>
