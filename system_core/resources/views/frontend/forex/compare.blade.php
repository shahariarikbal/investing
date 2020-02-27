@extends('frontend.layouts-v2.master')

@section('style')
<style>
    section h3 {
        font-weight: 500;
        font-size: 20px;
    }
    .compareTable tr {
        background-color: #f5f5f5;
    }

    .compareTable .table-bordered>thead>tr>th,
    .compareTable .table-bordered>tbody>tr>th,
    .compareTable .table-bordered>tfoot>tr>th,
    .compareTable .table-bordered>thead>tr>td,
    .compareTable .table-bordered>tbody>tr>td,
    .compareTable .table-bordered>tfoot>tr>td {
        border: 1px solid #a1a1a1;
        font-size: 13px;
        text-align: center;
    }

    .compareTable .table tr td,
    .compareTable .table tr th {
        padding: 8px !important;
    }

    .compareTable .table-hover tbody tr:hover {
        background-color: #fff;
    }

    .bgChange {
        background: rgba(212, 212, 212, .5) !important;
    }

    .bgChange:hover {
        background: #fff !important;
    }

    .bgChange h3 {
        color: #717171;
        font-size: 1.6em;
        letter-spacing: 3px;
        line-height: 24px;
        margin: 0;
        padding: 0;
        border: 0;
        text-transform: uppercase;
        font-weight: 500;
    }

    

    .btn-remove:hover {
        background-color: #e30613;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border: rgba(255, 255, 255, 0) 2px solid;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
        color: #fff;
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

<div id="app">
    <broker-compare />
</div>

@endsection