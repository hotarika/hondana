<template>
    <div class="p-bookDetail">
        <div class="p-bookDetail__buttonWrap">
            <button class="p-bookDetail__button -edit">
                <i class="fas fa-edit"></i>
                編集
            </button>
            <button class="p-bookDetail__button -delete">
                <i class="fas fa-trash-alt"></i>
                削除
            </button>
        </div>
        <h1 class="c-h1__head">
            <i class="fas fa-bookmark"></i>書籍のタイトルが入ります
        </h1>
        <div class="p-bookDetail__bookAllInfoWrap">
            <div class="c-bookImageWrap p-bookDetail__bookImageWrap">
                <img
                    v-if="true"
                    class="c-bookImage p-bookDetail__bookImage"
                    src="http://books.google.com/books/content?id=rtffDQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api"
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
                    <div class="p-bookDetail__name">山田太郎</div>
                </div>
                <div class="p-bookDetail__readDateWrap">
                    <div class="p-bookDetail__readDateHead">読了日</div>
                    <div class="p-bookDetail__readDate">2021/01/25</div>
                </div>
                <div class="p-bookDetail__starRating">
                    <star-rating
                        v-model="rating"
                        :star-size="20"
                        :show-rating="false"
                    ></star-rating>
                </div>
            </div>
        </div>
        <div class="p-bookDetail__overviewWrap">
            <div class="p-bookDetail__overviewHead">概要</div>
            <div class="p-bookDetail__overview">
                十年ぶりに再会した美月は、男の姿をしていた。彼女から、殺人を告白された哲朗は、美月の親友である妻とともに、彼女をかくまうが…。十年という歳月は、かつての仲間たちを、そして自分を、変えてしまったのだろうか。過ぎ去った青春の日々を裏切るまいとする仲間たちを描いた、傑作長篇ミステリー。
            </div>
        </div>

        <div class="p-bookDetail__memoWrap">
            <div class="p-bookDetail__updateDateWrap">
                <div class="p-bookDetail__updateHead">更新日</div>
                <div class="p-bookDetail__updateDate">2021/01/25</div>
            </div>
            <div class="p-bookDetail__memoHead">読書メモ</div>
            <pre class="p-bookDetail__memo">ああああ</pre>
        </div>
    </div>
</template>

<script>
// import axios from 'axios';
import StarRating from 'vue-star-rating';

export default {
    components: {
        StarRating
    },
    props: {
        publicPath: String,
        book: Array
    },
    data() {
        return {
            search: '',
            books: [],
            rating: this.book.star
        };
    },
    methods: {
        //
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
