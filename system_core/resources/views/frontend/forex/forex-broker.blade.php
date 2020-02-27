@extends('frontend.layouts-v2.master')

@section('review-active', 'active')

@section('style')
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<style>
    .broker-catagory .custom-control-label {
        font-size: 0.9rem;
        color: #7a7a7a;
    }

    .broker-catagory .custom-control-label::before {
        top: 7px;
        background-color: inherit;
        border: 1px solid #ddd;
        border-radius: 0;
    }

    .broker-catagory .custom-control-label::after {
        top: 7px;
    }

    .load-more-badge {
        font-weight: 400;
        background: #04abab;
        color: #fff;
        padding: 5px;
        font-style: italic;
        font-size: 10px;
        border-radius: 3px;
        letter-spacing: 0.3px;
    }

    .reset-badge {
        font-weight: 400;
        background: #607D8B;
        color: #fff;
        padding: 5px;
        font-style: italic;
        font-size: 10px;
        border-radius: 3px;
        letter-spacing: 0.3px;
    }

    .broker-title h1 {
        text-align: center;
        font-size: 30px;
        letter-spacing: 2px;
        color: #797979;
        font-weight: 500;
        margin: 0;
        padding: 0;
    }

    .search-bar input[type="text"] {
        display: block;
        width: 100%;
        padding: 1.35rem 0.75rem;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Ubuntu, "Helvetica Neue", sans-serif;
        font-weight: 400;
        line-height: 1.5;
        background-color: #dee2e6;
        background-clip: padding-box;
        height: 48px;
        border: 0;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        background-image: none!important;
        font-size: 1.5rem;
        margin-bottom: 0;
    }

    .search-bar i {
        position: absolute;
        right: 16px;
        top: 14px;
        font-size: 1.5rem;
        color: hsl(208, 7%, 46%);
    }
</style>
<style>
    .premium-tag {
        position: absolute;
        left: -48px;
        top: 19.4px;
        text-transform: uppercase;
        font-weight: 600;
        display: block;
        background: #edaf32;
        padding: 2px 5px;
        border-radius: 3px;
        color: #fff;
        transform: rotate(-90deg);
        font-size: 10px;
        overflow: hidden;
        letter-spacing: 0.5px;
    }


    .drop-shadow {
        box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
        padding: 15px 10px;
    }

    .listing-box .badge {
        /* background-color: #009688; */
        border-radius: 2px;
        padding: 4px 7px;
        vertical-align: middle;
        color: #fff;
        -ms-grid-row-align: center;
        align-self: center;
        font-size: 65%;
        font-weight: 500;
        border-radius: 1px;
        transform: skew(-9deg, 0deg);
    }

    .listing-box .form-group {
        padding-bottom: 0;
        margin: 0 0 1rem 0;
    }

    .listing-box .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        background-image: none !important;
        margin-bottom: 0;
        text-transform: capitalize;
        font-size: 13px;
        font-style: italic;
    }

    .listing-box .form-check {
        padding-left: 0;
    }

    .listing-box .form-check-input {
        position: inherit;
        margin-top: 0;
        margin-left: 0;
    }

    .listing-box .form-check-label {
        font-size: 14px;
        line-height: inherit;
        color: inherit;
        font-weight: inherit;
        margin-bottom: .5rem;
        vertical-align: 2px;
        margin-left: 5px;
    }

    .listing-box [type="checkbox"]:checked,
    .listing-box [type="checkbox"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    .listing-box [type="checkbox"]:checked+label,
    .listing-box [type="checkbox"]:not(:checked)+label {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
        text-transform: capitalize;
    }

    .listing-box [type="checkbox"]:checked+label:before,
    .listing-box [type="checkbox"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        background: #fff;
    }

    .listing-box [type="checkbox"]:checked+label:after,
    .listing-box [type="checkbox"]:not(:checked)+label:after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f00c";
        width: 0;
        height: 0;
        color: #00a69c;
        position: absolute;
        top: 0;
        left: 2px;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    .listing-box [type="checkbox"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    .listing-box [type="checkbox"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .listing-box select.form-control:not([size]):not([multiple]) {
        height: 38px;
    }

    .change-icon::before {
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
    }

    .downs::before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f078";
        position: absolute;
        right: 10px;
        top: 18px;
        line-height: 0;
        font-size: 12px;
    }

    .list-title {
        margin-bottom: 5px;
    }

    .list-title h1 {
        margin: 0;
        background: #fff;
        padding: 0.8rem 1rem;
        font-weight: 500;
        font-size: 3rem;
        color: #5e5e5e;
        line-height: 3.5rem;
    }

    .forex-search-bar .form-group {
        padding-bottom: 0;
        margin: 0 0 1rem 0;
        position: relative;
    }

    .forex-search-bar i {
        position: absolute;
        right: 16px;
        top: 14px;
        font-size: 2.5rem;
        color: hsl(208, 7%, 46%);
    }

    .forex-search-bar .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: #fff;
        background-clip: padding-box;
        height: 48px;
        border: 0;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        background-image: none !important;
        margin-bottom: 1rem;
    }

    .forex-search-bar .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .5rem 1rem;
        font-size: 1.25rem;
        line-height: 2.8;
        border-radius: .3rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        height: 48px;
        margin: 0;
    }

    .forex-search-bar .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .forex-search-bar .btn-danger:hover {
        color: #fff;
        background-color: #c82333;
        border-color: #bd2130;
    }

    .fs-12 {
        font-size: 12px;
    }

    .broker-btn .btn {
        /*display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        margin: 0 0 2px 0;*/
        font-size: 0.7rem;
        padding: 0.3rem 0.25rem;
    }

    .broker-btn .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .broker-btn .btn-success:hover {
        color: #fff;
        background-color: #218838;
        border-color: #1e7e34;
    }

    .broker-btn .btn-danger {
        color: #fff;
        background-color: #bd2130;
        border-color: #b21f2d;
    }

    .broker-btn .btn-danger:hover {
        color: #fff;
        background-color: #c82333;
        border-color: #bd2130;
    }

    .broker-btn .btn-info {
        color: #fff;
        background-color: #117a8b;
        border-color: #10707f;
    }

    .broker-btn .btn-info:hover {
        color: #fff;
        background-color: #138496;
        border-color: #117a8b;
    }

    .forex-brokers-table .broker-image {
        width: inherit;
    }

    .forex-brokers-table .broker-logo {
        height: 50px;
        border: none;
        width: 140px;
    }

    .forex-brokers-table .table td,
    .forex-brokers-table .table th {
        padding: .75rem;
        vertical-align: middle;
        border-top: 1px solid #03214A;
        text-align: center;
    }

    .forex-brokers-table .table tr {
        background-color: #fff;
    }

    .forex-brokers-table tr td span.rank {
        position: absolute;
        top: 6px;
        left: 20.5px;
        color: #fff;
        font-size: 10pt;
        font-weight: 700;
        background: rgba(0, 0, 0, 0.21);
        border-radius: 100%;
        height: 22px;
        width: 22px;
        box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.64);
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.85);
    }

    .forex-brokers-table .glass:after {
        background: inherit;
    }

    .premium-broker-bg {
        color: #333;
        background-color: #6beb926b !important;
        border-color: #6beb926b;
    }

    @media(max-width:767px) {
        .broker-btn .btn {
            display: inline;
        }
    }

    @media(max-width:1199px) {
     #sidebar {
        width: 450px;
        position: fixed;
        top: 0;
        left: -450px;
        height: 70vh;
        z-index: 9999;
        background: #fff;
        color: #fff;
        transition: all 0.3s;
        overflow-y: scroll;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
    }

    #sidebar.active {
      left: 0;
    }

    .overlay {
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 998;
        opacity: 0;
        transition: all 0.5s ease-in-out;
      }

      .overlay.active {
          display: block;
          opacity: 1;
          top: 0;
          z-index: 1030;
      }

    #sidebar .sidebar-header {
      padding: 20px;
      background: #6d7fcc;
    }

    #sidebar .sidebar-header {
        padding: 10px;
        background: #fff;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }
 }
   

    .numbers {
        position: absolute;
        color: #000;
        background: #fff;
        line-height: 18px;
        width: 18px;
        height: 18px;
        border-radius: 9px;
        top: 6px;
        left: 5px;
        text-align: center;
        display: block;
    }

    .numbers-position {
        position: absolute;
        top: 30%;
        left: 30%;
    }

    .platform-column ul {
        padding: 0;
        margin: 0;
        line-height: 0;
    }

    .platform-column ul li {
        display: inline-block;
        font-size: 12px;
    }

    .all-btns {
        display: inline-flex;
        text-transform: capitalize;
    }

    .all-btns .btn {
        font-size: 0.7rem;
        padding: 0.33rem 0.33rem;
        margin-bottom: 7px;
        font-weight: 500;
        margin-right: 0.4rem;
    }

    .all-btns .btn+.btn:last-child {
        margin-left: 0;
    }



    .forex-broker-table td,
    .forex-broker-table th {
        border-color: rgba(0, 0, 0, 0.06);
        padding: 0.25rem;
        font-size: 13px;
        vertical-align: middle;
        text-align: center;
    }


    .link-button a div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 1px 4px 0px rgba(170, 170, 170, 0.4);
    }

    .link-button a div:hover {
        box-shadow: 0 4px 21px 0 rgba(0, 32, 147, 0.18);
    }

    .link-button a div span.text-btn {
        text-transform: capitalize;
        padding: .5rem 0.8rem;
        font-size: 14px;
        color: #7a7a7a;
    }

    .link-button a div span.check-btn {
        color: #fff;
        background: #212529;
        padding: .5rem 0.8rem;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    @media(min-width:1199px) {
        .display-xl-none {
            display: none;
        }
    }


    @media screen and (max-width: 768px) {
        .padding-0 {
            padding: 0;
        }
    }

    @media(max-width:540px) {
        .all-btns {
            display: flex;
            text-transform: capitalize;
            flex-direction: column;
        }
    }

    .broker-tooltip:after {
        border-top-color: #ffc107;
    }
    .broker-info-container p {
        text-align: center;
        padding: 5px 0;
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }
</style>

@endsection

@section('bottom-script')
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>

<script type="text/javascript">
// for sidebar
    $(document).ready(function() {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });
      $('#dismiss, .overlay').on('click', function() {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
      });
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
    
  </script>
@endsection

@section('content')
@include('frontend.layouts.includes.trading-ticker')
<div id="app">
    <brokers :brokers="{{ $brokers }}"></brokers>
</div>
<div class="overlay"></div>
@endsection