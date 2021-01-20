<template>
    <div class="p-registerBooks">
        <h1 class="c-h1__head">私の本棚</h1>
        <div class="c-form__search">
            <input type="text" v-model="search" />
            <button type="">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="p-registerBooks__cards">
            <div class="p-registerBooks__card">
                <template v-for="book of showBooks">
                    <div :key="book.id">{{ book }}</div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        publicPath: String
    },
    data() {
        return {
            search: '',
            books: []
        };
    },
    methods: {
        //
    },
    computed: {
        showBooks() {
            const regexp = new RegExp(this.search.trim(), 'i'); // i = 大小区別しない
            // 取得
            return this.books.filter(el => {
                if (
                    !el.title.match(regexp) &&
                    !el.authors.match(regexp) &&
                    !el.description.match(regexp)
                ) {
                    return;
                }
                return el;
            });
        }
    },
    mounted() {
        axios
            .get(this.publicPath + 'async/bookshelf')
            .then(res => {
                // console.log(res);
                this.books = res.data;
            })
            .catch(err => {
                console.log(err);
            });
    }
};
</script>
