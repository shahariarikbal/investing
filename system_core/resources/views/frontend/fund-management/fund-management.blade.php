@extends('frontend.layouts-v2.master')

@section('core-service-active', 'active')

@section('style')
<link rel="stylesheet" href="{{ asset('/assets/') }}/css/custom-theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
    .banner {
        background-image: url(assets/images/bg.jpg);
        height: 500px;
        width: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .banner-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }

    .banner-content h1 {
        font-weight: 300;
        line-height: 1.5em;
    }

    .banner-content ul {
        margin: 0;
        padding: 0;
    }

    .banner-content ul li {
        line-height: 2.5rem;
        list-style-type: none;
        font-size: 20px;
        font-weight: 300;
    }

    .banner-content ul li i {
        margin-right: 0.3rem;
    }

    .banner-content h5 {
        margin-top: 1rem;
    }

    .banner-content h5 small {
        font-size: 65%;
        color: #b7b5b5;
    }

    @media(max-width:991px) {

        .banner-content {
            top: 50px;
            left: 25px;
            transform: unset;
        }

        .banner-content h1 {
            font-weight: 600;
            line-height: 1.5em;
            font-size: 18px;
        }

        .banner-content ul li {
            font-size: 15px;
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



    @media(max-width:991px) {
        .reverse-column-xs {
            flex-direction: column-reverse;
        }

        .infographic-image {
            display: flex;
            justify-content: center;
        }
    }

    @media(max-width:767px) {
        .infographic-image {
            margin-bottom: 4rem;
        }

        .sm-mt img {
            width: 300px;
        }

        .pricing-plan .card .card-header {
            padding: 0;
            height: 50px !important;
        }

        .pricing-plan .card .card-header h5 {
            font-size: 12px;
        }

        .pricing-plan .card .card-body {
            padding: 1rem;
        }

        .pricing-plan .card .card-body a {
            font-size: 0.75rem;
        }
    }
</style>
<style>
    .ms-thumbnail {
        position: relative;
        overflow: hidden;
        margin-bottom: 0;
    }

    .ms-thumbnail img {
        position: relative;
        z-index: 0;
        transition: all ease 1s;
        width: 100%;
    }

    .ms-thumbnail.ms-thumbnail-left .ms-thumbnail-caption:before {
        right: 100%;
        left: auto;
        top: auto;
    }

    .ms-thumbnail .ms-thumbnail-caption:before {
        content: "";
        display: block;
        background-color: rgba(2, 104, 153, .6);
        position: absolute;
        left: 0;
        right: 0;
        top: 200%;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        transition: all ease .5s;
        -webkit-backface-visibility: hidden;
    }

    .ms-thumbnail.ms-thumbnail-left .ms-thumbnail-caption .ms-thumbnail-caption-content {
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .ms-thumbnail .ms-thumbnail-caption .ms-thumbnail-caption-content {
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%);
        transition: all ease .6s;
        -webkit-backface-visibility: hidden;
        padding: 20px;
        padding: 2rem;
        position: absolute;
        top: 50%;
        width: 100%;
    }

    .btn.btn-raised:not(.btn-link),
    .btn-group-raised .btn:not(.btn-link),
    .input-group-btn .btn.btn-raised:not(.btn-link),
    .btn-group-raised .input-group-btn .btn:not(.btn-link) {
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    }

    .btn.btn-raised.btn-yellow:hover {
        color: #fff;
        background-color: #dc9b02;
    }

    .ms-thumbnail.ms-thumbnail-left:hover .ms-thumbnail-caption,
    .ms-thumbnail.ms-thumbnail-left:focus .ms-thumbnail-caption {
        right: 0;
        left: auto;
        top: auto;
    }

    .ms-thumbnail.ms-thumbnail-left .ms-thumbnail-caption {
        right: 100%;
        left: auto;
        top: auto;
    }

    .ms-thumbnail .ms-thumbnail-caption {
        position: absolute;
        z-index: 1;
        left: 0;
        right: 0;
        top: -100%;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(2, 104, 153, .6);
        padding: 0;
        color: #fff;
        transition: all ease .5s;
        -webkit-backface-visibility: hidden;
    }

    .pricing-plan li {
        border-bottom: 1px dotted #ededed;
        font-size: 14px;
    }

    .pricing-plan {
        font-family: "Montserrat", sans-serif;
        margin-bottom: 50px;

    }

    .pricing-plan .card {
        -webkit-transition: transform .5s ease;
        -o-transition: transform .5s ease;
        transition: transform .5s ease;
    }

    .pricing-plan .card:hover {
        transform: scale(1.1);
    }

    .pricing-plan .card-header {
        font-family: "Montserrat", sans-serif;
        font-weight: 900;
        text-transform: uppercase;
        border-bottom: 1px solid #fff;
    }

    .pricing-plan .card li {
        padding: 8px 0;
    }

    .pricing-plan .tooltip-inner {
        max-width: 100% !important;

    }

    .set-price {
        background: #111;
        color: #ffffff;
    }

    .starter {
        background: #333;
        color: #ffffff;
    }

    .advanced {
        background: #111;
        color: #ffffff;
    }

    .business {
        background: #333;
        color: #ffffff;
    }

    .corporate {
        background: #111;
        color: #ffffff;
    }

    .bg-overlay {
        font-size: 18px;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem;
        line-height: 1.8em;
    }

    @media(max-width:767px) {
        .bg-overlay {
            font-size: 13px;
        }
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

<div class="banner">
    <div class="banner-content text-white">
        <div>
            <h1 class="text-white">Want Access To A High Performance <br> Forex Managed Account?</h1>
        </div>
        <div>
            <ul>
                <li> <i class="fas fa-check-circle"></i> No lock-in periods, entry, exit or annual management fees.</li>
                <li> <i class="fas fa-check-circle"></i> Access to highly experienced institutional traders</li>
                <li> <i class="fas fa-check-circle"></i> Minimum Investment $250,000</li>
            </ul>
        </div>
        <div>
            <h5><small>*Investments can go up and down. Past performance is not necessarily indicative of future performance.</small></h5>
        </div>
    </div>
</div>

@include('frontend.layouts.includes.trading-ticker')

<section id="token" class="mt-5 no-dots wow fadeInUp" data-wow-duration="0.6s">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="text-left mb-5 mt-4">
                    <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">FUND </strong>MANAGEMENT SERVICE</h2>
                    <p class="text-justify font-weight-normal mb-2">
                        Our Fund Management service is your key to making profits without doing anything except investing your money. Our team of experienced Fund Management Professionals, Forex Trading, and Financial Experts use their experience and knowledge to invest your money smartly to ensure profits every time.
                        <br>
                        This type of investment option is perfect for investors who lack the expertise or don’t have time to trade in their account. Our strategy focuses on developing models and strategies based on market price volatility. We do this while utilizing trading systems based on algorithmic trading models as well as incorporating a variety of non-predictive and discretionary models. This strategy enables us to minimize risk while maximizing profits from our trading.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 infographic-image">
                <div class="float-right">
                    <img src="assets/images/hexagons.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!--  End fund management services -->

<!--  Start trading strategy -->
<section id="token" class="mt-5 no-dots wow fadeInUp" data-wow-duration="0.6s">
    <div class="container">
        <div class="row align-items-center reverse-column-xs">
            <div class="col-lg-5 infographic-image ">
                <div class="float-left">
                    <img src="assets/images/hexagons.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="text-left mb-5 mt-4">
                    <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">trading </strong>strategy</h2>
                    <p class="text-justify font-weight-normal mb-2">
                        Our Fund Management service is your key to making profits without doing anything except investing your money. Our team of experienced Fund Management Professionals, Forex Trading, and Financial Experts use their experience and knowledge to invest your money smartly to ensure profits every time.
                        <br>
                        This type of investment option is perfect for investors who lack the expertise or don’t have time to trade in their account. Our strategy focuses on developing models and strategies based on market price volatility. We do this while utilizing trading systems based on algorithmic trading models as well as incorporating a variety of non-predictive and discretionary models. This strategy enables us to minimize risk while maximizing profits from our trading.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  End  trading strategy -->

<!-- START Copytrade services -->
<section class="section-full mobile-page-padding bg-cover pt-5 pb-5" style="background-image:url(assets/images/revenue-generation-background.jpg);background-position: center;background-attachment: fixed;min-height: 500px;">
    <div class="container">
        <div class="text-center mb-5 mt-4">
            <h2 class="font-weight-normal text-6 mb-4 text-white"><strong class="font-weight-extra-bold">world </strong> class trading portfolio</h2>
            <p class="text-justify pb-3 text-white bg-overlay">In this trading industry its really carry to become a FX mentor but difficult to because a profitable trader. Here in fxmastermind we are the true trader and really to provide you a rock solid guideline to because a profitiable and professional trader.</p>
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-light font-weight-bold text-color-dark mb-3" data-animation="fadeInUp" data-animation-delay="0.5s">check now <i class="ion-ios-arrow-thin-right"></i></a>
        </div>
    </div>
</section>
<!-- END Copytrade services -->

<!-- START pricing table -->
<section class="no-dots">
    <div class="text-center mb-5 mt-4">
        <h2 class="font-weight-normal text-6 mb-4 text-uppercase"><strong class="font-weight-extra-bold">Fund </strong>management package</h2>
    </div>
    <div class="container">
        @if(count($fundManagementPackages) > 0)
        <div class="pricing-plan card-group d-flex">
            <div class="card set-price p-1 d-none d-lg-none d-lg-block">
                <div class="card-header text-center pb-4 item" style="height: 80.2px;">
                    <h5 class="pt-3 text-white card-title"><i class="fas fa-hand-holding-usd"></i> Set-priced</h5>
                </div>
                <div class="card-body d-flex flex-column">
                    <ul class="list-unstyled text-right">
                        <li>Measurement Range</li>
                        <li data-toggle="tooltip" data-html="true" title="What is Profit Sharing? <br> Profit sharing refers to various incentive plans introduced by businesses "><i class="fas fa-info-circle"></i> Security Fund</li>
                        <li data-toggle="tooltip" data-html="true" title="What is Profit Sharing? <br> Profit sharing refers to various incentive plans introduced by businesses "><i class="fas fa-info-circle"></i> Profit Sharing</li>
                        <li>Profit Sharing Duration</li>
                        <li data-toggle="tooltip" data-html="true" title="What is Profit Sharing? <br> Profit sharing refers to various incentive plans introduced by businesses "><i class="fas fa-info-circle"></i> Minimum Contact</li>
                        <li data-toggle="tooltip" data-html="true" title="What is Profit Sharing? <br> Profit sharing refers to various incentive plans introduced by businesses "><i class="fas fa-info-circle"></i> Profit Target</li>
                        <li>Other Costing</li>
                    </ul>
                </div>
            </div>
            @foreach($fundManagementPackages as $package)

            <div class="card business p-1">
                <div class="card-header text-center pb-4 item" style="height: 80.2px;">
                    <h5 class="pt-3 text-white card-title"><i class="{{ $package->icon }}"></i> {{ $package->name }}</h5>
                </div>
                <div class="card-body d-flex flex-column">
                    <ul class="list-unstyled text-center">
                        @foreach($package->details as $each)
                        <li>
                            {{ $each['value'] }}
                        </li>
                        @endforeach
                    </ul>
                    <a class="btn btn-lg btn-block btn-outline-light mt-auto" href="{{ url('subscription/fund-management/' . $package->id) }}">Get started</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-warning">No Package Found</div>
        @endif
    </div>
</section>
<!-- END pricing table -->

<!-- FAQ Start -->
<section id="whitepaper" class="small_pb small_pt p-0 no-dots wow fadeInUp" data-wow-duration="0.9s">
    <div class="parallax-2">
        <div class="container all-service">
            <div class="row small_space pt-5 mb-5 mt-0 align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div id="accordion" class="faq_content">
                        @if(count($fundmanagement_faqs) > 0)
                        @foreach($fundmanagement_faqs as $key => $fundmanagement)
                        <div class="card">
                            <div class="card-header" id="headingOne_{{ $key }}">
                                <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne_{{ $key }}" aria-expanded="false" aria-controls="collapseOne_{{ $key }}">{{ $fundmanagement->question }} ?</a> </h6>
                            </div>
                            <div id="collapseOne_{{ $key }}" class="collapse" aria-labelledby="headingOne_{{ $key }}" data-parent="#accordion">
                                <div class="card-body">{!! $fundmanagement->answer !!}</div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning">No FAQ Found</div>
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
<div class="section-full mobile-page-padding p-t80 p-b50 bg-cover wow fadeInUp" style="background-image:url(assets/images/background/bg6.jpg);" data-wow-duration="1s">
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