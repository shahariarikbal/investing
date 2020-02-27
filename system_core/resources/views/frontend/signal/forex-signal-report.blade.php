@extends('frontend.layouts-v2.master')

@section('signal-active', 'active')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
    .closed-sig-wrapper .card {
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 0;
    }

    .banner-consultency {
        background-image: url(../assets/images/hand.jpg);
        height: 585px;
        width: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .banner-content-consultency {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }

    .banner-content-consultency ul {
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .banner-content-consultency ul li {
        list-style-type: none;
        display: inline-block;
        margin-bottom: 20px;
        margin-left: 30px;

    }

    .banner-content-consultency ul li .card {
        color: inherit;
        background: radial-gradient(black, transparent);
        text-align: center;
        border-width: 10px;
        border-style: double;
        transform: skew(10deg, -8deg);
        width: 13rem;
    }

    .banner-content-consultency ul li .card .card-body {
        padding: 1.25rem;
    }

    .banner-content-consultency ul li .card .card-body h5 {
        font-weight: bold;
        color: #fff;
    }

    .banner-content-consultency ul li .card .card-body h6 {
        font-weight: bold;
        font-size: 1rem;
        color: #fff;
    }

    @media(max-width:992px) {
        .banner-content-consultency {
            position: absolute;
            top: 20%;
            left: 0%;
            transform: unset;
        }

        .banner-content-consultency ul li .card {
            width: 8rem;
        }

        .banner-content-consultency ul li {
            margin-bottom: 10px;
            margin-left: 15px;
        }

        .banner-content-consultency ul li .card .card-body {
            padding: 0.25rem;
        }
    }

    .parallax-2 {
        /* The image used */
        background-image: url(assets/images/hero-trading-station-web.jpg);

        /* Set a specific height */
        height: 570px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .parallax-2:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(to bottom right, #000, #222);
        opacity: .6;
    }

    .owl-carousel .owl-item img {
        height: auto;
        width: 100%;
    }
</style>
@endsection
@section('bottom-script')

<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- TimeZone JS -->
<!-- <script src="{{ asset('/assets/') }}/js/moment.js"></script>
<script src="{{ asset('/assets/') }}/js/moment-timezone.js"></script> -->
<script type="text/javascript">
    /***********************************************
     * Local Time script- By Dynamic Drive (http://www.dynamicdrive.com)
     * Please keep this notice intact
     * Visit http://www.dynamicdrive.com/ for this script and 100s more.
     ***********************************************/
    // function showLocalTime(container, zoneString, formatString) {
    //     var thisobj = this
    //     this.container = document.getElementById(container)
    //     this.localtime = moment.tz(new Date(), zoneString)
    //     this.formatString = formatString
    //     this.container.innerHTML = this.localtime.format(this.formatString)
    //     setInterval(function () {
    //         thisobj.updateContainer()
    //     }, 1000) //update container every second
    // }

    // showLocalTime.prototype.updateContainer = function () {
    //     this.localtime.second(this.localtime.seconds() + 1)
    //     this.container.innerHTML = this.localtime.format(this.formatString)
    // }
</script>
<!-- Chart JS -->
<script src="{{ asset('/assets/') }}/js/highcharts.js"></script>
<script>
    // Radialize the colors
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            backgroundColor: 'transparent',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '',
            style: {
                color: '#7a7a7a',
                fontWeight: 'bold'
            }
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
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: '#7a7a7a',
                        textOutline: 0
                    },
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            name: 'Share',
            data: [{!!$signalPercentagePerCurrencyPair!!}]
        }]
    });
</script>
<!-- Data Table Export JS -->
<!-- <script src="{{ asset('/assets/') }}/js/exporting.js"></script>
<script src="{{ asset('/assets/') }}/js/export-data.js"></script> -->

<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
@endsection

@section('content')

<div id="app"></div>

@include('frontend.layouts.includes.trading-ticker')

<!-- Start banner -->
<div class="banner-consultency no-dots wow fadeInUp" data-wow-duration="0.4s">
    <div class="banner-content-consultency text-white">
        <ul>
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title count">100</h5>
                        <h6 class="card-subtitle mb-2">Pips gain in total</h6>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title count">200</h5>
                        <h6 class="card-subtitle mb-2">Signal Package</h6>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title count">50%</h5>
                        <h6 class="card-subtitle mb-2">Success Rate</h6>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title count">60%</h5>
                        <h6 class="card-subtitle mb-2">Success Rate</h6>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title count">70%</h5>
                        <h6 class="card-subtitle mb-2">Success Rate</h6>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title count">80%</h5>
                        <h6 class="card-subtitle mb-2">Success Rate</h6>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- End Banner -->




<!-- START SECTION OUR SERVICES CARDS -->
<section class="signal-report">

    <div class="icon-container">
        <div class="container">

            <h2 class="font-weight-normal text-6 mb-4 text-center"><strong class="font-weight-extra-bold">Why </strong>Subscribe Our Signal Service</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fa fa-cloud"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Cloud Computing</h4>
                            <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fa fa-desktop"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Web Design and SEO</h4>
                            <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fa fa-tablet"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Mobile and Tablet Apps</h4>
                            <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fa fa-wordpress"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Wordpress Themes</h4>
                            <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fa fa-graduation-cap"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Training and development</h4>
                            <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fa fa-send"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Customer service</h4>
                            <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="closed-sig-wrapper">
        <div class="container">
            <h2 class="font-weight-normal text-6 mb-4 text-center"><strong class="font-weight-extra-bold">Recent </strong>closed signals</h2>
            <div class="pic-carousel owl-carousel closed-sig">
                <div class="item">
                    <div class="card ">
                        <div class="row ">
                            <!--Header div start-->
                            <div class="col-md-12 text-center ">
                                <div class="lhsize4">
                                    <span>
                                        <strong>
                                            <img src="../assets/images/flag.png" class="bangla1img">
                                            USD/GBP</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--Header div end-->
                        <div class="row lhsize1  downborder">
                            <!--1st list start-->
                            <div class="col-md-6 col-sm-6 col">
                                <span> EUR/USD signal: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right ">
                                <span>12 hours 51 min</span>
                            </div>
                        </div>
                        <!--1st list start-->
                        <!--2nd list start-->
                        <div class="row lhsize1 downborder ">
                            <div class="col-md-6 col-sm-6 col">
                                <span class="left-side ">From: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right">
                                <span>GMT+06:00
                                    <strong>8:43</strong>
                                </span>
                            </div>
                        </div>
                        <!--2nd list end-->
                        <div class="row lhsize1 downborder">
                            <div class="col-md-4 col-sm-4 col">
                                <span class="left-side ">Till: </span>
                            </div>
                            <div class="col-md-8 col-sm-8 col text-md-right">
                                <span>Till GMT+06:00
                                    <strong>12:43</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side ">Sell at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2345</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side "> Take profit* at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2322</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Stop loss at: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2382</span>
                            </div>
                        </div>
                        <div class="row  ml-0 mr-0 downborder lhsize1">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Check Analysis: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal00">
                                    <div class="badge badge-primary9">Check</div>
                                </a>
                            </div>
                        </div>
                        <div class="row  text-center ">
                            <div class="col-md-12 text-center ">
                                <div class="lhsizeone">
                                    <span>
                                        <strong>FILLED</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card ">
                        <div class="row ">
                            <!--Header div start-->
                            <div class="col-md-12 text-center ">
                                <div class="lhsize4">
                                    <span>
                                        <strong>
                                            <img src="../assets/images/flag.png" class="bangla1img">
                                            USD/GBP</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--Header div end-->
                        <div class="row lhsize1  downborder">
                            <!--1st list start-->
                            <div class="col-md-6 col-sm-6 col">
                                <span> EUR/USD signal: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right ">
                                <span>12 hours 51 min</span>
                            </div>
                        </div>
                        <!--1st list start-->
                        <!--2nd list start-->
                        <div class="row lhsize1 downborder ">
                            <div class="col-md-6 col-sm-6 col">
                                <span class="left-side ">From: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right">
                                <span>GMT+06:00
                                    <strong>8:43</strong>
                                </span>
                            </div>
                        </div>
                        <!--2nd list end-->
                        <div class="row lhsize1 downborder">
                            <div class="col-md-4 col-sm-4 col">
                                <span class="left-side ">Till: </span>
                            </div>
                            <div class="col-md-8 col-sm-8 col text-md-right">
                                <span>Till GMT+06:00
                                    <strong>12:43</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side ">Sell at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2345</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side "> Take profit* at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2322</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Stop loss at: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2382</span>
                            </div>
                        </div>
                        <div class="row  ml-0 mr-0 downborder lhsize1">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Check Analysis: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal00">
                                    <div class="badge badge-primary9">Check</div>
                                </a>
                            </div>
                        </div>
                        <div class="row  text-center ">
                            <div class="col-md-12 text-center ">
                                <div class="lhsizeone">
                                    <span>
                                        <strong>FILLED</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card ">
                        <div class="row ">
                            <!--Header div start-->
                            <div class="col-md-12 text-center ">
                                <div class="lhsize4">
                                    <span>
                                        <strong>
                                            <img src="../assets/images/flag.png" class="bangla1img">
                                            USD/GBP</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--Header div end-->
                        <div class="row lhsize1  downborder">
                            <!--1st list start-->
                            <div class="col-md-6 col-sm-6 col">
                                <span> EUR/USD signal: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right ">
                                <span>12 hours 51 min</span>
                            </div>
                        </div>
                        <!--1st list start-->
                        <!--2nd list start-->
                        <div class="row lhsize1 downborder ">
                            <div class="col-md-6 col-sm-6 col">
                                <span class="left-side ">From: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right">
                                <span>GMT+06:00
                                    <strong>8:43</strong>
                                </span>
                            </div>
                        </div>
                        <!--2nd list end-->
                        <div class="row lhsize1 downborder">
                            <div class="col-md-4 col-sm-4 col">
                                <span class="left-side ">Till: </span>
                            </div>
                            <div class="col-md-8 col-sm-8 col text-md-right">
                                <span>Till GMT+06:00
                                    <strong>12:43</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side ">Sell at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2345</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side "> Take profit* at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2322</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Stop loss at: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2382</span>
                            </div>
                        </div>
                        <div class="row downborder lhsize1">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Check Analysis: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal00">
                                    <div class="badge badge-primary9">Check</div>
                                </a>
                            </div>
                        </div>
                        <div class="row  text-center ">
                            <div class="col-md-12 text-center ">
                                <div class="lhsizeone">
                                    <span>
                                        <strong>FILLED</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card ">
                        <div class="row ">
                            <!--Header div start-->
                            <div class="col-md-12 text-center ">
                                <div class="lhsize4">
                                    <span>
                                        <strong>
                                            <img src="../assets/images/flag.png" class="bangla1img">
                                            USD/GBP</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--Header div end-->
                        <div class="row lhsize1  downborder">
                            <!--1st list start-->
                            <div class="col-md-6 col-sm-6 col">
                                <span> EUR/USD signal: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right ">
                                <span>12 hours 51 min</span>
                            </div>
                        </div>
                        <!--1st list start-->
                        <!--2nd list start-->
                        <div class="row lhsize1 downborder ">
                            <div class="col-md-6 col-sm-6 col">
                                <span class="left-side ">From: </span>
                            </div>
                            <div class="col-md-6 col-sm-6 col text-md-right">
                                <span>GMT+06:00
                                    <strong>8:43</strong>
                                </span>
                            </div>
                        </div>
                        <!--2nd list end-->
                        <div class="row lhsize1 downborder">
                            <div class="col-md-4 col-sm-4 col">
                                <span class="left-side ">Till: </span>
                            </div>
                            <div class="col-md-8 col-sm-8 col text-md-right">
                                <span>Till GMT+06:00
                                    <strong>12:43</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side ">Sell at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2345</span>
                            </div>
                        </div>

                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col">
                                <span class="left-side "> Take profit* at:</span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2322</span>
                            </div>
                        </div>
                        <div class="row lhsize1 downborder">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Stop loss at: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <span>1.2382</span>
                            </div>
                        </div>
                        <div class="row  ml-0 mr-0 downborder lhsize1">
                            <div class="col-md-5 col-sm-5 col ">
                                <span class="left-side ">Check Analysis: </span>
                            </div>
                            <div class="col-md-7 col-sm-7 col text-md-right">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal00">
                                    <div class="badge badge-primary9">Check</div>
                                </a>
                            </div>
                        </div>
                        <div class="row  text-center ">
                            <div class="col-md-12 text-center ">
                                <div class="lhsizeone">
                                    <span>
                                        <strong>FILLED</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-normal text-6 mb-4 text-center"><strong class="font-weight-extra-bold">Quick </strong>Statistics</h2>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="drop-shadow">
                    <table class="sig-facilities-table mb-1">
                        <thead>
                            <tr>
                                <th colspan="2">Signal statistics</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Registered members</td>
                                <td>{{ $calculations['total_members'] }}</td>
                            </tr>
                            <tr>
                                <td>total signal provided</td>
                                <td>{{ $calculations['total_signal'] }}</td>
                            </tr>
                            <tr>
                                <td>Performance percentage</td>
                                <td>{{ number_format((float)$calculations['performance_percentages'], 2, '.', '') }}</td>
                            </tr>
                            <tr>
                                <td>avarage signal per week</td>
                                <td>{{ round($calculations['avg_signal_per_weeks']) }}</td>
                            </tr>
                            <tr>
                                <td>total pips gained</td>
                                <td>{{ $calculations['total_pips_gain'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="drop-shadow">
                    <h4 class="pie-head">SIGNAL DISTRIBUTION PER INSTRUMENT</h4>
                    <div id="container" class="sig-pie"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="container pb-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-normal text-6 mb-4 text-center"><strong class="font-weight-extra-bold">PERFORMANCE </strong>REPORT</h2>
            </div>
            <div class="col-md-12">
                <div class="drop-shadow mb-4">
                    <div class="daily-sig-table-header border-top-radius mt-1">
                        <p class="text-uppercase text-center m-0 text-white">Weekly performance report</p>
                    </div>
                    <table class="table manage-table-custom daily-sig-table mb-0" data-show-toggle="true" data-expand-first="false">
                        <thead>
                            <tr>
                                <th>Weeks</th>
                                <th>Total</th>
                                @foreach($currencies as $currency)
                                @php
                                $icon = $currency->icon;
                                $icon_arr = explode('-',$icon);
                                @endphp
                                <th>
                                    {{ $currency->name }}
                                    @foreach($icon_arr as $key => $single_icon)
                                    <span @if ($key==1) style="margin-left: -1px;" @endif class="flag-icon flag-icon-{{ $single_icon }}"></span>
                                    @endforeach
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'total'] as $row)
                            <tr>
                                <th class="{{ $row === 'total' ? 'text-secondary' : 'bg-secondary text-white' }}">{{ ucfirst($row) }}</th>
                                <td style="color: white; {{ isset($weeklyReportTotal[$row]['meta']['profit']) && $weeklyReportTotal[$row]['meta']['profit'] ? 'background: #00c300' : (is_null($weeklyReportTotal[$row]['meta']['profit']) ? 'background: gray' : 'background: #c30000') }}">
                                    @if (!is_null($weeklyReportTotal[$row]['meta']['profit']))
                                    <a href="{{ url('/forex-signal-report/details?day='.$row) }}" target="_blank" style="color: #fff;font-weight: 700;">
                                        {{ $weeklyReportTotal[$row]['pips'] }}
                                    </a>
                                    @else
                                    {{ $weeklyReportTotal[$row]['pips'] }}
                                    @endif
                                </td>
                                @foreach($weeklyReport[$row] as $key => $report)
                                <td class="{{ $report['meta']['profit'] ? 't-green' : (is_null($report['meta']['profit']) ? 't-gray' : 't-red') }}" style="{{ $row === 'total' ? ($report['meta']['profit'] ? 'color: white;background: #00c300' : (is_null($report['meta']['profit']) ? 'color: white;background: gray' : 'color: white;background: #c30000')) : '' }}">
                                    @if (!is_null($report['meta']['profit']))
                                    <a href="{{ url('/forex-signal-report/details?day='.$row.'&currency='.$key) }}" target="_blank" style="{{ $row === 'total' ? 'color: #fff;': 'color: #333;'}}font-weight: 700;">
                                        {{ $report['meta']['profit'] ? '+' : '' }}{{ $report['pips'] }}
                                    </a>
                                    @else
                                    {{ $report['meta']['profit'] ? '+' : '' }}{{ $report['pips'] }}
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="drop-shadow mb-4">
                    <div class="daily-sig-table-header border-top-radius mt-1">
                        <p class="text-uppercase text-center m-0 text-white">monthly performance report</p>
                    </div>
                    <table class="table manage-table-custom daily-sig-table mb-0" data-show-toggle="true" data-expand-first="false">
                        <thead>
                            <tr>
                                <th>Month,Year</th>
                                <th>Total</th>
                                @foreach($currencies as $currency)
                                @php
                                $icon = $currency->icon;
                                $icon_arr = explode('-',$icon);
                                @endphp
                                <th>
                                    {{ $currency->name }}
                                    @foreach($icon_arr as $key => $single_icon)
                                    <span @if ($key==1) style="margin-left: -1px;" @endif class="flag-icon flag-icon-{{ $single_icon }}"></span>
                                    @endforeach
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (['janurary', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total'] as $row)
                            <tr>
                                <th class="{{ $row === 'total' ? 'text-secondary' : 'bg-secondary text-white' }}">{{ ucfirst($row) }}</th>
                                <td style="color: white; {{ $monthlyReportTotal[$row]['meta']['profit'] ? 'background: #00c300' : (is_null($monthlyReportTotal[$row]['meta']['profit']) ? 'background: gray' : 'background: #c30000') }}">
                                    @if (!is_null($monthlyReportTotal[$row]['meta']['profit']))
                                    <a href="{{ url('/forex-signal-report/details?month='.$row) }}" target="_blank" style="color: #fff;font-weight: 700;">
                                        {{ $monthlyReportTotal[$row]['pips'] }}
                                    </a>
                                    @else
                                    {{ $monthlyReportTotal[$row]['pips'] }}
                                    @endif
                                </td>
                                @foreach($monthlyReport[$row] as $key => $report)
                                <td class="{{ $report['meta']['profit'] ? 't-green' : (is_null($report['meta']['profit']) ? 't-gray' : 't-red') }}" style="{{ $row === 'total' ? ($report['meta']['profit'] ? 'color: white;background: #00c300' : (is_null($report['meta']['profit']) ? 'color: white;background: gray' : 'color: white;background: #c30000')) : '' }}">

                                    @if (!is_null($report['meta']['profit']))
                                    <a href="{{ url('/forex-signal-report/details?month='.$row.'&currency='.$key) }}" target="_blank" style="{{ $row === 'total' ? 'color: #fff;': 'color: #333;'}}font-weight: 700;">
                                        {{ $report['meta']['profit'] ? '+' : '' }}{{ $report['pips'] }}
                                    </a>
                                    @else
                                    {{ $report['meta']['profit'] ? '+' : '' }}{{ $report['pips'] }}
                                    @endif

                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="drop-shadow mb-1">
                    <div class="daily-sig-table-header border-top-radius">
                        <p class="text-uppercase text-center m-0 text-white">yearly performance report</p>
                    </div>
                    <table class="table manage-table-custom daily-sig-table mb-0" data-show-toggle="true" data-expand-first="false">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Total</th>
                                @foreach($currencies as $currency)
                                @php
                                $icon = $currency->icon;
                                $icon_arr = explode('-',$icon);
                                @endphp
                                <th>
                                    {{ $currency->name }}
                                    @foreach($icon_arr as $key => $single_icon)
                                    <span @if ($key==1) style="margin-left: -1px;" @endif class="flag-icon flag-icon-{{ $single_icon }}"></span>
                                    @endforeach
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (['2018', '2019', '2020', 'total'] as $row)
                            <tr>
                                <th class="{{ $row === 'total' ? 'text-secondary' : 'bg-secondary text-white' }}">{{ ucfirst($row) }}</th>
                                <td style="color: white; {{ $yearlyReportTotal[$row]['meta']['profit'] ? 'background: #00c300' : (is_null($yearlyReportTotal[$row]['meta']['profit']) ? 'background: gray' : 'background: #c30000') }}">
                                    @if (!is_null($yearlyReportTotal[$row]['meta']['profit']))
                                    <a href="{{ url('/forex-signal-report/details?year='.$row) }}" target="_blank" style="color: #fff;font-weight: 700;">
                                        {{ $yearlyReportTotal[$row]['pips'] }}
                                    </a>
                                    @else
                                    {{ $yearlyReportTotal[$row]['pips'] }}
                                    @endif
                                </td>
                                @foreach($yearlyReport[$row] as $key => $report)

                                <td class="{{ $report['meta']['profit'] ? 't-green' : (is_null($report['meta']['profit']) ? 't-gray' : 't-red') }}" style="{{ $row === 'total' ? ($report['meta']['profit'] ? 'color: white;background: #00c300' : (is_null($report['meta']['profit']) ? 'color: white;background: gray' : 'color: white;background: #c30000')) : '' }}">

                                    @if (!is_null($report['meta']['profit']))
                                    <a href="{{ url('/forex-signal-report/details?year='.$row.'&currency='.$key) }}" target="_blank" style="{{ $row === 'total' ? 'color: #fff;': 'color: #333;'}}font-weight: 700;">
                                        {{ $report['meta']['profit'] ? '+' : '' }}{{ $report['pips'] }}
                                    </a>
                                    @else
                                    {{ $report['meta']['profit'] ? '+' : '' }}{{ $report['pips'] }}
                                    @endif

                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection