<template>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="title-container">
            <h2 class="forex-header-second" style="font-size: 18px;"><span>Signal Distribution Per Instrument</span></h2>
            <highcharts v-if="displayChart" :options="chartOptions"></highcharts>
            <div v-else class="alert alert-warning" role="alert">No graph data found</div>
        </div>
    </div>
</template>

<script>

    import {Chart} from 'highcharts-vue'
    import Highcharts from 'highcharts'
    // import stockInit from 'highcharts/modules/stock'
    
    // stockInit(Highcharts)

    export default {
        data () {
            return {
                displayChart: false,
                graphs: [],
                chartOptions: {
                    chart: {
                        backgroundColor: '#f7f7f7',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Signal Distribution Per Instrument'
                    },
                    credits: {
                        enabled: false
                    },
                    exporting: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                useHTML: true,
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: '#666',
                                    textOutline: 0
                                },
                                connectorColor: 'silver'
                            }
                        }
                    },
                    series: [{
                        minPointSize: 10,
                        innerSize: '50%',
                        zMin: 0,
                        name: 'Instruments',
                        data: []
                    }]
                }
            }
        },

        components: {
            highcharts: Chart 
        },
        created () {
            this.getPerformanceGraph()
        },
        methods: {
            getPerformanceGraph () {
                axios.post('/api/member/premium-signal/distribution-per-instrument')
                    .then(response => {
                        this.graphs = JSON.parse(response.data)
                        if (this.graphs.length > 0) {
                            this.chartOptions.series[0].data = JSON.parse(response.data)
                            this.displayChart = true
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                            setTimeout(() => { 
                                this.getPerformanceGraph()
                            }, 5000);
                        }
                        console.log(error)
                    })
            }
        }
    }
</script>