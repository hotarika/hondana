<template>
    <div class="p-bookDetail">
        <div class="p-bookDetail__buttonWrap">
            <button class="p-bookDetail__button -edit">
                <i class="fas fa-edit"></i>
                編集
            </button>
            <button
                class="p-bookDetail__button -delete"
                @click.prevent="deleteBook(book.id)"
            >
                <i class="fas fa-trash-alt"></i>
                削除
            </button>
        </div>
        <h1 class="c-h1__head">
            <i class="fas fa-bookmark"></i>{{ book.title }}
        </h1>
        <div class="p-bookDetail__bookAllInfoWrap">
            <div
                class="c-bookImageWrap p-bookDetail__bookImageWrap"
                @click.prevent="googlePreview(book.preview_link)"
            >
                <img
                    v-if="true"
                    class="c-bookImage p-bookDetail__bookImage"
                    :src="book.image"
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
            <div class="p-bookDetail__bookInfoWrap">
                <div class="p-bookDetail__nameWrap">
                    <div class="p-bookDetail__nameHead">著者</div>
                    <div class="p-bookDetail__name">{{ book.author }}</div>
                </div>
                <div class="p-bookDetail__readDateWrap">
                    <div class="p-bookDetail__readDateHead">読了日</div>
                    <div class="p-bookDetail__readDate">{{ book.read_at }}</div>
                </div>
                <div class="p-bookDetail__starRating">
                    <star-rating
                        v-model="rating"
                        :star-size="20"
                        :show-rating="false"
                        :read-only="true"
                    ></star-rating>
                </div>
            </div>
        </div>
        <div
            class="p-bookDetail__overviewWrap"
            v-if="book.description !== null"
        >
            <div class="p-bookDetail__overviewHead">概要</div>
            <div class="p-bookDetail__overview">{{ book.description }}</div>
        </div>

        <div class="p-bookDetail__memoWrap">
            <div class="p-bookDetail__memoHead">
                <i class="fas fa-pen"></i>読書メモ
            </div>
            <pre class="p-bookDetail__memo">{{ book.memo }}</pre>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import StarRating from 'vue-star-rating';

export default {
    components: {
        StarRating
    },
    props: {
        publicPath: String,
        book: Object
    },
    data() {
        return {
            search: '',
            books: [],
            rating: this.book.star
        };
    },
    methods: {
        googlePreview(url) {
            window.location.href = url;
        },
        deleteBook(book_id) {
            confirm('削除してもよろしいですか？');

            axios
                .delete(this.publicPath + 'bookshelf/' + book_id)
                .then(res => {
                    // const index = this.books.indexOf(emit);
                    // this.books.splice(index, 1);
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });

            window.location.href = this.publicPath + 'bookshelf';
        }
    },
    computed: {
        // showBooks() {
        // const regexp = new RegExp(this.search.trim(), 'i'); // i = 大小区別しない
        // // 取得
        // return this.books.filter(el => {
        //     if (
        //         !el.title.match(regexp) &&
        //         !el.authors.match(regexp) &&
        //         !el.description.match(regexp)
        //     ) {
        //         return;
        //     }
        //     return el;
        // });
        // }
    },
    mounted() {
        // axios
        //     .get(this.publicPath + 'async/bookshelf')
        //     .then(res => {
        //         // console.log(res);
        //         this.books = res.data;
        //     })
        //     .catch(err => {
        //         console.log(err);
        //     });
    }
};
</script>
