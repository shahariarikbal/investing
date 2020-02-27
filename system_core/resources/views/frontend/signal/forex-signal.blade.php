@extends('frontend.layouts-v2.master')

@section('signal-active', 'active')

@section('style')
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/top-forex-broker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/advertisement.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/recent-closed-trade.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/recent-analysis.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/small-advertisements.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/forex-signal-index.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/lib/flag-icon.min.css') }}">
<style>
    .faq_content .card {
        margin-bottom: 5px;
    }

    .card.card-forex-head {
        margin-bottom: 5px;
    }

    .faq_content .heading-card span {
        background-color: #212529;
        color: #ffffff;
        display: block;
        padding: 10px 15px;
        margin-bottom: 5px;
        font-size: 22px;
        text-align: center;
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: 1px;
    }



    
</style>
@endsection

@section('bottom-script')

<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
<script src="{{ asset('js/trading-session.js') }}"></script>
<script>
    /**
     * Forex Brokers Switechers JS
     */
    function tradingSession() {
        var x = document.getElementById("tradingSession");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function topForexBroker() {
        var x = document.getElementById("topForexBroker");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function advertisement() {
        var x = document.getElementById("advertisement");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function recentClosedTrade() {
        var x = document.getElementById("recent-closed-trade");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function marketAnalysis() {
        var x = document.getElementById("marketAnalysis");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function smallAdvertisement() {
        var x = document.getElementById("smallAdvertisement");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function relatedAnalysis() {
        var x = document.getElementById("relatedAnalysis");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

@endsection


@section('content')
@include('frontend.layouts.includes.trading-ticker')
<div class="mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                    
                @include('frontend.layouts.includes.signal-catagory')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.partials.analyses.latest-analyses')

                @include('frontend.layouts.includes.side-advertise')
                    
                @include('frontend.layouts.includes.side-advertise')
                
                <!-- MARKET SENTIMENT -->
                @if (count($marker_sentiments) > 0)
                <div class="position-relative mt-2 mb-2 d-none d-sm-none d-md-block">
                    <h4 class="trading-session-header border-radius-top-3">Market Sentiment</h4>
                    <div class="toggleWrapper">
                        <input type="checkbox" name="forex-cross-rates" data-value="new" class="mobileToggle user-toggle" id="forex-cross-rates-new" checked="checked">
                        <label for="forex-cross-rates-new"></label>
                    </div>
                    <div class="sentiment-container hide-new" data-simplebar>
                        <table class="percent-table">
                            @foreach($marker_sentiments as $sentiments)
                                <tr>
                                    <td>
                                        @php
                                            $icon = $sentiments->currency->icon;
                                            $icon_arr = explode('-',$icon);
                                        @endphp
                                        @foreach($icon_arr as $key => $currency_icon)
                                            <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-{{ $currency_icon }}"></span>
                                        @endforeach
                                    </td>
                                        <td>{{ $sentiments->currency->name }}</td>
                                    <td>
                                        <div class="persentige-view">
                                            <div class="progress">
                                                <div class="progress-bar grade-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ $sentiments->buy }}%">{{ $sentiments->buy }}%
                                                </div>
                                                <span class="right-space grade-danger" style="width: {{ $sentiments->sell }}%">{{ $sentiments->sell }}%</span>
                                            </div>
                                            <div class="percent-def">
                                                <ul>
                                                    <li>Buy</li>
                                                    <li>Sell</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif

                @include('frontend.layouts.includes.advertisement')
                
            </div>
            <div class="col-lg-6">
                <div id="app">
                    <section class="forex-signal-index">
                        <div class="row">
                            <div class="col-sm-4 col-12 col-md-4 col-lg-4 col-xl-4 d-none d-sm-block">
                                <div class="forex-title-bar">
                                    <h1>Forex Signals</h1>
                                </div>
                            </div>
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 nowTimezone">
                                <now />
                            </div>
                            <div class="col-md-12 timezones">
                                <timezone></timezone>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <section class="position-relative signal-details">

                                    <signals :signals="{{ $signals }}" :premium="false"></signals>
                                    
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-3">

                @include('frontend.partials.signals.trading-session')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.partials.forexSignal.recent-closed-trades')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.partials.blog.latest-blog')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.partials.signals.topForexBroker')

                
            </div>
        </div>
    </div>
</div>
@endsection