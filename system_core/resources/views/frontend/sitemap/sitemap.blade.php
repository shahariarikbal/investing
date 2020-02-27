@extends('frontend.layouts-v2.master')

@section('about-us-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/sitemap.css') }}" />
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
<section class="sitemap">
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
            <li><a href="{{ url('career') }}">Career</a></li>
            <li><a href="{{ url('affiliate') }}">Affiliate Programme</a></li>
            <li><a href="{{ url('testimonial') }}">Review Testimonial </a></li>
            <li><a href="{{ url('sitemap') }}" class="active">Site Map</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="listing-details-bar">
          <div class="row">
            <div class="col-md-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('aboutus') }}">About Us</a></li>
                </ol>
              </nav>
              <span>About Us</span>
              <h6><i class="fas fa-plus"></i> Site Map</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  home-card">
              <div class="card">
                <div class="card-header">
                  <a href="{{ url('/') }}">Home</a>
                </div>
                <div class="card-body">
                  <ul>
                    <li>
                      <a href="#" class="text-capitalize">open an account</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  aboutus-card">
              <div class="card">
                <div class="card-header">
                  <a href="{{ url('aboutus') }}">about us</a>
                </div>
                <div class="card-body">
                  <ul>
                    <li>
                      <a href="{{ url('aboutus') }}" class="text-capitalize">Why Investing Partner</a>
                    </li>
                    <li>
                      <a href="{{ url('regulation') }}" class="text-capitalize">Our Regulation</a>
                    </li>
                    <li>
                      <a href="{{ url('newsrelease') }}" class="text-capitalize">News Release</a>
                    </li>
                    <li>
                      <a href="{{ url('career') }}" class="text-capitalize">Career</a>
                    </li>
                    
                    <li>
                      <a href="{{ url('sitemap') }}" class="text-capitalize">Sitemap</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  coreservice-card">
              <div class="card">
                <div class="card-header">
                  <a href="javascript:void(0)">core services</a>
                </div>
                <div class="card-body">
                  <ul>
                    <li>
                      <a href="{{ url('forex-signal-package') }}" class="text-capitalize">Premium Signal  </a>
                    </li>
                    <li>
                      <a href="{{ url('copytrade') }}" class="text-capitalize">CopyTrade Service</a>
                    </li>
                    <li>
                      <a href="{{ url('fund-management') }}" class="text-capitalize">Fund Management</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  signal-card">
              <div class="card">
                <div class="card-header">
                  <a href="javascript:void(0)">signal</a>
                </div>
                <div class="card-body">
                  <ul>
                    <li>
                      <a href="{{ url('forex-signal') }}" class="text-capitalize">Free Forex Signal  </a>
                    </li>
                    <li>
                      <a href="{{ url('forex-signal-package') }}" class="text-capitalize">Premium Signal Packages</a>
                    </li>
                    <li>
                      <a href="{{ url('forex-signal-report') }}" class="text-capitalize">Performance Report</a>
                    </li>
                    <li>
                      <a href="{{ url('signal-faq') }}" class="text-capitalize">Signal Faq Section</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  analysis-card">
              <div class="card">
                <div class="card-header">
                  <a href="{{ url('/analysis') }}">Analysis</a>
                </div>
                <div class="card-body">
                  <ul>
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  review-card">
              <div class="card">
                <div class="card-header">
                  <a href="javascript:void(0)">Review Section</a>
                </div>
                <div class="card-body">
                  <ul>
                    <li>
                      <a href="{{ url('forex-brokers') }}" class="text-capitalize">Forex Broker Reviews  </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  more-card">
              <div class="card">
                <div class="card-header">
                  <a href="javascript:void(0)">more</a>
                </div>
                <div class="card-body">
                  <ul>
                      <li>
                        <a href="{{ url('blog') }}" class="text-capitalize">Official Blog  </a>
                      </li>
                    <li>
                      <a href="{{ url('affiliate') }}" class="text-capitalize">Affiliate Programme  </a>
                    </li>
                    <li>
                      <a href="{{ url('testimonial') }}" class="text-capitalize">Review Testimonial   </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6  support-card">
              <div class="card">
                <div class="card-header">
                  <a href="javascript:void(0)">support</a>
                </div>
                <div class="card-body">
                  <ul>
                      <li>
                        <a href="{{ url('contact-us') }}" class="text-capitalize">Contact Us  </a>
                      </li>
                    <li>
                      <a href="{{ url('/faq') }}" class="text-capitalize">FAQ Section  </a>
                    </li>
                    <li>
                      <a href="{{ url('/kb') }}" class="text-capitalize">Knowledgebase   </a>
                    </li>
                  </ul>
                </div>
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