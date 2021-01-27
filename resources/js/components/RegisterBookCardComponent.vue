<template>
    <div class="p-registerBooks__card">
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
            <div :id="`js-toolTip${i}`" class="p-registerBooks__toolTip">
                {{ book.volumeInfo.title }}
            </div>
            <button
                type="submit"
                class="p-registerBooks__registerButton"
                :class="{
                    'is-active': this.isDone
                }"
                @click.prevent="registerBook(book)"
                :disabled="this.isDone"
            >
                追加<span
                    class="p-registerBooks__buttonDone"
                    :class="{
                        'is-active': this.isDone
                    }"
                    >済み</span
                >
            </button>
        </div>

        <!-- カード下部 -->
        <div
            class="p-registerBooks__lower"
            :class="{ '-noImage': !book.volumeInfo.imageLinks }"
        >
            <div
                class="c-card__publishedDate p-registerBooks__publishedDate"
                v-if="book.volumeInfo.publishedDate"
            >
                出版日：{{ book.volumeInfo.publishedDate }}
            </div>
            <div
                class="c-bookImageWrap p-registerBooks__bookImageWrap"
                :class="{ '-noImage': !book.volumeInfo.imageLinks }"
                @click.prevent="googlePreview(book.volumeInfo.previewLink)"
            >
                <img
                    v-if="book.volumeInfo.imageLinks"
                    class="c-bookImage p-registerBooks__bookImage"
                    :src="book.volumeInfo.imageLinks.thumbnail"
                    alt=""
                />
                <img
                    v-else
                    class="c-bookImage p-registerBooks__bookImage -noImage"
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
                    <div class="c-card__headTag">
                        著者名
                    </div>
                    <div
                        class="p-registerBooks__authorName"
                        v-if="book.volumeInfo.authors"
                    >
                        {{ book.volumeInfo.authors[0] }}
                    </div>
                </div>
                <div class="p-registerBooks__descWrap">
                    <div class="c-card__headTag">
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

<script>
import axios from 'axios';

export default {
    props: {
        book: Object,
        i: Number,
        publicPath: String
    },
    data() {
        return {
            isDone: this.book.registration === undefined ? false : true
        };
    },
    methods: {
        registerBook(book) {
            console.log(book);
            this.isDone = true; // ボタンを「追加」から「追加済み」に変更

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
            window.location.href = url;
            this.$emit('removeSearchBoxText');
        }
    }
};
</script>
