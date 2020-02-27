@extends('frontend.layouts-v2.master')

@section('support-active', 'active')

@section('style')
    <style>
  section.header-with-pic {
      height: 550px;
  }      
.middle-text p {
    color: #ffffff;
    margin: 20px 0 0 0;
    font-style: italic;
    font-weight: 400;
}
.middle-text p:before, .middle-text p:after {
    opacity: 1;
}
.middle-text p:before {
    margin-right: 20px;
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
    <section class="header-with-pic faq-bg">
        <div class="middle-text">
            <!-- <h2>FAQ</h2>
            <p>We are at the forefront of innovation. <br/>Discover with us the possibilities of your next dream.</p> -->
        </div>
    </section>
    <section class="faq-main">

        <div class="container">
            <div class="row">
                <div class="shapes lreg">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape1 mid-shape"></div>
                </div>
            </div>
            <div class="row">
            @if(count($signal_faqs) > 0)
                @foreach($signal_faqs as $levelOne => $faqs)
                    <div class="col-lg-6 col-md-6">
                        <div id="accordion_{{ $levelOne }}" class="faq_content">
                            @foreach($faqs as $level_two => $faq)
                            <div class="card">
                                <div class="card-header" id="heading_{{ $levelOne }}_{{ $level_two }}">
                                    <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse_{{ $levelOne }}_{{ $level_two }}" aria-expanded="false" aria-controls="collapse_{{ $levelOne }}_{{ $level_two }}">{{ $faq['question'] }}</a> </h6>
                                </div>
                                <div id="collapse_{{ $levelOne }}_{{ $level_two }}" class="collapse" aria-labelledby="heading_{{ $levelOne }}_{{ $level_two }}" data-parent="#accordion_{{ $levelOne }}">
                                    <div class="card-body">{!! $faq['answer'] !!}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-3"></div>    
                <div class="alert alert-warning col-lg-6 text-center mt-5" role="alert">No FAQ Found</div>
                <div class="col-lg-3"></div>
            @endif
            </div>
            </div>
        </div>

    </section>
    <!-- Share Float -->
    <div class="floating-share">
        <div class="social-shares"></div>
    </div>
@endsection
