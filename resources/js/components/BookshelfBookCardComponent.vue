<template>
    <div class="p-myBooks__card">
        <!-- 上部 -->
        <div class="p-myBooks__upper">
            <div class="p-myBooks__bookTitle">{{ book.title }}</div>
        </div>
        <!-- 下部 -->
        <div class="p-myBooks__lower">
            <div class="p-myBooks__bookImageWrap">
                <img class="p-myBooks__bookImage" :src="book.image" alt="" />
            </div>
            <div class="p-myBooks__bookInfoWrap">
                <div class="p-myBooks__authorWrap">
                    <div class="p-myBooks__authorHead">
                        著者
                    </div>
                    <div class="p-myBooks__authorName">{{ book.author }}</div>
                </div>
                <div class="p-myBooks__readDateWrap">
                    <div class="p-myBooks__readDateHead">
                        読了日
                    </div>
                    <div class="p-myBooks__readDate">
                        {{ readDate(book.read_at) }}
                    </div>
                </div>
                <div class="p-myBooks__starWrap">
                    <star-rating
                        :star-size="20"
                        :show-rating="false"
                        active-color="#FFBA00"
                    ></star-rating>
                </div>
                <div class="p-myBooks__functionIconsWrap">
                    <a href="">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="" @click.prevent="deleteBook">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating';

export default {
    components: {
        StarRating
    },
    props: {
        book: Object,
        publicPath: String
    },
    methods: {
        deleteBook() {
            confirm('削除してもよろしいですか？');
            this.$emit('delete-book', this.book);
        }
    },
    computed: {
        readDate() {
            return function(date) {
                if (date === null) {
                    return '読書中';
                } else {
                    const readDate = new Date(date);
                    const y = readDate.getFullYear();
                    const m = readDate.getMonth() + 1;
                    const d = readDate.getDate();
                    console.log(y + '/' + m + '/' + d);

                    return y + '-' + m + '-' + d;
                }
            };
        }
    }
};
</script>
