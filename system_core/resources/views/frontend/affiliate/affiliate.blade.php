@extends('frontend.layouts-v2.master')

@section('blog-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/affiliate.css') }}" />
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
<section class="affiliate">
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
            <li><a href="{{ url('affiliate') }}" class="active">Affiliate Programme</a></li>
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
                  <li class="breadcrumb-item"><a href="#">More</a></li>
                </ol>
              </nav>
              <span class="title">More</span>
              <h6><i class="fas fa-plus"></i> Affiliate Programme</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="content-details">
                <p>
                  Welcome to Investing Partner affiliate program! Whether you are an investor or someone who is looking for excellent options to make money online.
                </p>
                <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
                <p>
                  <span class="title-text">What is expected of the affiliate?</span>
                  
                  It is very simple all you have to do is to introduce new clients to Investing Partner. You just need to send us new clients and start making money. You are free to use your own strategies to market our services as a registered Investing Partner affiliate. It can be your friends or acquaintances or your own family members too. When you introduce someone to Investing Partner you are doing a great favor to the m because Investing Partner is one of the most trusted funds management companies that offers excellent returns on client's investment.
                  <br><br>
                  When you introduce new clients to our company, you will be able to enjoy non-stop affiliate bonus as long as the clients that you introduce us keep trading using our services. So unlike many other affiliate programs, the reward does not stop with one time commissions. You will earn an ongoing residual income besides the returns that you get ting from your own investments . More over you should be happy that you are introducing one of the best service providers in the segment to your friends and family.
                  <br><br>
                  Our affiliate program has been very carefully designed to ensure that the program creates an excellent win-win platform for both affiliates and for the company. If you are looking for sustained income generation options, then choose our lucrative affiliate program. You will be able to enjoy ongoing income to supplement your investment returns. The company does not place any cap on the highest level of recurring income that you can enjoy. This simply means that you can introduce as many clients as you like and increase your residual income. The best part with Investing Partner affiliate program is that your efforts pay you rich and lasting dividends.
                </p>
                <div class="slitebg" style="background-image:url(../assets/images/splitline.jpg)"></div>
                <p>
                  <span class="title-text">How does our affiliate program work?</span>
                  Our affiliate program is very simple and straightforward program and it is categorized into 5 parts:
                  <br><br>
                  <strong>The Referral Bonus</strong> - Every time when new clients sign up and activate their account either as Investing Partner Premium or Investing Partner Ultimate, affiliates shall get one-time referral bonus.
                  <br><br>
                  <strong>The Affiliate Bonus</strong>- This ensures that the affiliates get basic bonus up to 12 levels. The higher your ranking , the greater the cumulative bonuses that you will be enjoying .
                  <br><br>
                  <strong>The Performance Bonus and Leadership Bonus</strong> - Here the affiliates get bonus when the clients they've introduced make profits from their investments. This system makes both investor and the affiliate happy.
                  <br><br>
                  <strong>The Exclusive Bonus</strong> - This bonus is special bonus dedicated to affiliates who refer Investing Partner exclusive clients. Affiliates get this bonus based on their clients new deposits and also when every time their clients make profits from their investments .
                  <br><br>
                  <strong>The Spread Bonus</strong> - You are also allowed to introduce self traders from other broking institutions. Here Investing Partner does not charge the clients any fee as there is no fund management is involved but the clients just use the Investing Partner platform to choose one of our preferred brokers to handle their own trade activities. Affiliates will be able to enjoy spread bonus for introducing such clients to the company.
                  <br><br>
                  What are you waiting for? You can introduce our world-class fund management services to others and increase your income. We pay our affiliates regularly without fail; we are one of the most trustworthy companies. Numerous people are already benefiting not only from our trading services but also from our highly lucrative affiliate program. For more detailed information about the affiliate program, please login to Investing Partner login area.
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