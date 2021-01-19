<template>
    <div class="p-registerBooks">
        <h1 class="c-h1__head">こんにちは</h1>
        <form action="" class="c-form__search">
            <input type="text" v-model="search" />
            <button type="submit" @click.prevent="searchBooks">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <div class="p-registerBooks__cards">
            <div class="p-registerBooks__card">
                <template v-for="book of books">
                    <div :key="book.id">{{ book }}</div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            search: '',
            books: '',
            sample: []
        };
    },
    methods: {
        searchBooks() {
            // 取得
            axios
                .get(
                    `https://www.googleapis.com/books/v1/volumes?q=${this.search}`
                )
                .then(res => {
                    console.log(res);
                    this.books = res.data.items;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    mounted() {
        for (let step = 0; step < 5; step++) {
            axios
                .get(
                    `https://www.googleapis.com/books/v1/volumes?q=isbn:9784033213002`
                )
                .then(res => {
                    console.log(step);
                    console.log(res);
                    this.sample[step] = res.data.items[0];
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
