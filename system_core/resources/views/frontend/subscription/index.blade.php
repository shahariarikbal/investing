@extends('frontend.layouts-v2.master')

@section('style')
<style>
    .stepwrapper .step-number {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        position: relative;
    }

    .stepwrapper .step-number:before {
        content: ' ';
        position: absolute;
        top: 25px;
        left: 0;
        width: 50%;
        height: 1px;
        background-color: #ddd;
        z-index: -1
    }

    .stepwrapper .step-number:after {
        content: ' ';
        position: absolute;
        top: 25px;
        right: 0;
        width: 50%;
        height: 1px;
        background-color: #ddd;
        z-index: -1
    }

    .stepwrapper .step-number .listing-wrapper {
        display: flex;
        flex-direction: column;
        margin: 0 1rem;
        justify-content: center;
        align-items: center;
    }

    .stepwrapper .step-number .listing-wrapper span.number {
        width: 50px;
        height: 50px;
        line-height: 50px;
        background: #e1e3e4;
        border-radius: 50%;
        color: #b5b5b6;
        text-align: center;
        cursor: pointer;
        margin-bottom: 5px;
        transition: 0.3s;
    }

    .m-right-4 {
        margin-right: 1.5rem;
    }

    .m-left-3 {
        margin-left: 1rem;
    }

    .m-left-2 {
        margin-left: 0.5rem;
    }

    .stepwrapper .step-number .listing-wrapper span.active {
        background-color: #004176;
        color: #FFF;
    }

    .stepwrapper .step-number .listing-wrapper span.check-active {
        background-color: #46b149;
        color: #FFF;
    }

    .stepwrapper .step-number .listing-wrapper span.number:hover {
        background-color: #004176;
        color: #FFF;
    }

    .terms-step {
        background: #fff;
        height: 50vh;
        overflow: auto;
    }

    .first-step {
        background: #f3f4f5;
        padding: 1rem 2rem;
        margin-top: 1rem;
        width: 53%;
    }

    .step-title {
        text-transform: uppercase;
        font-size: 20px;
        line-height: 24px;
        color: #004176;
        font-weight: bold;
    }

    .subscription-wrapper {
        border: 1px solid #ddd;
        text-align: center;
        padding: 1rem;
        height: 210px;
        cursor: pointer;
    }

    .selected-box {
        position: relative;
        /* -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        */
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
    }

    .subscription-wrapper .amount-info {
        margin-bottom: 0.3rem;
    }

    .subscription-wrapper .amount-info .dollar-sign {
        font-size: 18px;
    }

    .subscription-wrapper .amount-info .amount {
        font-size: 32px;
    }

    .subscription-wrapper .amount-info .cross-amount {
        text-decoration: line-through;
        font-size: 18px;
    }

    .subscription-wrapper .m-subscribe {
        margin-bottom: 0.3rem;
    }

    .subscription-wrapper .m-subscribe span {
        font-size: 20px;
        line-height: 20px;
        padding-bottom: 0.3rem;
    }

    .subscription-wrapper .details-subscript p {
        font-size: 16px;
        line-height: 24px;
        padding: 10px 0;
        margin-bottom: 0;
    }

    .notes {
        font-style: italic;
        font-size: 16px;
        line-height: 24px;
    }

    .pointer {
        cursor: pointer;
    }

    .neteller-wrapper {}

    .neteller-wrapper .payment-title {
        text-transform: capitalize;
        font-size: 20px;
        font-weight: 600;
        color: #212529;
    }

    .neteller-wrapper .custom-control-label {
        display: flex;
        margin-top: -3px;
        font-weight: 500;
        font-size: 15px;
    }

    .btn-back {
        background: #212529;
        display: flex;
        width: 30%;
        text-align: center;
        justify-content: center;
        border: 1px solid #212529;
        border-radius: 0;
    }

    .btn-continue {
        display: flex;
        width: 30%;
        justify-content: center;
        align-items: center;
    }

    .p-left-3 {
        padding-left: 3rem;
    }

    .p-right-3 {
        padding-right: 3rem;
    }

    .skrill-mail {
        display: flex;
    }

    .skrill-mail>div {
        margin-right: 1rem;
    }

    @media (min-width: 768px) and (max-width: 1199.98px) {
        .first-step {
            width: 100%;
        }
    }

    @media(max-width:767px) {
        .stepwrapper .step-number:after {
            left: 4%;
        }

        .stepwrapper .step-number:before {
            left: 50%;
        }

        .stepwrapper .step-number .listing-wrapper {
            margin: 0;
        }

        .first-step {
            width: 100%;
            padding: 0.5rem;
        }

        .m-right-4 {
            margin-right: 8px;
        }

        .m-left-3 {
            margin-left: 8px;
        }

        .m-left-2 {
            margin-left: 0;
        }

        .p-left-3 {
            padding-left: 0.5rem;
        }

        .p-right-3 {
            padding-right: 0.5rem;
        }

        .btn-back {
            width: 50%;
        }

        .btn-continue {
            width: 50%;
        }
    }

    @media(max-width:480px) {
        .skrill-mail {
            display: block;
        }
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
@include('frontend.layouts.includes.trading-ticker')

<section class="mt-5 mb-5 stepwrapper" id="app">
    <subscription :plans="{{ $plans }}" />
</section>

@endsection