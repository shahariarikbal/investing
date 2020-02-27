<template>
    <div class="row ">
        <div class="col-md-12">
            <div class="title-container d-flex justify-content-between">
                <h2 class="forex-header-second" style="font-size: 18px;"><span>PERFORMANCE REPORT (MASTER ACCOUNT)</span></h2>
                <select class="form-control" style="width: auto" v-model="plan">
                    <option v-for="subscription in subscriptions" :value="subscription.plan.id" :key="subscription.id">{{ subscription.plan.name }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
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
                subscriptions: [],
                plan: '',
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
                        text: 'Master Account Performance Graph'
                    },
                    tooltip: {
                        valueSuffix: ' %',
                    },
                    xAxis: {
                        tickmarkPlacement: 'on',
                        gridLineWidth: 1,
                        gridLineColor: '#7A7F87',
                        gridLineDashStyle: 'dot',
                        type: 'datetime',
                        tickInterval: 1000 * 3600 * 24 * 30 * 2,
                    },
                    yAxis: {
                        gridLineColor: '#7A7F87',
                        title: {
                            text: ''
                        },
                        labels: {
                            formatter: function () {
                                return this.value + '%'
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
                                format: '{point.y:.1f}%'
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
        
        watch: {
            plan (value) {
                this.getPerformanceGraph(this.plan)
            }
        },
        
        created () {
            EventBus.$on('copytrade-subscriptions', payload => {
                this.subscriptions = payload
                this.plan = this.subscriptions[0].plan.id
                this.getPerformanceGraph(this.plan)
            })

            
        },
        methods: {
            getPerformanceGraph (plan) {
                axios.post('/api/member/copy-trade/performance-graph', { package_id: plan })
                    .then(response => {
                        this.graphs = response.data.map((d) => {
                            var obj = {}
                            obj.x = new Date(d.x)
                            obj.y = d.y
                            return obj
                        })
                        this.chartOptions.series[0].data = this.graphs
                        this.displayChart = false
                        if (this.graphs.length > 0) {
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