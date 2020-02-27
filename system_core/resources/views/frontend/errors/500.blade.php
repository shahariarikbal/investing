@extends('frontend.layouts-v2.master')


@section('style')
<style>
  #main {
    display: table;
    width: 100%;
    height: 50vh;
    text-align: center;
  }

  .fof {
    display: table-cell;
    vertical-align: middle;
  }

  .fof h1 {
    font-size: 200px;
    display: inline-block;
    padding-right: 12px;
    animation: type .5s alternate infinite;
    font-weight: 500;
    color: #A0A0A0;
  }

  .fof p {
    font-size: 25px;
    color: #A0A0A0;
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

<section class="faq-main">
  <div id="main">
    <div class="fof">
      <h1> 500</h1>
      <p>Internal Server Error</p>
    </div>
  </div>
</section>

@endsection