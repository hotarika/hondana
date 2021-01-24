<script>
import { Bar } from 'vue-chartjs';
import axios from 'axios';

export default {
    extends: Bar,
    name: 'chart',
    props: {
        labels: Array,
        publicPath: String
    },
    data() {
        return {
            data: {
                labels: this.labels, // 親からラベルを取得
                datasets: [
                    {
                        label: '読書数',
                        data: [],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true,
                                stepSize: 3
                            }
                        }
                    ]
                }
            }
        };
    },
    mounted() {
        // 読書数
        axios
            .get(this.publicPath + 'async/booksnum')
            .then(res => {
                const chartLabels = this.labels;
                const chartData = res.data;
                const insertData = [];
                chartLabels.forEach((label, i) => {
                    insertData[i] = 0;
                    chartData.some(data => {
                        if (label == data.read_at) {
                            insertData[i] = data.count;
                            return true;
                        }
                    });
                });
                // データ挿入
                this.data.datasets[0].data = insertData;
                // render
                this.renderChart(this.data, this.options);
            })
            .catch(err => {
                console.log(err);
            });
    }
};
</script>
