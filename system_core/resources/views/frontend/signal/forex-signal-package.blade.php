@extends('frontend.layouts-v2.master')

@section('signal-active', 'active')

@section('style')
<style>
    .snip1265 .plan:nth-child(2) {
        margin-top: -20px;
    }

    .snip1265 header {
        padding: 10px;
    }

    .snip1265 header i {
        font-size: 40px;
        margin-top: 1rem;
    }

    @media(min-width:768px) and (max-width:991px) {
        .snip1265 header i {
            font-size: 25px;
        }

        .snip1265 .plan-title {
            font-size: 15px;
        }

        .snip1265 .plan-price {
            font-size: 1em;
        }

        .snip1265 .plan-features li {
            padding: 2px 5%;
            margin: 0px 0px;
        }

        .snip1265 .plan-select a {

            padding: 3px 10px;
            margin: 10px 0;
            border-radius: 10%;
            font-size: 0.55em;

        }
    }

    @media(max-width:767px) {
        .snip1265 .plan {
            width: 100%;
            margin-bottom: 10px;
        }

        .snip1265 .plan:nth-child(2) {
            margin-top: 0
        }

        .snip1265 header {
            text-align: center;
        }

        .snip1265 header i,
        .border-combo {
            display: none;
        }

        .fx_tri {
            margin-top: 3rem;
        }

        .privacy-policy-section {
            margin-top: 2rem;
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
@include('frontend.layouts.includes.trading-ticker')

<section class="fx_tri">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2 text-center">
                <div class="">
                    <h2>Signal Packages</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Aenean massa</p>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="shapes lreg">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape1 mid-shape"></div>
                </div>
                <div class="col-12 p-0 privacy-policy-section">
                    <h4>About Our Packages</h4>
                    <div class="border-combo">
                        <p class="line-green"></p>
                        <p class="line-rellow"></p>
                    </div>
                    <p><strong>Third Parties.</strong> We work with third parties to provide some of our Services. For example, our Third-Party Providers send a verification code to your phone number when you register for our Services. These providers are bound by their Privacy Policies to safeguard that information. If you use other Third-Party Services like YouTube, Spotify, Giphy, etc. in connection with our Services, their Terms and Privacy Policies govern your use of those services.</p>
                    <p>Other instances where Signal may need to share your data</p>
                    <ul>
                        <li>
                            <p>To meet any applicable law, regulation, legal process or enforceable governmental request.</p>
                        </li>
                        <li>
                            <p>To enforce applicable Terms, including investigation of potential violations.</p>
                        </li>
                        <li>
                            <p>To detect, prevent, or otherwise address fraud, security, or technical issues.</p>
                        </li>
                        <li>
                            <p>To protect against harm to the rights, property, or safety of Signal, our users, or the public as required or permitted by law.</p>
                        </li>
                    </ul>

                </div>

            </div>
            <div class="col-12 mt-3 sig-packages">
                <div class="snip1265">
                    @if(count($forexSignalPackage) > 0)
                    @foreach($forexSignalPackage as $package)
                    <!-- PROFESSIONAL Plan -->
                    <div class="plan">
                        <header>
                            <i class="{{ $package->icon }}"></i>
                            <h4 class="plan-title">
                                {{ $package->name }}
                            </h4>
                            <div class="plan-cost"><span class="plan-price">$ {{ $package->discount > 0 ? ($package->price)/100*($package->discount) : $package->price }}</span><span class="plan-type">/{{ $package->duration }}</span></div>
                        </header>
                        <ul class="plan-features">
                            @foreach($package->details as $each)
                            <li>{{ $each['key'] }}&nbsp;{{ $each['value'] }}</li>
                            @endforeach
                        </ul>
                        <div class="plan-select">
                            <a class="subscribe" href="{{ url('subscription/signal/' . $package->id) }}">Select Plan</a>
                        </div>
                    </div>
                    <!-- PROFESSIONAL Plan End -->
                    @endforeach
                    @else
                    <div class="alert alert-warning">No Package Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection