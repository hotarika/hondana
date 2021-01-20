<template>
    <div class="p-registerBooks">
        <h1 class="c-h1__head">私の本棚</h1>
        <div class="c-form__search">
            <input type="text" v-model="search" />
            <button type="">
                <i class="fas fa-search"></i>
            </button>
            <select name="star" id="" v-model="star">
                <option value="0">★の数で選択</option>
                <option value="1">★１以上</option>
                <option value="2">★２以上</option>
                <option value="3">★３以上</option>
                <option value="4">★４以上</option>
                <option value="5">★５以上</option>
            </select>
            <select
                name="latest_date"
                id=""
                v-model="latestDate"
                @change="sortBooks"
            >
                <option value="0">新しい順</option>
                <option value="1">古い順</option>
            </select>
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
            star: 0,
            latestDate: 0,
            books: []
        };
    },
    methods: {
        sortBooks() {
            // 並び替え
            if (this.latestDate == 0) {
                this.books = this.books.slice().sort((a, b) => {
                    if (a.updated_at < b.updated_at) return -1;
                    if (a.updated_at > b.updated_at) return 1;
                    return 0;
                });
            } else {
                this.books = this.books.slice().sort((a, b) => {
                    if (a.updated_at > b.updated_at) return -1;
                    if (a.updated_at < b.updated_at) return 1;
                    return 0;
                });
            }
        }
    },
    computed: {
        showBooks() {
            const regexp = new RegExp(this.search.trim(), 'i'); // i = 大小区別しない
            const that = this;

            // フィルター
            return this.books
                .slice()
                .reverse()
                .filter(el => {
                    if (
                        !el.title.match(regexp) &&
                        !el.authors.match(regexp) &&
                        !el.description.match(regexp)
                    ) {
                        return;
                    }

                    if (el.star < Number(that.star)) {
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
