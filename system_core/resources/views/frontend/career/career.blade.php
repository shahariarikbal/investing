@extends('frontend.layouts-v2.master')

@section('about-us-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/career.css') }}" />
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
<section class="career">
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
            <li><a href="{{ url('regulation') }}">Our Regulation</a></li>
            <li><a href="{{ url('newsrelease') }}">News Release</a></li>
            <li><a href="{{ url('career') }}" class="active">Career</a></li>
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
                  <li class="breadcrumb-item"><a href="#">About US</a></li>
                </ol>
              </nav>
              <span class="title">About Us</span>
              <h6><i class="fas fa-plus"></i> Careers at Investing Partenr</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="bg-image" style="background-image:url(../assets/images/tfxoffice.jpg)">
                <div class="content">
                  <p>CAREERS<br><span>at InvestingPartner</span></p>
                  
                </div>
              </div>
              <div class="content-details">
                <p>
                investingPartner strives to offer attractive remuneration and unique working environment. If you have the talent and looking for fun and challenging job, then please send your CV to our HR Department at <a href="#" class="emailLink">hr@investingPartner.co</a> . Should there be a potential suitable role then we will contact you.
                </p>
                <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
                <span class="title-text">investingPartner offers job opportunities in the following areas:</span>
              </div>
            </div>
          </div>
          <div class="row job">
            <div class="col-md-4">
              <ul>
                  <li>Marketing</li>
                  <li>IT</li>
                  <li>Finance</li>
                  <li>Compliance & Regulation</li>
                </ul>
            </div>
            <div class="col-md-8">
              <ul>
                  <li>Product Development </li>
                  <li>Sales</li>
                  <li>Customer Service</li>
                  <li>Human Resources</li>
                </ul>
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