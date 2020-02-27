@extends('frontend.layouts-v2.master')

@section('about-us-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/newsrelease.css') }}" />
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
<section class="newsrelease">
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
            <li><a href="{{ url('newsrelease') }}" class="active">News Release</a></li>
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
                  <li class="breadcrumb-item"><a href="#">About US</a></li>
                </ol>
              </nav>
              <span class="title">About Us</span>
              <h6><i class="fas fa-plus"></i> News Releases</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="content-details">
                <p>
                  InvestingPartner is very excited to announce the launch of our new and improved website on <a href="javascript:void(0)" class="text-danger">11th June 2012..</a>
                  <br><br>
                  Our new site has been redesigned with a fresh new look and has been updated with information about our latest products and services. The new website is designed to allow users to quickly find the content they are looking for and more user-friendly. While checking out our new website, if you find any part of the website is not working properly, please notify us at <a href="#" class="text-danger"> sales@InvestingPartner.co</a> .
                  <br><br>
                  We hope you enjoy!
                </p>
                <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
                <div class="mt-5 mb-4">
                  <img src="http://www.trillionfx.co/trader/news/img/newzealand.jpg" class="img-fluid" alt="">
                </div>
                <p>
                  We have great new incentive for you! Whether you are a newbie or existing clients, you could win a completely <span class="text-large text-uppercase">FREE 7D6N NEW ZEALAND TOUR</span> incentive with flight, accommodation and meals included! New Zealand constantly rates as one of the worldâ€™s most desirable destinations for pleasure. This is coupled with unique natural attractions and activities that make New Zealand a talking point around the globe.
                  <br><br>
                  All you have to do is to achieve personal group sales of <span class="text-large text-capitalize">US$ 1Mil new deposits</span> from all clients including existing and new clients from <span class="text-large text-capitalize">1st June 2012 till 31st October 2012</span> You are not limited to 1 ticket and could win as many tickets as possible when you achieve double or even triple the deposits requirement. In case any affiliate is qualified under your group, he/she shall contribute US$200,000 into your group sales.
                  <br><br>
                  All winners shall be notified 1 week after the closing of the above period and the estimated schedule of the tour shall be within <span class="text-large text-capitalize">April / May 2013</span> So, what are you waiting for? Get yourself ready to win this exclusive tour incentive as many tickets as you can! 
                  <br><br>
                  If you have any enquiries, please contact us at sales@InvestingPartner.co .
                  <br><br>
                  <span class="text-large text-capitalize">About New Zealand</span><br>
                  New Zealand is a world unto itself - culturally and geographically. It has a continent's worth of scenery crammed into its two main islands - having every geographical feature you can think of, plus more! It is frequently described as having the most beautiful scenery in the world, even having the most beautiful walk in the world (National Geographic). It is free of poisonous or dangerous predators and you need not be subjected to annoying vaccinations or malaria pills. In other words â€œA Paradiseâ€, an ideal boutique tourism destination.
                </p>
                <div class="mt-5 mb-4">
                  <img src="http://www.trillionfx.co/trader/news/img/nznz.jpg" class="img-fluid" alt="">
                </div>
                <p>
                  <span class="text-large text-capitalize">Terms and Conditions:</span>
                </p>
                <ol>
                  <li>The tickets are not transferable to non affiliates or clients. Extensions are given to immediate family members of affiliates only.</li>
                  <li>If a qualifying affiliate does not wish to claim the ticket, shall exchange a ticket for 10 premium + 10 ultimate activation codes.</li>
                  <li>Affiliates who claim tickets shall ensure their clients remain trading up to 180 days, otherwise US$3,000 will be deducted from their affiliate bonus.</li>
                  <li> This promotion cannot be combined with any other promotion.</li>
                </ol>
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