<template>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="title-container">
            <h2 class="forex-header-second" style="font-size: 18px;"><span>Signal Performance Graph</span></h2>
            <highcharts v-if="displayChart" :constructor-type="'stockChart'" :options="chartOptions"></highcharts>
            <div v-else class="alert alert-warning" role="alert">No graph data found</div>
        </div>
    </div>
</template>

<script>

    import {Chart} from 'highcharts-vue'
    import Highcharts from 'highcharts'
    import stockInit from 'highcharts/modules/stock'
    
    stockInit(Highcharts)

    export default {
        data () {
            return {
                displayChart: false,
                graphs: [],
                chartOptions: {
                    exporting: {
                        enabled: false
                    },
                    scrollbar: {
                        enabled: false
                    },
                    navigator: {
                        enabled: false
                    },
                    rangeSelector: {
                        selected: 1,
                        inputEnabled: false,
                        buttonTheme: {
                            width: 100,
                            height: 16,
                            fill: '#2B303A',
                            stroke: 'none',
                            'stroke-width': 0,
                            r: 5,
                            style: {
                                color: '#A0A0A0'
                            },
                            states: {
                                hover: {},
                                select: {
                                    fill: '#5B73A3',
                                    style: {
                                        color: 'white'
                                    }
                                }
                            }
                        },
                        buttons: [{
                                type: 'month',
                                count: 6,
                                text: 'Last 6 months'
                            },
                            {
                                type: 'year',
                                count: 1,
                                text: 'Last 12 months'
                            },
                            {
                                type: 'all',
                                text: 'All'
                            }
                        ],
                    },
                    credits: {
                        enabled: false
                    },
                    chart: {
                        backgroundColor: null,
                        type: 'area',
                        zoomType: 'x'
                    },
                    title: {
                        text: 'Signal Performance Graph'
                    },
                    tooltip: {
                        valueSuffix: ' Pips',
                    },
                    xAxis: {
                        tickmarkPlacement: 'on',
                        gridLineWidth: 1,
                        gridLineColor: '#7A7F87',
                        gridLineDashStyle: 'dot',
                        tickInterval: 1000 * 3600 * 24 * 30 * 2,
                    },
                    yAxis: {
                        gridLineColor: '#7A7F87',
                        title: {
                            text: ''
                        },
                        labels: {
                            formatter: function () {
                                return this.value + ' Pips'
                            }
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            shadow: true,
                            color: 'rgba(69, 147, 62, 0.7)',
                            borderRadius: 5,
                            borderWidth: 0,
                            negativeColor: 'rgba(255, 79, 79, 0.7)'
                        },
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}'
                            }
                        }
                    },
                    series: [
                        {
                            type: 'column',
                            name: 'Monthly Gain',
                            data: []
                        }
                    ]
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
                axios.post('/api/member/premium-signal/performance-graph')
                    .then(response => {
                        
                        let res = JSON.parse(response.data)

                        let total_pips = 0
                        this.graphs = res.map((data) => {
                            var obj = {}
                            obj.x = new Date(data.month)
                            obj.y = data.pips
                            total_pips += parseInt(data.pips)
                            return obj
                        })
                        if (total_pips > 0) {
                            this.chartOptions.series[0].data = this.graphs
                            this.displayChart = true
                        }
                    })
                    .catch(error => {
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