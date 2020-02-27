@extends('frontend.layouts-v2.master')

@section('about-us-active', 'active')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
    .welcome-section blockquote {
        padding: 10px 20px;
        margin: 0 0 20px;
        font-size: 17.5px;
        border-left: 5px solid #eee;
    }

    .offer-panel p {
        font-size: 20px;
        font-weight: 300;
    }

    .offer-panel ul li {
        font-weight: 300;
        line-height: 30px;
    }

    .offer-panel ul li i {
        margin-right: 5px;
    }

    .parallax-2 {
        background-image: url('/assets/images/hand.jpg');
        height: 570px;
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
        background-image: linear-gradient(to bottom right, #111, #000);
        opacity: .3;
    }

    .customer-banner-section .customer-content {
        margin-top: 100px;
    }

    .customer-banner-section h2 {
        line-height: 50px;
        font-size: 36px;
        font-weight: 200;
    }

    .customer-banner-section p {
        font-size: 24px;
        font-weight: 200;
        line-height: 42px;
        margin-bottom: 50px;
    }

    .service-work-area .icon-feature-content span:hover {
        background: #fff;
        color: #000;
    }

    .service-work-area .icon-feature-content h4 {
        font-weight: 300 !important;
    }

    .customer-content .btn-light:hover,
    .customer-content .btn-outline.btn-light:hover {
        color: #1b2d4c !important;

    }

    #carouselExampleIndicators-about .carousel-indicators {
        width: 100%;
        margin: 0;
        left: 0;
        bottom: -20px;
    }

    #carouselExampleIndicators-about .carousel-indicators li {
        border-color: #7d7c7c;
        border-radius: 5px;
        background: #7d7c7c;
        margin: 0;
        width: 60px;
        height: 4px;
        cursor: pointer;
        border-top: inherit !important;
        border-bottom: inherit !important;
    }

    #carouselExampleIndicators-about .carousel-indicators.white-color li {
        border-color: #fff;
        background: #fff;
    }

    #carouselExampleIndicators-about .carousel-indicators .active,
    #carouselExampleIndicators-about .carousel-indicators.white-color .active {
        background: #49a32b;
        border: 0;
        height: 4px;
        margin: 0;
        width: 60px;
    }

    @media(max-width:1199px) {
        .welcome-section img {
            width: 100%;
            margin-bottom: 10px;
        }
    }

    @media (max-width: 991px) {
        .column-reverses {
            flex-direction: column;
            flex-flow: column-reverse;
        }

        .flex-columns {
            flex-direction: column;
        }

    }

    @media (max-width: 767px) {
        .margin-top-4 {
            margin-top: 1.5rem;
        }
    }

    @media (max-width: 540px) {
        .customer-banner-section .customer-content {
            margin-top: 40px;
        }

        .customer-banner-section h2 {
            line-height: 36px;
            font-size: 22px;
        }

        .customer-banner-section p {
            font-size: 16px;
            font-weight: 200;
            line-height: 30px;
            margin-bottom: 30px;
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

@section('top-trading-ticker')
    @include('frontend.layouts.includes.trading-ticker')
@endsection

@section('content')
<div id="app"></div>
<section class="header-with-pic about-bg">
    <div class="middle-text">
        <h2>ABOUT US</h2>
        <p>We are at the forefront of innovation. <br />Discover with us the possibilities of your next dream.</p>
    </div>
</section>


<!--  Start About copytrade services -->
<section id="token" class="welcome-section no-dots wow fadeInUp" data-wow-duration="0.6s">
    <div class="container">
        <div class="row">
            <div class="text-center mb-5 mt-4">
                <h2 class="font-weight-normal text-6 mb-4 margin-top-4"><strong class="font-weight-extra-bold">welcome </strong> to investingpartner</h2>
                <p class="text-justify pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, ad quae voluptatem repellendus repudiandae eaque vitae quod deserunt pariatur laboriosam nisi! Modi similique voluptatem nulla dolore quisquam dignissimos voluptatibus blanditiis?</p>
            </div>
            <div class="col-xl-6">
                <div class="infographic-image">
                    <img src="assets/images/site-img.jpg" alt="">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="text-left mb-5">

                    <p class="text-justify font-weight-normal mb-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde earum explicabo nemo consectetur et voluptatibus eveniet sapiente totam aliquam laboriosam excepturi sequi, modi mollitia sint quod libero assumenda odio? Dolorum.
                    </p>
                    <blockquote class="blockquote">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>
                    <p class="text-justify font-weight-normal mb-2">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, aperiam ratione? Inventore, incidunt. Quidem alias impedit nulla id nostrum possimus quasi perspiciatis voluptas, accusantium non, commodi amet earum expedita nisi?
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!--  End About copytrade services -->



<!-- START SECTION OUR SERVICES CARDS -->
<section class="signal-report">

    <div class="icon-container">
        <div class="container">

            <h2 class="font-weight-normal text-6 mb-4 text-center"><strong class="font-weight-extra-bold">Why </strong>investingpartner is the best</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fas fa-dragon"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Granted Quality Service</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio suscipit officia laudantium sint maiores natu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fab fa-trade-federation"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Transparent Trading Portfolio</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio suscipit officia laudantium sint maiores natu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="far fa-handshake"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>20+ Years of Combined Experience</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio suscipit officia laudantium sint maiores natu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fas fa-comment-dollar"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>Market Leading Technology</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio suscipit officia laudantium sint maiores natu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fas fa-headset"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>24/7 Customer Support</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio suscipit officia laudantium sint maiores natu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-feature">
                        <div class="icon-feature-icon">
                            <span>
                                <i class="fas fa-server"></i>
                            </span>
                        </div>
                        <div class="icon-feature-content">
                            <h4>High Quality Server</h4>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio suscipit officia laudantium sint maiores natu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="font-weight-normal text-6 mb-4 text-uppercase margin-top-4"><strong class="font-weight-extra-bold">our </strong>core services</h2>
                    <p class="text-justify pb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure fugit eaque ea et. Perferendis, repudiandae numquam est velit quidem harum alias eaque ullam eum? Animi sint eligendi maiores nesciunt deleniti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start who we are -->
<section id="about" class="offer-panel">
    <div class="container">
        <div class="row align-items-center mb-5 flex-columns">
            <div class="col-lg-7 pr-5 wow fadeInRight" data-wow-duration="0.8s">
                <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">forex </strong> trading signal</h2>
                <p class="pr-2 mb-4">You will have access to FxVpsPro Web Affiliate Panel where you can track your clients and commissions earned. Very easy and intuitive panel that can be accessed from any web browser.</p>
                <div class="row mb-5">
                    <ul class="list-inline col-md-6">
                        <li><i class="fas fa-check-square"></i> Track Your User</li>
                        <li><i class="fas fa-check-square"></i> Up to 30% Commision</li>
                        <li><i class="fas fa-check-square"></i> No Restriction & Limitaion</li>
                    </ul>
                    <ul class="list-inline col-md-6">
                        <li><i class="fas fa-check-square"></i> Instant Withdraw</li>
                        <li><i class="fas fa-check-square"></i> Super Micro Server</li>
                        <li><i class="fas fa-check-square"></i> Premium Bangwidth</li>
                    </ul>
                </div>
                <!-- <a href="javascript:void(0)" class="btn btn-default custom-btn page-scroll"><span>VIEW MORE</span> <i class="fas fa-long-arrow-alt-right"></i></a> -->
                <a href="{{ url('/forex-signal-package') }}" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4">join now <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            <div class="col-lg-5 col-md-8 res_md_mt_30 d-flex justify-content-center">
                <div class="infographic-image">
                    <img src="assets/images/site-img-1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End who we are -->

<!-- Start who we are -->
<section id="about" class="offer-panel section">
    <div class="container">
        <div class="row align-items-center mb-5 column-reverses">
            <div class="col-lg-5 col-md-8 res_md_mt_30 d-flex justify-content-center">
                <div class="infographic-image">
                    <img src="assets/images/site-img-2.png" alt="">
                </div>
            </div>
            <div class="col-lg-7 pr-5 wow fadeInRight" data-wow-duration="0.8s">
                <h2 class="font-weight-normal text-6 mb-4 text-right margin-top-4"><strong class="font-weight-extra-bold">forex </strong> copytrade service</h2>
                <p class="pr-2 mb-4 text-justify">Financial software should be run on stable, secure enterprise hardware. With membership in our Forex Affiliate Program, you can extend the luxury of ultra-low latency hosting to your clients or users, while we handle the systems administration and technical support.</p>
                <div class="row mb-5">
                    <ul class="list-inline col-md-6">
                        <li><i class="fas fa-check-square"></i> Instant Withdraw</li>
                        <li><i class="fas fa-check-square"></i> No Restriction & Limitaion</li>
                        <li><i class="fas fa-check-square"></i> Up to 30% Commision</li>
                    </ul>
                    <ul class="list-inline col-md-6">
                        <li><i class="fas fa-check-square"></i> Track Your User</li>
                        <li><i class="fas fa-check-square"></i> Super Micro Server</li>
                        <li><i class="fas fa-check-square"></i> Premium Bangwidth</li>
                    </ul>
                </div>
                <!-- <a href="javascript:void(0)" class="btn btn-default custom-btn page-scroll"><span>VIEW MORE</span> <i class="fas fa-long-arrow-alt-right"></i></a> -->
                <a href="{{ url('/copytrade') }}" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4 float-right">join now <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- End who we are -->

<!-- Start who we are -->
<section id="about" class="offer-panel">
    <div class="container">
        <div class="row align-items-center mb-5 flex-columns">
            <div class="col-lg-7 pr-5 wow fadeInRight" data-wow-duration="0.8s">
                <h2 class="font-weight-normal text-6 mb-4 margin-top-4"><strong class="font-weight-extra-bold margin-top-4">fund </strong> management service</h2>
                <p class="pr-2 mb-4">Our managed VPS environments are easy to maintain and remain online continuously. This means that your users will have less technical problems and more time to spend with your product. If they do need help on the system side, we are available to support them 7 days a week.</p>
                <div class="row mb-5">
                    <ul class="list-inline col-md-6">
                        <li><i class="fas fa-check-square"></i> Track Your User</li>
                        <li><i class="fas fa-check-square"></i> Up to 30% Commision</li>
                        <li><i class="fas fa-check-square"></i> No Restriction & Limitaion</li>
                    </ul>
                    <ul class="list-inline col-md-6">
                        <li><i class="fas fa-check-square"></i> Instant Withdraw</li>
                        <li><i class="fas fa-check-square"></i> Super Micro Server</li>
                        <li><i class="fas fa-check-square"></i> Premium Bangwidth</li>
                    </ul>
                </div>
                <!-- <a href="javascript:void(0)" class="btn btn-default custom-btn page-scroll"><span>VIEW MORE</span> <i class="fas fa-long-arrow-alt-right"></i></a> -->
                <a href="{{ url('/fund-management') }}" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4">join now <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            <div class="col-lg-5 col-md-8 res_md_mt_30 d-flex justify-content-center">
                <div class="infographic-image">
                    <img src="{{ asset('/assets/') }}/images/site-img-3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End who we are -->


<!-- FAQ Start -->
<section id="whitepaper" class="small_pb small_pt p-0 no-dots wow fadeInUp customer-banner-section" data-wow-duration="0.9s">
    <div class="parallax-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-center flex-column customer-content">
                        <div class="text-center">
                            <h2 class="mb-4 text-white"><strong class="font-weight-extra-bold">24/7 </strong> CUSTOMER SERVICE<br>
                                SUPPORTED BY PROFESSIONALS</h2>
                            <p class="text-center text-white bg-overlay">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-light btn-modern btn-lg btn-outline rounded-0 py-2 px-4 text-white">Call Us Now! <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ End -->


<section class="service-work-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-12 col-md-6">
                <h2 class="font-weight-normal text-4 mb-4 margin-top-4"><strong class="font-weight-extra-bold">our services</strong></h2>
                <div class="icon-feature">
                    <div class="icon-feature-icon">
                        <span class="bg-dark border-0 text-white">
                            <i class="fas fa-hands-helping"></i>
                        </span>
                    </div>
                    <div class="icon-feature-content">
                        <h4>Easy to Manage</h4>
                        <p>Excepteur sit occaecat cupidatan is proident, one sunt in culpa dui elit.</p>
                    </div>
                </div>
                <div class="icon-feature">
                    <div class="icon-feature-icon">
                        <span class="bg-success border-0 text-white">
                            <i class="fas fa-cogs"></i>
                        </span>
                    </div>
                    <div class="icon-feature-content">
                        <h4>Technical Service</h4>
                        <p>Excepteur sit occaecat cupidatan is proident, one sunt in culpa dui elit.</p>
                    </div>
                </div>
                <div class="icon-feature">
                    <div class="icon-feature-icon">
                        <span class="bg-dark border-0 text-white">
                            <i class="fab fa-chrome"></i>
                        </span>
                    </div>
                    <div class="icon-feature-content">
                        <h4>Website Optimization</h4>
                        <p>Excepteur sit occaecat cupidatan is proident, one sunt in culpa dui elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 d-none d-sm-none d-md-none d-lg-block">
                <h2 class="font-weight-normal text-4 mb-4"><strong class="font-weight-extra-bold">OUR WORKS</strong></h2>
                <div id="carouselExampleIndicators-about" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators-about" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators-about" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators-about" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('/assets/') }}/images/site-img4.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/') }}/images/site-img-5.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/') }}/images/site-img-6.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 col-md-6">
                <h2 class="font-weight-normal text-4 mb-4"><strong class="font-weight-extra-bold">WHAT WE DO</strong></h2>
                <div class="icon-feature">
                    <div class="icon-feature-icon">
                        <span class="bg-dark border-0 text-white">
                            <i class="fab fa-chrome"></i>
                        </span>
                    </div>
                    <div class="icon-feature-content">
                        <h4>Website Optimization</h4>
                        <p>Excepteur sit occaecat cupidatan is proident, one sunt in culpa dui elit.</p>
                    </div>
                </div>
                <div class="icon-feature">
                    <div class="icon-feature-icon">
                        <span class="bg-dark border-0 text-white">
                            <i class="fas fa-phone-square"></i>
                        </span>
                    </div>
                    <div class="icon-feature-content">
                        <h4>24/7 Customer Support</h4>
                        <p>Excepteur sit occaecat cupidatan is proident, one sunt in culpa dui elit.</p>
                    </div>
                </div>
                <div class="icon-feature">
                    <div class="icon-feature-icon">
                        <span class="bg-success border-0 text-white">
                            <i class="fas fa-cogs"></i>
                        </span>
                    </div>
                    <div class="icon-feature-content">
                        <h4>Technical Service</h4>
                        <p>Excepteur sit occaecat cupidatan is proident, one sunt in culpa dui elit.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS SECTION START -->
<div class="parallax wow fadeInLeft" data-wow-duration="0.8s">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5 mt-4">
                        <h2 class="font-weight-normal text-6 mb-4 text-white"><strong class="font-weight-extra-bold">Client </strong>Review</h2>
                    </div>
                    <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('/assets/') }}/images/review1.jpg" class="img-fluid rounded-circle " alt="...">
                                    </div>
                                    <div class="text-center">
                                        <p class=" mb-4 text-white">I have used this service since the end of May, can't really fault it, running two MT4 platforms, with EA's, no problems, customer service excellent, and a good price, highly recommended.</p>
                                        <h5 class="text-capitalize text-white font-weight-200">Bishal Kumar / <i>from</i> India</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('/assets/') }}/images/review2.jpg" class="img-fluid rounded-circle " alt="...">
                                    </div>
                                    <div class="text-center">

                                        <p class=" mb-4 text-white">I have used this service since the end of May, can't really fault it, running two MT4 platforms, with EA's, no problems, customer service excellent, and a good price, highly recommended.</p>
                                        <h5 class="text-capitalize text-white font-weight-200">Steve Hopwood / <i>from</i> Germany</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('/assets/') }}/images/review3.jpg" class="img-fluid rounded-circle " alt="...">
                                    </div>
                                    <div class="text-center">

                                        <p class=" mb-4 text-white">I have used this service since the end of May, can't really fault it, running two MT4 platforms, with EA's, no problems, customer service excellent, and a good price, highly recommended.</p>

                                        <h5 class="text-capitalize text-white font-weight-200">Alex Lenz / <i>from</i> United States</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- START SECTION WHITEPAPER & CONTACT -->
</div>
<!-- TESTIMONIALS SECTION END -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="font-weight-normal text-6 mb-5 margin-top-4"><strong class="font-weight-extra-bold">payment </strong>method</h2>
                    <img src="{{ asset('/assets/') }}/images/payment/payment.png" alt="">
                    <p class="text-muted mt-3">We also accept other payment processor including <b>Card Payment</b>, <b>Crypto</b>, <b>WebMoney</b>, <b>Payeer</b>, <b>FasaPay</b>, <b>Payza & Bank Transfer</b></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection