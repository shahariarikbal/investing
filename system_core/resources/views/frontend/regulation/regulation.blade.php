@extends('frontend.layouts-v2.master')

@section('about-us-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/regulation.css') }}" />
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
<section class="regulations">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="listing-bar">
          <ul class="linking-acount">
            <li>
              <a href="#">
                <i class="fas fa-chevron-right mr-1"></i> Open a Live Account
              </a>
            </li>
          </ul>
          <ul>
            <li><a href="{{ url('regulation') }}" class="active">Our Regulation</a></li>
            <li><a href="{{ url('newsrelease') }}">News Release</a></li>
            <li><a href="{{ url('career') }}">Career</a></li>
            <li><a href="{{ url('affiliate') }}">Affiliate Programme</a></li>
            <li><a href="{{ url('testimonial') }}">Review Testimonial </a></li>
            <li><a href="{{ url('sitemap') }}">Site Map</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="listing-details-bar">
          <div class="row">
            <div class="col-md-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/') }">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">About Us</a></li>
                </ol>
              </nav>
              <span>About Us</span>
              <h6><i class="fas fa-plus"></i> Regulation</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="bg-image" style="background-image:url(../assets/images/quotebg.jpg)">
                <div class="content">
                  <p>WE STRIVE TO OFFER THE MOST SOPHISTICATED PROFESSIONAL MANAGED FUND SERVICES WITH EFFICIENTCY, INTEGRITY AND THE BEST POSSIBLE CUSTOMER SUPPORT.</p>
                  <small>Nuno Cruz, Senior Fund Manager, InvestingPartner</small>
                </div>
              </div>
              <div class="content-details">
                <p>
                  InvestingPartner has over 15 years of experience in offering private fund management services, and more than 20 years of experience in financial quantitative analytics and trading. InvestingPartner is one of the global advanced proprietary electronic trading firm through the collaboration of highly motivated and intelligent HFT technology firm in US. InvestingPartner is a highly successful fund management company with very positive reputation in the industry. Our experience enables us to understand fully the fund management needs of our customers.
                </p>
                <ul>
                  <li>InvestingPartner strives hard to provide all its clients advanced and the most sophisticated managed fund services.</li>
                  <li>InvestingPartner aspires to be the world's number one managed fund firm.</li>
                  <li>InvestingPartner is committed to achieving the highest level of client satisfaction delivering the best managed fund service.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="purposes">
                <span>Vision and Mission</span>
                <p>
                Our investment approach is driven by a combination of fundamental research, advanced market analysis, revolutionary technology platform and a persistent drive to excel on behalf our investors. We enjoy good reputation in the industry by delivering our client s with consistently dependable fund management services. We have established our credibility in the industry by offering our customers with transparent and honest services.
                <br><br>
                InvestingPartner manages funds for thousands of customers from all over the world. InvestingPartner enjoys the highest rate of client satisfaction in the industry. Our team execute various trading strategies in equities, futures, FX, options and commodities, providing two-sided liquidity on over two hundred market centers around the world. Our team works tirelessly to ensure that every client's investment brings about steady return. Principal of our HFT team is development of revolutionary technology, designed to automate market making and post-trade activities to accumulate large profits over times
                <br><br>
                InvestingPartner takes pride in being one of the fastest growing fund management service providers. We are a highly professional yet friendly team of managed fund services company. You will find it very easy to interact with our efficient team. We have set up an impeccable communication system that allows you to interact with our team in the most efficient way. You can confidently entrust your funds to InvestingPartner and know that our experts will make your funds work harder for you and get excellent returns. Our positive reputation is your insurance, we will never do anything that will subject our hard earned reputation to risk. Our mission in fact is becoming the most reputed and the most trusted managed funds service provider in the industry. We have already taken great strides in this direction, we assure you that we will serve you with the best of our abilities and make your funds grow steadily.
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection