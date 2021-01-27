<template>
    <div class="p-myBooks__card">
        <!-- 上部 -->
        <div class="p-myBooks__upper">
            <div
                :id="`js-toolTip${i}`"
                class="c-card__toolTip p-myBooks__toolTip"
            >
                {{ book.title }}
            </div>
            <div
                class="p-myBooks__bookTitle"
                @mouseover="hoverText(i)"
                @mouseleave="leaveText(i)"
            >
                {{ book.title }}
            </div>
        </div>
        <!-- 下部 -->
        <div class="p-myBooks__lower">
            <div
                class="c-card__publishedDate p-myBooks__publishedDate"
                v-if="book.published_date"
            >
                出版日：{{ book.published_date }}
            </div>
            <div
                class="c-bookImageWrap p-myBooks__bookImageWrap"
                :class="{ '-noImage': !book.image }"
            >
                <img
                    v-if="book.image"
                    class="c-bookImage p-myBooks__bookImage"
                    :src="book.image"
                    alt=""
                />
                <img
                    v-else
                    class="c-bookImage -noImage"
                    :src="publicPath + 'image/no-image.png'"
                    alt="no"
                />
            </div>
            <div class="p-myBooks__bookInfoWrap">
                <div class="p-myBooks__authorWrap">
                    <div class="c-card__headTag">
                        著者名
                    </div>
                    <div class="p-myBooks__authorName">{{ book.author }}</div>
                </div>
                <div class="p-myBooks__readDateWrap">
                    <div class="c-card__headTag">
                        読了日
                    </div>
                    <div class="p-myBooks__readDate">
                        {{ readDate(book.read_at) }}
                    </div>
                </div>
                <div class="p-myBooks__starWrap">
                    <star-rating
                        v-model="rating"
                        :star-size="20"
                        :show-rating="false"
                        active-color="#FFBA00"
                        :read-only="true"
                    ></star-rating>
                </div>
            </div>
        </div>
        <div class="p-myBooks__functionIconsWrap">
            <a :href="publicPath + 'bookshelf/' + book.id + '?edit=true'">
                <i class="fas fa-edit"></i>
            </a>
            <a href="" @click.prevent="deleteBook">
                <i class="fas fa-trash-alt"></i>
            </a>
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
        publicPath: String,
        i: Number
    },
    data() {
        return {
            rating: this.book.star
        };
    },
    methods: {
        deleteBook() {
            if (confirm('削除してもよろしいですか？')) {
                this.$emit('delete-book', this.book);
            }
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
