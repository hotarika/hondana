<template>
    <div class="">
        <h1 class="c-h1__head">
            <i class="fas fa-bookmark"></i>読書グラフ（直近１年間）
        </h1>
        <div class="graph-wrap">
            <chart
                :labels="chartLabels"
                :public-path="publicPath"
                :graphData="graphData"
            ></chart>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Chart from './Chart';

export default {
    components: {
        Chart
    },
    props: {
        publicPath: String
    },
    data() {
        return {
            graphData: [],
            max: 12, // 繰り返し回数
            interval: -1 // 月の表示する間隔
        };
    },
    computed: {
        chartLabels() {
            // チャートラベルは、先にデータを取得してChart.vueに渡しているため、子ではなく親コンポーネントであるここに記述している
            const labels = [];
            const dt = new Date(); // 今日の日付

            // 今月より来月の日数が少ない場合に、グラフに次の月が表示される不具合あり

            dt.setMonth(dt.getMonth() + 1); // 今月を含める

            for (let i = 1; i <= this.max; i++) {
                const m =
                    dt.getMonth(dt.setMonth(dt.getMonth() + this.interval)) + 1;
                const y = dt.getFullYear();

                if (m === 1 || i === this.max) {
                    labels.unshift(y + '/' + m);
                } else {
                    labels.unshift(m);
                }
            }
            console.log(labels);
            return labels;
        },
        refLabels() {
            const labels = [];
            const dt = new Date(); // 今日の日付

            // 今月より来月の日数が少ない場合に、グラフに次の月が表示される不具合あり

            dt.setMonth(dt.getMonth() + 1); // 今月を含める

            for (let i = 1; i <= this.max; i++) {
                const m = (
                    '0' +
                    (dt.getMonth(dt.setMonth(dt.getMonth() + this.interval)) +
                        1)
                ).slice(-2);
                const y = dt.getFullYear();

                labels.unshift(y + '/' + m);
            }
            console.log(labels);
            return labels;
        }
    },
    mounted() {
        // 読書数
        axios
            .get(this.publicPath + 'async/booksnum')
            .then(res => {
                // const chartLabels = this.chartLabels;
                const refLabels = this.refLabels;
                const chartData = res.data;
                const insertData = [];
                console.log(res.data);

                refLabels.forEach((label, i) => {
                    insertData[i] = 0; // 合致しなければ0冊
                    chartData.some(data => {
                        if (label == data.read_at) {
                            insertData[i] = data.count;
                            console.log(insertData);
                            return true;
                        }
                    });
                });

                this.graphData = insertData;
            })
            .catch(err => {
                console.log(err);
            });
    }
};
</script>

<style scoped>
.graph-wrap {
    margin-top: 20px;
    background-color: white;
    padding: 20px;
}
</style>
