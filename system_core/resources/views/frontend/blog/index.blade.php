@extends('frontend.layouts-v2.master')

@section('blog-active', 'active')

@section('fb-sdk')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId={{ env('FACEBOOK_APP_ID') }}&autoLogAppEvents=1"></script>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/top-forex-broker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/advertisement.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/recent-closed-trade.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/recent-analysis.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/analysis-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/small-advertisements.css') }}" />
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

@section('content')

@section('bottom-script')
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
<script>
/**
     * Forex Brokers Switechers JS
     */
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
</script>
@endsection

<div id="app"></div>

@include('frontend.layouts.includes.trading-ticker')
<div class="mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.layouts.includes.blog-catagory')

                @include('frontend.layouts.includes.side-advertise')
                
                @include('frontend.partials.signals.topForexBroker')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.layouts.includes.advertisement')
                
            </div>
            
            <div class="col-lg-6">
                <section class="analysis-index" id="content-section">
					<div id="loading" style="display: none">
						<i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
                    </div>
                    <div>
                        <div class="row" id="initial-content">
                            <div class="col-md-12 mb-2">
                                <div class="title-bar">
                                    <h1>FX Official Blog</h1>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @php
                                    $data = array_chunk($blogs->toArray()['data'], 2);
                                @endphp
                                @foreach($data as $blog)
                                    @foreach($blog as $row)
                                        <div class="anaylsis-box">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-5 analysis-img-section">
                                                    <a href="{{ $row['permalink'] }}">
                                                        <div class="analysis-img">
                                                            <img src="{{ asset('/blogs/images/220x220-'.$row['feature_image']) }}" alt="{{ $row['title'] }}">
                                                            <div class="date-area">
                                                                <span class="pencil"><i class="fas fa-pencil-alt"></i></span>
                                                                <span class="month ">{{ date('M', strtotime($row['created_at'])) }}</span>
                                                                <span class="day">{{ date('j', strtotime($row['created_at'])) }}</span>
                                                                <span class="year">{{ date('Y', strtotime($row['created_at'])) }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-9 col-sm-7">
                                                    <div class="anylysis-info-details">

                                                        <div class="header">
                                                            <div class="title-area">
                                                                <div>
                                                                    <h3>
                                                                        <a href="{{ $row['permalink'] }}">{{ $row['title'] }}</a>
                                                                    </h3>
                                                                </div>
                                                                <div>
                                                                    <ul class="social-icon">
                                                                        <li class="nav-item">
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $row['permalink'] }}" class="nav-link facebook-share" target="_blank"><i class="fab fa-facebook-f facebook-icon"></i></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="https://twitter.com/intent/tweet?url={{ $row['permalink'] }}?text={{ env('APP_NAME') }}" class="nav-link twitter-share" target="_blank"><i class="fab fa-twitter twitter-icon"></i></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $row['permalink'] }}" class="nav-link linkedin-share" target="_blank"><i class="fab fa-linkedin-in linkedin-icon"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p>
                                                                    <span><strong>Created by:</strong> {{ $row['first_name'] . ' ' . $row['last_name'] }} at {{ date('H:i', strtotime($row['created_at'])) }}</span>
                                                                    <span class="ml-1 mr-1">|</span>
                                                                    <span><a href="javascript:void(0)" class="text-info font-weight-bold">{{$row['category']['name']}}</a></span>
                                                                    <span class="likesFloating"> <i class="far fa-thumbs-up text-info"></i> <i>{{ $row['likes_count'] }}</i></span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="body">
                                                            <p> {{ strip_tags($row['body']) }}</p>
                                                        </div>
                                                        <div class="footer">
                                                            <div>
                                                                {{-- <span><i class="fas fa-comments"></i></span>
                                                                <span id="ip_view"> <span class="fb-comments-count">{{ $row['approved_comments_count'] }}</span></span> --}}
                                                                <span><i class="fas fa-comments"></i></span>
                                                                <span id="ip_view"> <span class="fb-comments-count" data-href="{{ $row['permalink'] }}"></span></span>
                                                                {{-- <span><i class="fas fa-eye"></i></span>
                                                                <span id="ip_view"> 2453</span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-star"></i>
                                                                    <span id="ip_view"> 5</span>
                                                                </span> --}}
                                                            </div>
                                                            <div>
                                                                <a href="{{ $row['permalink'] }}" target="_blank" class="btn btn-sm">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="advertisement-mid">
                                        <a href="javascript:void(0)" target="_blank"><img src="../assets/images/fx_vps.gif" alt="Advertisements"></a>
                                    </div>
                                @endforeach
                                <div class="analysis-pagiantion">
                                    <div class="row">
                                        <div class="col-md-12">
                                        {{ $blogs->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </section>
            </div>
           

            <div class="col-lg-3 col-md-6 md-pl-1-half" id="thirddiv">
                
                @include('frontend.partials.forexSignal.recent-closed-trades')
                
                @include('frontend.layouts.includes.side-advertise')
                
                @include('frontend.partials.blog.latest-blog')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.layouts.includes.need-help')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.layouts.includes.small-advertisement')

                @include('frontend.layouts.includes.side-advertise')

                @include('frontend.partials.tags.analysis-tags')

            </div>
        </div>
    </div>
</div>
@endsection
