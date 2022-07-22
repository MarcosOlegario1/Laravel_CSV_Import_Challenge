<template>
    <Bar :chart-options="chartOptions" :chart-data="chartData" :chart-id="chartId" :dataset-id-key="datasetIdKey"
        :plugins="plugins" :css-classes="cssClasses" :styles="styles" :width="width" :height="height" />
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'gender-graphic',
    components: { Bar },
    props: {
        chartId: {
            type: String,
            default: 'bar-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        width: {
            type: Number,
            default: 200
        },
        height: {
            type: Number,
            default: 200
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => { }
        },
        plugins: {
            type: Object,
            default: () => { }
        }
    },
    methods:{
        async fetchCustomers() {
            try {
                const res = await fetch(`/api/gender-graph`)
                const data = await res.json()
                this.customers = data.customers;
                console.log(this.data)
            } catch (error) {
                console.log(error)
            }
        }
    },
    data() {
        return {
            chartData: {
                labels: [
                            'Clientes com gênero',
                            'Clientes sem gênero',
                        ],
                datasets: [{ data: [40, 20] }]
            },
            chartOptions: {
                responsive: true
            }
        }
    }
}
</script>
