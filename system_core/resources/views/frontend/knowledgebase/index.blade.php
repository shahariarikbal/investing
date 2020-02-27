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
<section class="knowledgebase">
  <div class="container">
    <div class="row">
      
      @foreach ($categories as $category)
      
      <div class="col-md-6 instruction-wrapper">
        
          <div class="box-shadow">
            <h3> {{ $category->name }}:</h3>
            <div class="list-group">
              @foreach($category->knowledges as $knowledge)
                <a href="{{ url('/knowledgebase-details/'.$knowledge->slug) }}" target="_blank" class="list-group-item">{{ $knowledge->title }}</a>
              @endforeach
            </div>
          </div>
        
      </div>
      @endforeach
    </div>
  </div>
  <a href="{{ url('/kb-details') }}" class="link-box bg-info">
    <div class="container">
      Having a problem? Don't hesitate to contact us <i class="fas fa-caret-right"></i>
    </div>
  </a>
</section>
@endsection