@extends('frontend.layouts-v2.master')

@section('blog-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/testimonial.css') }}" />
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
<section class="testimonials">
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
            <li><a href="{{ url('testimonial') }}" class="active">Review Testimonial </a></li>
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
                  <li class="breadcrumb-item"><a href="#">More</a></li>
                </ol>
              </nav>
              <span class="title">More</span>
              <h6><i class="fas fa-plus"></i> Review Testimonial</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="content-details">
                  <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
                  <div class="media mb-1">
                    <img src="../assets/images/tfx-testilarge2011-12a.jpg" width="105" height="140" class="mr-3 img-thumbnail img-fluid" alt="...">
                    <div class="media-body">
                      <h5 class="mt-0 title-text">Kathy (Brisbane, Australia)</h5>
                      <p>
                      It's a great work done by TrillionFX! I must say it's a very reliable trading platform, the trading performance and customer support are absolutely above my expectation. For the past 6 months, I’ve been introducing to a couple of friends and they always thank me for giving them such an unprecedented recommendation. 
                      </p>
                    </div>
                  </div>
                  <div class="media mb-1">
                    <img src="../assets/images/tfx-testilarge2011-12b.jpg" width="105" height="140" class="mr-3 img-thumbnail img-fluid" alt="...">
                    <div class="media-body">
                      <h5 class="mt-0 title-text">Xiao Ling (Guilin, China)</h5>
                      <p>
                      At the beginning I do not believe what my friend told me. I’ve tried for almost 10 months and now I really start believing the results. It’s really happening in my own account. Thank you TrillionFX!
                      </p>
                    </div>
                  </div>
                  <div class="media mb-1">
                    <img src="../assets/images/tfx-testilarge2011-12c.jpg" width="105" height="140" class="mr-3 img-thumbnail img-fluid" alt="...">
                    <div class="media-body">
                      <h5 class="mt-0 title-text">Ka Seong (Penang, Malaysia)</h5>
                      <p>
                      I am very happy with a return of >80% in 12 months. Thanks TrillionFX! I will share this with friends & families.
                      </p>
                    </div>
                  </div>
                  <div class="media mb-1">
                    <img src="../assets/images/tfx-testilarge2011-08a.jpg" width="105" height="140" class="mr-3 img-thumbnail img-fluid" alt="...">
                    <div class="media-body">
                      <h5 class="mt-0 title-text">Vincent Lim (Singapore City, Singapore)</h5>
                      <p>
                      The feeling is great to be able win my first prize from TrillionFX! My hard work had indeed made many people richer at the same time. Thank you TrillionFX keep up your fantastic work!
                      </p>
                    </div>
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