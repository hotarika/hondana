<template>
    <div class="p-bookDetail">
        <div class="p-bookDetail__buttonWrap">
            <!-- 編集・確定 -->
            <button
                v-if="editMode === false"
                class="p-bookDetail__button -edit"
                @click.prevent="editMode = true"
            >
                <i class="fas fa-edit"></i>
                編集
            </button>
            <button
                v-if="editMode === true"
                class="p-bookDetail__button -editDone"
                @click.prevent="editDone"
            >
                <i class="fas fa-edit"></i>
                確定
            </button>

            <!-- 削除 -->
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
                    <div
                        class="p-bookDetail__readDateHead"
                        :class="{ '-edit': editMode }"
                    >
                        読了日
                    </div>

                    <div
                        v-if="editMode === false"
                        class="p-bookDetail__readDate"
                        :class="{ '-edit': editMode }"
                    >
                        {{ readDate }}
                    </div>
                    <input
                        class="p-bookDetail__readDate"
                        v-if="editMode === true"
                        v-model="readDate"
                        type="date"
                        name=""
                        id=""
                    />
                </div>
                <div class="p-bookDetail__starRating">
                    <star-rating
                        v-model="rating"
                        :star-size="20"
                        :show-rating="false"
                        :read-only="starReadOnly"
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
            <textarea
                class="p-bookDetail__memo -textarea"
                v-if="editMode"
                name=""
                id=""
                cols="30"
                rows="10"
                v-model="memo"
            ></textarea>
            <pre class="p-bookDetail__memo -pre" v-if="!editMode">{{
                book.memo
            }}</pre>
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
            editMode: true,
            rating: this.book.star,
            memo: this.book.memo,
            readDate: this.read_at
        };
    },
    methods: {
        googlePreview(url) {
            window.location.href = url;
        },
        editDone() {
            this.editMode = false;
            console.log('a');

            // DBへ保存
            axios
                .put(this.publicPath + 'bookshelf/' + this.book.id, {
                    star: this.rating,
                    read_at: this.readDate,
                    memo: this.memo
                })
                .then(res => {
                    console.log(res);
                });
        },
        deleteBook(book_id) {
            confirm('削除してもよろしいですか？');

            axios
                .delete(this.publicPath + 'bookshelf/' + book_id)
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });

            window.location.href = this.publicPath + 'bookshelf';
        }
    },
    computed: {
        starReadOnly() {
            return this.editMode ? false : true;
        }
    }
};
</script>
