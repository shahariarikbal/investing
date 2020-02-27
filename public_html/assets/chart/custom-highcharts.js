(function($)
{
    (function()
    {
        Highcharts.setOptions(
            {
                lang:
                {
                    rangeSelectorZoom: ''
                }
            });

        $('#chartContainer').highcharts(
        {
            credits:
            {
                enabled: false
            },
            chart:
            {
                backgroundColor: null,
                type: 'area',
                zoomType: 'x'
            },
            title:
            {
                text: ''
            },
            tooltip:
            {
                valueSuffix: ' %',
            },
            xAxis:
            {
                tickmarkPlacement: 'on',
                gridLineWidth: 1,
                gridLineColor: '#7A7F87',
                gridLineDashStyle: 'dot',
                type: 'datetime',
                tickInterval: 1000 * 3600 * 24 * 30 * 2, // 2 months
                //minTickInterval: 365 * 24 * 36e5
            },
            yAxis:
            {
                min: minGraph,
                gridLineColor: '#7A7F87',
                title:
                {
                    text: ''
                },
                labels:
                {
                    formatter: function ()
                    {
                        return this.value+'%';
                    }
                },
            },
            legend:
            {
                enabled: false
            },
            plotOptions:
            {
                areaspline:
                {
                    fillColor:
                    {
                        linearGradient: [0, 0, 0, 300],
                        stops: [
                            [0, '#5C7BAA'],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker:
                    {
                        radius: 4
                    },
                    lineWidth: 2,
                    states:
                    {
                        hover:
                        {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series:
                [
                    {
                        type: 'areaspline',
                        name: 'Gross Return',
                        data: netReturn
                    }
                ]
        });

        $('#chartContainerMonthly').highcharts('StockChart',
        {
            exporting:
            {
                enabled: false
            },
            scrollbar:
            {
                enabled: false
            },
            navigator:
            {
                enabled: false
            },
            rangeSelector:
            {
                selected: 1,
                inputEnabled: false,
                buttonTheme:
                {
                    width: 100,
                    height: 16,
                    fill: '#2B303A',
                    stroke: 'none',
                    'stroke-width': 0,
                    r: 5,
                    style:
                    {
                        color: '#A0A0A0'
                    },
                    states:
                    {
                        hover: {
                        },
                        select:
                        {
                            fill: '#5B73A3',
                            style:
                            {
                                color: 'white'
                            }
                        }
                    }
                },
                buttons: [
                    {
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
            credits:
            {
                enabled: false
            },
            chart:
            {
                backgroundColor: null,
                type: 'area',
                zoomType: 'x'
            },
            title:
            {
                text: ''
            },
            tooltip:
            {
                valueSuffix: ' %',
            },
            xAxis:
            {
                tickmarkPlacement: 'on',
                gridLineWidth: 1,
                gridLineColor: '#7A7F87',
                gridLineDashStyle: 'dot',
                type: 'datetime',
                tickInterval: 1000 * 3600 * 24 * 30 * 2, // 2 months
                //minTickInterval: 365 * 24 * 36e5
            },
            yAxis:
            {
                //min: 0,
                gridLineColor: '#7A7F87',
                title:
                {
                    text: ''
                },
                labels:
                {
                    formatter: function ()
                    {
                        return this.value+'%';
                    }
                },
            },
            legend:
            {
                enabled: false
            },
            plotOptions:
            {
                column:
                {
                    shadow: true,
                    color: 'rgba(69, 147, 62, 0.7)',
                    borderRadius: 5,
                    borderWidth: 0,
                    negativeColor: 'rgba(255, 79, 79, 0.7)'
                }
            },
            series:
                [
                    {
                        type: 'column',
                        name: 'Monthly Gain',
                        data: monthlyGain
                    }
                ]
        });
    })();

}).apply(this, [jQuery]);