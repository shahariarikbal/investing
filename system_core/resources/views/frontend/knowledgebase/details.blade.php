@extends('frontend.layouts-v2.master')

@section('support-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/knowledgebase.css') }}" />
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
<section class="knowledgebase p-0">
  <div class="top-wrapperbox">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex align-items-center justify-content-between">
            <div>
            <h1>{{ $slug->title }}</h1>
            </div>
            <div>
              <a href="{{ url('/knowledgebase') }}" class="text-info">Knowledge Base</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

      <!-- Start windows-7-items  -->
      <section class="windows-7-items">
        <div class="container">
          {{-- <div class="row mb-4">
            <div class="col-md-12">
              <!-- 16:9 aspect ratio -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
              </div>
            </div>
          </div> --}}
          <div class="row">
            <div class="col-md-12">
              <div class="">
                {!! $slug->body !!}
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End windows-7-items  -->
    </div>
  </div>
  <a href="{{ url('/kb-details') }}" class="link-box bg-info">
    <div class="container">
      Having a problem? Don't hesitate to contact us <i class="fas fa-caret-right"></i>
    </div>
  </a>
</section>
@endsection