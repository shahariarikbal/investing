@extends('frontend.layouts-v2.master')

@section('core-service-active', 'active')


@section('style')
<link rel="stylesheet" href="{{ asset('/assets/') }}/css/custom-theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
    .banner-consultency {
        background-image: url('assets/images/hand.jpg');
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
        background-image: url('assets/images/hero-trading-station-web.jpg');

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

    @media(max-width:767px) {
        .sm-mt img {
            width: 300px;
        }
    }
</style>
<style>
    .section-gradient {
        background: #0c0e28;
        background-image: url('assets/images/section_pattern.png');
    }



    /*=============================================
            08: Pricing plans
        ==============================================*/
    /* pricing */
    .pricing-filter {
        margin: 50px 0 40px 0;
        font-size: 0;
        text-align: center;
    }

    .pricing-filter .pricing_nav {
        font-size: 16px;
        display: inline-block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
        border: 1px solid #fff;
        border-radius: 4px;
        overflow: hidden;
        z-index: 0;
    }

    .pricing-filter .pricing_nav:before,
    .pricing-filter .pricing_nav:after {
        content: " ";
        display: table;
    }

    .pricing-filter .pricing_nav .nav-item {
        display: inline-block;
    }

    .pricing-filter .pricing_nav .nav-item a {
        color: #ffffff;
        padding: 17px 30px;
        display: block;
        position: relative;
        z-index: 1;
    }

    .pricing-filter .pricing_nav .nav-item a.active:after {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #000;
        content: '';
        top: 0;
        left: 0;
        z-index: -1;
    }

    .pricing-filter .pricing_nav .nav-item a.active {
        border-color: #333;
    }

    .single_pricing_table {
        padding: 50px;
        border-radius: 4px;
        border: 1px solid #fff;
        color: #fff;
        transition: .3s linear;
        margin-bottom: 30px;
        position: relative;
        z-index: 1;
    }

    .single_pricing_table:after {
        position: absolute;
        left: 0;
        top: -195px;
        width: 100%;
        height: 100%;
        z-index: -1;
        content: '';
        transform: scale(0);
        background-color: #000;
        transition: all .5s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .single_pricing_table:hover:after {
        top: 0;
        left: 0;
        transform: scale(1);
    }

    .single_pricing_table .pt_header .pt_price span {
        font-size: 25px;
        font-weight: 500;
    }

    .single_pricing_table .pt_header .pt_price small {
        font-size: 20px;
    }

    .single_pricing_table .pt_header .pt_price {
        display: inline-block;
        margin: 0 auto;
        border: 1px solid #fff;
        padding: 20px 30px;
        border-radius: 4px;
        margin-bottom: 30px;
        transition: .6s linear;
    }

    .single_pricing_table .pt_header h2 {
        font-size: 22px;
        color: #ffffff;
        font-weight: 500;
        margin-bottom: 20px;
        text-transform: capitalize !important;
    }

    .single_pricing_table .pt_body .pt_feature ul {
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 18px;
        line-height: 36px;
        margin-bottom: 30px;
    }

    .single_pricing_table .pt_body .pt_feature ul li {
        line-height: 3rem;
        font-weight: normal;
        font-size: 15px;
    }

    .single_pricing_table .pt_footer a {
        border-color: #fff;
        font-size: 16px;
        color: #fff;
    }

    .single_pricing_table:hover .pt_price,
    .single_pricing_table:hover .btn {
        background-color: #fff;
        color: #333;
    }

    .single_pricing_table .pt_body .pt_feature ul {
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 18px;
        line-height: 36px;
        margin-bottom: 30px;
    }

    .single-pricing-plan {
        background: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
        -webkit-transition: all .2s;
        transition: all .2s;
        padding-top: 25px;
        position: relative;
        overflow: hidden;
    }

    .single-pricing-plan:hover {
        background: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.10);
        color: #333;
    }

    .single-pricing-plan p {
        padding: 0 30px 15px;
        position: relative;
        margin-bottom: 20px;
    }

    .single-pricing-plan p:before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        width: 50px;
        height: 2px;
        background-color: #2e5ae8;
    }

    .single-pricing-plan ul {
        padding: 0 30px;
        margin-bottom: 20px;
    }

    .single-pricing-plan ul li {
        margin: 10px 0;
        color: #7884ac;
    }

    .single-pricing-plan ul+span {
        font-size: 36px;
        line-height: 36px;
        font-weight: 500;
        color: #031b4e;
        display: block;
        padding: 0 30px;
    }

    .single-pricing-plan ul+span sup {
        font-size: 16px;
        top: -13px;
        margin-right: 3px;
    }

    .single-pricing-plan ul+span sub {
        font-size: 14px;
        color: #9aa4c6;
        bottom: 0;
    }

    .purchase {
        padding: 65px 0 30px;
        z-index: 1;
    }

    .purchase:before {
        bottom: -22px;
        -webkit-transform: skewY(-5deg);
        transform: skewY(-5deg);
    }

    .wpb_column:nth-child(even) .single-pricing-plan>.purchase:before {
        -webkit-transform: skewY(5deg);
        transform: skewY(5deg);
    }

    .single-pricing-plan .popular {
        position: absolute;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 2px;
        color: #fff;
        background: #0063f8;
        bottom: 160px;
        right: -50px;
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        padding: 0 10px;
    }

    .single-pricing-plan .popular:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        left: -3px;
        top: 0;
        border-bottom: 20px solid #0063f8;
        border-left: 3px solid transparent;
    }

    .bluishost--section .wpb_column:nth-child(odd) .single-pricing-plan .popular {
        bottom: 182px;
    }

    .bluishost--section .wpb_column:nth-child(odd) .single-pricing-plan .popular:before {
        border-top: 20px solid #0063f8;
        border-bottom: none;
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
@endsection

@section('content')
<div id="app"></div>
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
@include('frontend.layouts.includes.trading-ticker')
<!--  Start About copytrade services -->
<section id="token" class="mt-5 no-dots wow fadeInUp" data-wow-duration="0.6s">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 text_md_center">
                <div class="text-left mb-5 mt-4">
                    <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">about </strong>copytrade SERVICES</h2>
                    <p class="text-justify font-weight-normal mb-2">
                        Our Fund Management service is your key to making profits without doing anything except investing your money. Our team of experienced Fund Management Professionals, Forex Trading, and Financial Experts use their experience and knowledge to invest your money smartly to ensure profits every time.
                        <br>
                        This type of investment option is perfect for investors who lack the expertise or don’t have time to trade in their account. Our strategy focuses on developing models and strategies based on market price volatility. We do this while utilizing trading systems based on algorithmic trading models as well as incorporating a variety of non-predictive and discretionary models. This strategy enables us to minimize risk while maximizing profits from our trading.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 text_md_center res_md_mt_30 d-flex justify-content-center">
                <div class="infographic-image">
                    <img src="assets/images/hexagons.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--  End About copytrade services -->

<!-- START pricing table -->
<section class="no-dots wow fadeInUp" data-wow-duration="0.7s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center mb-5 mt-4">
                    <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">copytrade </strong> packages</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="section-gradient pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="pricing-filter" data-animate="fadeInUp" data-delay=".2">
                        <ul class="pricing_nav nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item"><a class="active" href="#monthly" role="tab" data-toggle="tab">Monthly</a></li>
                            <li class="nav-item"><a class="" href="#annually" role="tab" data-toggle="tab">Annually</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane show fade  active" id="monthly" role="tabpanel">
                    <div class="row justify-content-center">
                        @if(count($monthly_packages) > 0)
                        @foreach($monthly_packages as $package)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="pricing--content ">
                                <div class="single_pricing_table text-center" data-animate="fadeInUp" data-delay=".2">
                                    <div class="pt_header">
                                        <div class="pt_price"><span>${{ $package->price }}</span>&nbsp;<small>{{ ucfirst($package->duration) }}</small></div>
                                        <h2>{{ $package->name }}</h2>
                                    </div>
                                    <div class="pt_body">
                                        <div class="pt_feature karla">
                                            <ul>
                                                @foreach($package->details as $each)
                                                <li>{{ $each['key'] }} - {{ $each['value'] }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pt_footer">
                                        <a class="btn btn-transparent btn-square" href="{{ url('subscription/copytrade/' . $package->id) }}">Purchase now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning">No Package Found</div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane show fade " id="annually" role="tabpanel">
                    <div class="row justify-content-center">

                        @if(count($yearly_packages) > 0)
                        @foreach($yearly_packages as $yearly)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="pricing--content ">
                                <div class="single_pricing_table text-center" data-animate="fadeInUp" data-delay=".2">
                                    <div class="pt_header">
                                        <div class="pt_price"><span>$ {{ $yearly->price }}</span>&nbsp;<small>{{ ucfirst($yearly->duration) }}</small></div>
                                        <h2>{{ $yearly->name }}</h2>
                                    </div>
                                    <div class="pt_body">
                                        <div class="pt_feature karla">
                                            <ul>
                                                @foreach($yearly->details as $each)
                                                <li>{{ $each['key'] }} {{ $each['value'] }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pt_footer">
                                        <a class="btn btn-transparent btn-square" href="{{ url('subscription/copytrade/' . $yearly->id) }}">Purchase now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning">No Package Found</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="p-2 bg-white rounded">
                        <p class="text-center text-dark font-italic">To get 25% Discount from all receiving payment. Open an trading account from any of our recommended forex broker using our introducing link. For details contact with our support team.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END pricing table -->


<!-- START Copytrade services -->
<section class="no-dots wow fadeInUp" data-wow-duration="0.8s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center mb-5 mt-4">
                    <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">why </strong>choose our copytrade SERVICES</h2>
                    <p class="text-justify pb-3">Our service at equal value but at a lower price or in a more desirable fashion
                        Our service at equal value but at a lower price or in a more desirable fashion Our service at equal value but at a lower price or in a more desirable fashion
                        Our service at equal value but at a lower price</p>
                </div>
                <div class="pic-carousel owl-carousel">
                    <div class="item">
                        <div class="service-box" data-value='1'>
                            <div class="service-inner-img zoom-img service-img1">
                                <img src="assets/images/service/trainer.jpg" alt="">
                                <div class="shadow"></div>
                            </div>
                            <div class="service-inner service-des1">
                                <h4>FOREX TRADE SERVICE</h4>
                                <p>For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software. For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software</p>
                                <a href="#" class="btn btn-light font-weight-bold text-color-dark mb-3" data-animation="fadeInUp" data-animation-delay="0.5s">Read More <i class="ion-ios-arrow-thin-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="service-box" data-value="3">
                            <div class="service-inner-img zoom-img service-img3">
                                <img src="assets/images/service/crypto-consultancy.jpg" alt="">
                                <div class="shadow"></div>
                            </div>
                            <div class="service-inner service-des3">
                                <h4>CRYPTO TRADE SERVICE</h4>
                                <p>For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software.For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software</p>
                                <a href="#" class="btn btn-light font-weight-bold text-color-dark mb-3" data-animation="fadeInUp" data-animation-delay="0.5s">Read More <i class="ion-ios-arrow-thin-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="service-box" data-value='1'>
                            <div class="service-inner-img zoom-img service-img1">
                                <img src="assets/images/service/trainer.jpg" alt="">
                                <div class="shadow"></div>
                            </div>
                            <div class="service-inner service-des1">
                                <h4>FOREX TRADE SERVICE</h4>
                                <p>For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software. For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software</p>
                                <a href="#" class="btn btn-light font-weight-bold text-color-dark mb-3" data-animation="fadeInUp" data-animation-delay="0.5s">Read More <i class="ion-ios-arrow-thin-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="service-box" data-value="3">
                            <div class="service-inner-img zoom-img service-img3">
                                <img src="assets/images/service/crypto-consultancy.jpg" alt="">
                                <div class="shadow"></div>
                            </div>
                            <div class="service-inner service-des3">
                                <h4>CRYPTO TRADE SERVICE</h4>
                                <p>For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software.For those who would like to profit from our expert traders then our copy trade service is an ideal choice for you. Our automated trade copier software</p>
                                <a href="#" class="btn btn-light font-weight-bold text-color-dark mb-3" data-animation="fadeInUp" data-animation-delay="0.5s">Read More <i class="ion-ios-arrow-thin-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Copytrade services -->


<!-- FAQ Start -->
<section id="whitepaper" class="small_pb small_pt p-0 no-dots wow fadeInUp" data-wow-duration="0.9s">
    <div class="parallax-2">
        <div class="container all-service">
            <div class="row small_space pt-5 mb-5 mt-0 align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div id="accordion" class="faq_content">
                        @if(count($copyTrade_faqs) > 0)

                        @foreach($copyTrade_faqs as $key => $copyTrade)
                        <div class="card">
                            <div class="card-header" id="headingOne_{{ $key }}">
                                <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne_{{ $key }}" aria-expanded="false" aria-controls="collapseOne_{{ $key }}">{{ $copyTrade->question }} ?</a> </h6>
                            </div>
                            <div id="collapseOne_{{ $key }}" class="collapse" aria-labelledby="headingOne_{{ $key }}" data-parent="#accordion">
                                <div class="card-body">{!! $copyTrade->answer !!}</div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning mt-5">No FAQ Found</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 text-center sm-mt">
                    <img src="assets/images/fxcopier.png" alt="FXCopier" class="faq-img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ End -->


<!-- TESTIMONIALS SECTION START -->
<div class="section-full mobile-page-padding p-t80 p-b50 bg-cover wow fadeInUp" style="background-image:url('assets/images/background/bg6.jpg');" data-wow-duration="1s">
    <div class="container">
        <div class="text-center mb-5 mt-4">
            <h2 class="font-weight-normal text-6 mb-4 text-uppercase"><strong class="font-weight-extra-bold">client </strong>Testimonials</h2>
            <p class="text-justify pb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure fugit eaque ea et. Perferendis, repudiandae numquam est velit quidem harum alias eaque ullam eum? Animi sint eligendi maiores nesciunt deleniti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident </p>
        </div>
        <div class="owl-carousel testimonial testimonial-home">
            <div class="item">
                <div class="testimonial-2 m-a30 hover-animation-1">
                    <div class=" block-shadow bg-white p-a30">
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius scale-in-center"><img src="assets/images/testimonials/pic1.jpg" width="100" height="100" alt=""></div>
                            <h4 class="testimonial-name m-b5">Shelly Johnson -</h4>
                            <span class="testimonial-position">Business Person</span>
                        </div>
                        <div class="testimonial-text">
                            <span class="fa fa-quote-right"></span>
                            <p> Excellent Customer support!. The template itself is very ext ended. simply dummy text of the printing and industry. the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-2 m-a30  hover-animation-1">
                    <div class=" block-shadow bg-white p-a30">
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius scale-in-center"><img src="assets/images/testimonials/pic2.jpg" width="100" height="100" alt=""></div>
                            <h4 class="testimonial-name m-b5">Cuthbert Brain -</h4>
                            <span class="testimonial-position">Contractor</span>
                        </div>
                        <div class="testimonial-text">
                            <span class="fa fa-quote-right"></span>
                            <p>The template itself is very ext ended. excellent customer support! simply dummy text of the printing and industry. the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-2 m-a30  hover-animation-1">
                    <div class=" block-shadow bg-white p-a30">
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius scale-in-center"><img src="assets/images/testimonials/pic3.jpg" width="100" height="100" alt=""></div>
                            <h4 class="testimonial-name m-b5">Cathrine Wagner -</h4>
                            <span class="testimonial-position">Builder</span>
                        </div>
                        <div class="testimonial-text">
                            <span class="fa fa-quote-right"></span>
                            <p>The template itself is very ext ended. excellent customer support! simply dummy text of the printing and industry. the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-2 m-a30  hover-animation-1">
                    <div class=" block-shadow bg-white p-a30">
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius scale-in-center"><img src="assets/images/testimonials/pic4.jpg" width="100" height="100" alt=""></div>
                            <h4 class="testimonial-name m-b5">John Doe -</h4>
                            <span class="testimonial-position">Business Person</span>
                        </div>
                        <div class="testimonial-text">
                            <span class="fa fa-quote-right"></span>
                            <p> Excellent Customer support!. The template itself is very ext ended. simply dummy text of the printing and industry. the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-2 m-a30  hover-animation-1">
                    <div class=" block-shadow bg-white p-a30">
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius scale-in-center"><img src="assets/images/testimonials/pic5.jpg" width="100" height="100" alt=""></div>
                            <h4 class="testimonial-name m-b5">Cuthbert Brain -</h4>
                            <span class="testimonial-position">Business Person</span>
                        </div>
                        <div class="testimonial-text">
                            <span class="fa fa-quote-right"></span>
                            <p>The template itself is very ext ended. excellent customer support!. simply dummy text of the printing and industry. the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- TESTIMONIALS SECTION END -->

@endsection