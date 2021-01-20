<template>
    <div class="p-registerBooks">
        <h1 class="c-h1__head">私の本棚</h1>

        <star-rating v-model="rating" :read-only="true"></star-rating>
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
            rating: 5
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
