@extends('frontend.layouts-v2.master')

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
    <div id="app">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::get('message'))
                        <p class="alert alert-success" style="text-align: center">{{ Session::get('message') }}</p>
                    @endif
                    @if(Session::get('error'))
                        <p class="alert alert-danger" style="text-align: center">{{ Session::get('error') }}</p>
                    @endif
                    @if(Session::get('incorrect'))
                        <p class="alert alert-danger" style="text-align: center">{{ Session::get('incorrect') }}</p>
                    @endif
                    
                    <login :show-link="{{ true }}" />
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
