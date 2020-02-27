@extends('frontend.layouts.master')

@section('style')
    <style>
        .pointer {
            cursor: pointer;
        }
        .broker-catagory .custom-control-label{
            font-size: 0.9rem;
            color: #7a7a7a;
        }
        .broker-catagory .custom-control-label::before{
            top:7px;
            background-color: inherit;
            border: 1px solid #ddd;
            border-radius: 0;
        }
        .broker-catagory .custom-control-label::after {
            top:7px;
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
            letter-spacing: 1px;
            color: #797979;
            font-weight: 500;
            margin: 0;
            padding: 0;
        }
        .search-bar input[type="text"]{
            height: 50px;
            background: #f9f9f9;
            font-size: 16px;
        }
        .search-bar i {
            position: absolute;
            right: 16px;
            top: 14px;
            font-size: 1.5rem;
            color: hsl(0, 5%, 84%);
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
            left:5px;
            text-align: center;
            display: block;
        }
        .numbers-position {
            position:absolute;
            top:30%;
            left:30%;
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
        .all-btns .btn{
            font-size: 0.7rem;
            padding: 0.33rem 0.33rem;
            margin-bottom: 7px;
            font-weight: 500;
            margin-right: 0.4rem;
        }
        .all-btns .btn + .btn:last-child {
            margin-left: 0;
        }

        .all-btns-payment {
            display: inline-flex;
            text-transform: capitalize;
        }
        .all-btns-payment a img{
            margin-left: 10px;
            width: 18px;
            height: 16px;
        }



        .vps-broker-table td,
        .vps-broker-table th {
            border-color: rgba(0, 0, 0, 0.06);
            padding: 0.25rem;
            font-size: 13px;
            vertical-align: middle;
            text-align: center;
        }
        .vps-broker-table .broker-image {
            margin: auto;
            width: 129px;
        }
        .vps-broker-table .broker-image img {
            width: 100%;
            height: 50px;
            border: 0;
        }

        .link-button a div{
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 1px 4px 0px rgba(170, 170, 170, 0.4);
        }
        .link-button a div:hover {
            box-shadow: 0 4px 21px 0 rgba(0, 32, 147, 0.18);
        }
        .link-button a div span.text-btn{
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

        .dollar-package {
            font-size: 1.5rem;
        }
        .basic-package {
            font-style: italic;
            text-transform: capitalize;
            font-weight: 500;
            color: #000a14;
        }

        .t-light-green {
            background: #d4edda;
        }




        /* jquery range slider css */
        .ui-widget-header {
            height: 4px !important;
            /* background: #53b147; */
        }
        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default {
            border: 1px solid #c3c3c3;
            border-radius: 13px;
            background: #fff;
        }
        .ui-widget-content {
            height: 2px !important;
            border: 0;
            background: #e0e0da;
        }
        .ui-slider-horizontal .ui-slider-range {
            top: -2px;
        }
        .ui-slider-horizontal .ui-slider-handle {
            top: -10px;
            cursor: pointer;
        }
        .ui-slider-handle {
            outline: none;
        }
        .ui-slider-handle .amount {
            position: absolute;
            left: 0;
            top: 35px;
            display: none;
            width: 130px;
            padding: 10px 0;
            text-align: center;
            margin-left: -55px;
            font-weight: normal;
            font-size: 14px;
            color: #fff;
            border: 1px solid #212529;
            background: #212529;
        }
        .ui-slider-handle .amount:after {
            content: '';
            display: block;
            position: absolute;
            top: -11px;
            left: 50%;
            right: 0;
            width: 0;
            height: 0;
            margin-left: -5px;
            border-bottom: 5px solid #212529;
            border-top: 5px solid transparent;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            background-color: #fff;
        }
        .min-range {
            float: left;
            padding-top: 20px;
            font-size: 12px;
            color: #888;
        }
        .max-range {
            float: right;
            padding-top: 20px;
            font-size: 12px;
            color: #888;
        }
        .slider-range-wrap {
            position: relative;
            width: 100%;
            margin: 0 auto;
            padding: 20px 15px 0 15px;
        }
        .price-range-title {
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            font-size: 13px;
        }
        span.bs-caret {
            margin-right: -0.5rem;
        }








        .offerBox {
            box-shadow: 0px 2px 10px 0 #607D8B;
            padding: .5rem;
            border: 5px solid #607D8B;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
        }

        .offerBox .btn-group button {
            background: inherit;
        }
        .offerBox .notes {
            font-size: 11px;
            color: #6c757d;
            line-height: 17px;
            font-style: italic;
        }
        .offerBox .btn {
            font-size: 0.7rem;
        }
        .offerBox .btn + .dropdown-menu .dropdown-item {
            font-size: 0.7rem;
        }
        /* line 27, bootstrap-select.scss */
        select.bs-select-hidden,
        select.selectpicker {
            display: none !important;
        }

        /* line 32, bootstrap-select.scss */
        .bootstrap-select {
            width: 220px \0;
            /*IE9 and below*/
        }
        /* line 37, bootstrap-select.scss */
        .bootstrap-select.btn-group > .dropdown-toggle {
            /* height: 100%; */
        }
        /* line 43, bootstrap-select.scss */
        .bootstrap-select > .dropdown-toggle {
            /* width: 100%;
            padding-right: 25px;
            z-index: 1; */
            width: 100%;
        }
        /* line 48, bootstrap-select.scss */
        .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
            /* color: #999; */
        }
        /* line 56, bootstrap-select.scss */
        .bootstrap-select > select {
            position: absolute !important;
            bottom: 0;
            left: 50%;
            display: block !important;
            width: 0.5px !important;
            height: 100% !important;
            padding: 0 !important;
            opacity: 0 !important;
            border: none;
        }
        /* line 67, bootstrap-select.scss */
        .bootstrap-select > select.mobile-device {
            top: 0;
            left: 0;
            display: block !important;
            width: 100% !important;
            z-index: 2;
        }
        /* line 77, bootstrap-select.scss */
        .has-error .bootstrap-select .dropdown-toggle, .error .bootstrap-select .dropdown-toggle {
            border-color: #b94a48;
        }
        /* line 82, bootstrap-select.scss */
        .bootstrap-select.fit-width {
            width: auto !important;
        }
        /* line 86, bootstrap-select.scss */
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 220px;
        }
        /* line 90, bootstrap-select.scss */
        .bootstrap-select .dropdown-toggle:focus {
            /* outline: thin dotted #333333 !important;
            outline: 5px auto -webkit-focus-ring-color !important;
            outline-offset: -2px; */
        }

        /* line 97, bootstrap-select.scss */
        .bootstrap-select.form-control {
            margin-bottom: 0;
            padding: 0;
            border: none;
        }
        /* line 102, bootstrap-select.scss */
        .bootstrap-select.form-control:not([class*="col-"]) {
            width: 100%;
        }
        /* line 106, bootstrap-select.scss */
        .bootstrap-select.form-control.input-group-btn {
            z-index: auto;
        }
        /* line 110, bootstrap-select.scss */
        .bootstrap-select.form-control.input-group-btn:not(:first-child):not(:last-child) > .btn {
            border-radius: 0;
        }

        /* line 119, bootstrap-select.scss */
        .bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*="col-"] {
            float: none;
            display: inline-block;
            margin-left: 0;
            padding: 0 0.2rem;
        }
        /* line 130, bootstrap-select.scss */
        .bootstrap-select.btn-group.dropdown-menu-right, .bootstrap-select.btn-group[class*="col-"].dropdown-menu-right, .row .bootstrap-select.btn-group[class*="col-"].dropdown-menu-right {
            float: right;
        }
        /* line 135, bootstrap-select.scss */
        .form-inline .bootstrap-select.btn-group, .form-horizontal .bootstrap-select.btn-group, .form-group .bootstrap-select.btn-group {
            margin-bottom: 0;
        }
        /* line 141, bootstrap-select.scss */
        .form-group-lg .bootstrap-select.btn-group.form-control, .form-group-sm .bootstrap-select.btn-group.form-control {
            padding: 0;
        }
        /* line 145, bootstrap-select.scss */
        .form-group-lg .bootstrap-select.btn-group.form-control .dropdown-toggle, .form-group-sm .bootstrap-select.btn-group.form-control .dropdown-toggle {
            height: 100%;
            font-size: inherit;
            line-height: inherit;
            border-radius: inherit;
        }
        /* line 155, bootstrap-select.scss */
        .form-inline .bootstrap-select.btn-group .form-control {
            width: 100%;
        }
        /* line 159, bootstrap-select.scss */
        .bootstrap-select.btn-group.disabled,
        .bootstrap-select.btn-group > .disabled {
            cursor: not-allowed;
        }
        /* line 163, bootstrap-select.scss */
        .bootstrap-select.btn-group.disabled:focus,
        .bootstrap-select.btn-group > .disabled:focus {
            outline: none !important;
        }
        /* line 168, bootstrap-select.scss */
        .bootstrap-select.btn-group.bs-container {
            position: absolute;
            height: 0 !important;
            padding: 0 !important;
        }
        /* line 173, bootstrap-select.scss */
        .bootstrap-select.btn-group.bs-container .dropdown-menu {
            z-index: 1060;
        }
        /* line 180, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-toggle .filter-option {
            display: inline-block;
            overflow: hidden;
            width: 100%;
            text-align: left;
            color: #7a7a7a;
        }
        /* line 187, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-toggle .caret {
            position: absolute;
            top: 50%;
            right: 12px;
            margin-top: -2px;
            vertical-align: middle;
        }
        /* line 196, bootstrap-select.scss */
        .bootstrap-select.btn-group[class*="col-"] .dropdown-toggle {
            width: 100%;
        }
        /* line 201, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu {
            min-width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        /* line 205, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu.inner {
            display: block;
            position: static;
            float: none;
            border: 0;
            padding: 0;
            margin: 0;
            border-radius: 0;
            box-shadow: none;
        }
        /* line 216, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item {
            position: relative;
            cursor: pointer;
            user-select: none;
        }
        /* line 221, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item.active small {
            color: #fff;
        }
        /* line 225, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item.disabled a {
            cursor: not-allowed;
        }
        /* line 229, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item.hidden {
            display: none;
        }
        /* line 233, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item span.dropdown-item-inner {
            display: block;
        }
        /* line 236, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item span.dropdown-item-inner.opt {
            position: relative;
            padding-left: 2.25em;
        }
        /* line 241, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item span.dropdown-item-inner span.check-mark {
            display: none;
        }
        /* line 245, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item span.dropdown-item-inner span.text {
            display: inline-block;
        }
        /* line 250, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu a.dropdown-item small {
            padding-left: 0.5em;
        }
        /* line 257, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu .dropdown-item .span.check-mark {
            display: none;
        }
        /* line 261, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu .dropdown-item .span.text {
            display: inline-block;
        }
        /* line 266, bootstrap-select.scss */
        .bootstrap-select.btn-group .dropdown-menu .notify {
            position: absolute;
            bottom: 5px;
            width: 96%;
            margin: 0 2%;
            min-height: 26px;
            padding: 3px 5px;
            background: whitesmoke;
            border: 1px solid #e3e3e3;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            pointer-events: none;
            opacity: 0.9;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        /* line 282, bootstrap-select.scss */
        .bootstrap-select.btn-group .no-results {
            padding: 3px;
            background: #f5f5f5;
            margin: 0 5px;
            white-space: nowrap;
        }
        /* line 290, bootstrap-select.scss */
        .bootstrap-select.btn-group.fit-width .dropdown-toggle .filter-option {
            position: static;
        }
        /* line 294, bootstrap-select.scss */
        .bootstrap-select.btn-group.fit-width .dropdown-toggle .caret {
            position: static;
            top: auto;
            margin-top: -1px;
        }
        /* line 302, bootstrap-select.scss */
        .bootstrap-select.btn-group.show-tick .dropdown-menu a.selected span.dropdown-item-inner span.check-mark {
            position: absolute;
            display: inline-block;
            right: 15px;
            margin-top: 5px;
        }
        /* line 309, bootstrap-select.scss */
        .bootstrap-select.btn-group.show-tick .dropdown-menu a a span.text {
            margin-right: 34px;
        }

        /* line 316, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow.open > .dropdown-toggle {
            z-index: 1061;
        }
        /* line 321, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow .dropdown-toggle:before {
            content: '';
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-bottom: 7px solid rgba(204, 204, 204, 0.2);
            position: absolute;
            bottom: -4px;
            left: 9px;
            display: none;
        }
        /* line 332, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow .dropdown-toggle:after {
            content: '';
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid white;
            position: absolute;
            bottom: -4px;
            left: 10px;
            display: none;
        }
        /* line 345, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow.dropup .dropdown-toggle:before {
            bottom: auto;
            top: -3px;
            border-top: 7px solid rgba(204, 204, 204, 0.2);
            border-bottom: 0;
        }
        /* line 352, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow.dropup .dropdown-toggle:after {
            bottom: auto;
            top: -3px;
            border-top: 6px solid white;
            border-bottom: 0;
        }
        /* line 361, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle:before {
            right: 12px;
            left: auto;
        }
        /* line 366, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle:after {
            right: 13px;
            left: auto;
        }
        /* line 373, bootstrap-select.scss */
        .bootstrap-select.show-menu-arrow.open > .dropdown-toggle:before, .bootstrap-select.show-menu-arrow.open > .dropdown-toggle:after {
            display: block;
        }

        /* line 380, bootstrap-select.scss */
        .bs-searchbox,
        .bs-actionsbox,
        .bs-donebutton {
            padding: 4px 8px;
        }

        /* line 386, bootstrap-select.scss */
        .bs-actionsbox {
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        /* line 390, bootstrap-select.scss */
        .bs-actionsbox .btn-group button {
            width: 50%;
        }

        /* line 395, bootstrap-select.scss */
        .bs-donebutton {
            float: left;
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        /* line 400, bootstrap-select.scss */
        .bs-donebutton .btn-group button {
            width: 100%;
        }

        /* line 406, bootstrap-select.scss */
        .bs-searchbox + .bs-actionsbox {
            padding: 0 8px 4px;
        }
        /* line 410, bootstrap-select.scss */
        .bs-searchbox .form-control {
            margin-bottom: 0;
            width: 100%;
            float: none;
        }
        /* line 417, bootstrap-select.scss */
        .input-group .bs-searchbox .form-control {
            width: 100%;
        }
        .mCustomScrollBox, .mCSB_container {
            overflow: visible;
        }
        .data-center-location, .price-range-slider {
            display: flex;
            flex-direction: column;
        }
        .sidebarCollapseClass {
            position: relative;
        }

        .faq-content-vps .card-header a {
            background: #fff;
            color: #7a7a7a;
            box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
            font-size: 13px;
            border-radius: 0;
            border: 1px solid #ddd;
            text-transform: uppercase;
            font-weight: bold;
        }
        .faq-content-vps .card-header a::before {
            content: " ";
            font-weight: 600;
            margin-right: 5px;
        }
        .faq-content-vps .card-header a::after {
            color: #7a7a7a;
            content: "";
            font-family: "Ionicons";
            font-size: 19px;
            font-weight: 100;
            position: absolute;
            right: 15px;
            top: 13px;
        }
        .faq-content-vps .card-header a:hover {
            box-shadow: 0px 2px 10px 0 #607D8B;
        }
        .search-vps-title {
            border-bottom: 2px solid #607D8B;
            color: #607D8B;
        }
        .dismiss-arrow {
            display: flex;
            flex-direction: column;
            justify-content: end;
            align-items: end;
        }
        @media(min-width:1199px){
            .sidebarCollapseClass{
                display: none;
            }
            .dismiss-arrow {
                display: none;
            }
        }
        @media(max-width:1199px) {
            .display-none {
                display: none;
            }
            #sidebar {
                width: 250px;
                position: fixed;
                top: 0;
                left: -250px;
                height: 60vh;
                z-index: 99999;
                background: #fff;
                transition: all 0.3s;
                overflow-x: scroll;
                box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
            }
            .data-center-location, .price-range-slider {
                display: none;
            }
            #sidebar.active {
                left: 0;
            }

            #dismiss {
                width: 35px;
                height: 35px;
                line-height: 35px;
                text-align: center;
                background: #7386D5;
                position: relative;
                top: 0;
                right: 0;
                cursor: pointer;
                -webkit-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
                color: #fff;
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
            }

            #sidebar .sidebar-header {
                padding: 20px;
                background: #6d7fcc;
            }

            #sidebar ul.components {
                padding: 20px 0;
                border-bottom: 1px solid #47748b;
            }

            #sidebar ul p {
                color: #fff;
                padding: 10px;
            }

            #sidebar ul li a {
                padding: 10px;
                font-size: 1.1em;
                display: block;
            }

            #sidebar ul li a:hover {
                color: #7386D5;
                background: #fff;
            }

            #sidebar ul li.active>a,
            a[aria-expanded="true"] {
                color: #fff;
                background: #6d7fcc;
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
            .broker-title h1 {
                font-size: 24px;
            }
            .broker-title {
                display: flex;
            }
            .broker-title div:last-child {
                display: flex;
                flex-direction: column;
                width: 100%;
            }
            .mCustomScrollBox, .mCSB_container {
                overflow: hidden;
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
            .all-btns-payment {
                display: none;
            }

        }
    </style>
@endsection
@section('content')
    @include('frontend.layouts.includes.trading-ticker')
    <section class="broker-catagory">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-xl-2" id="sidebar">
                            <div class="dismiss-arrow mb-2">
                                <div id="dismiss">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                            </div>
                            <div class="mb-2 offerBox">
                                <div class="mb-4">
                                    <span class="d-block text-center font-weight-bold text-3 text-uppercase pb-2 search-vps-title">search vps quickly</span>
                                </div>
                                <div class="mb-2">
                                    <select class="form-control form-control-xs selectpicker" name="" data-size="7" data-live-search="true" data-title="Location" id="state_list" data-width="100%">
                                        <option value="" selected>Select Forex Broker</option>
                                        <option value="">FXCC_FXBNP</option>
                                        <option value="">Pepperstone</option>
                                        <option value="">Ironfx</option>
                                        <option value="">FXVPS</option>
                                        <option value="">HyperVM</option>
                                        <option value="">FXCC_FXBNP</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <span class="price-range-title mb-2 d-block">VPS Configaration</span>
                                    <select class="form-control mb-1 form-control-xs selectpicker" name="">
                                        <option value="">1 - 3 GB Ram</option>
                                        <option value="">3 - 5 GB Ram</option>
                                        <option value="">5 - 10 GB Ram</option>
                                    </select>
                                    <select class="form-control form-control-xs selectpicker" name="">
                                        <option value="">1 - 2 CPU Core</option>
                                        <option value="">2 - 4 CPU Core</option>
                                        <option value="">4 - 6 CPU Core</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <span class="price-range-title mb-2 d-block">Price Preference</span>
                                    <select class="form-control form-control-xs selectpicker" name="">
                                        <option value="">Low to High</option>
                                        <option value="">High to Low</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <blockquote class="blockquote text-right">
                                        <p class="mb-0 blockquote-footer notes">You can search vps according to latency and price preference.</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="mb-2 data-center-location drop-shadow">
                                <div class="mb-2">
                                    <span class="price-range-title mb-2 d-block">Data Center Location</span>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label font-weight-normal" for="customCheck1"><span><img src="assets/images/flag/country/us.png" width="18" alt=""></span> New York</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label font-weight-normal" for="customCheck2"><span><img src="assets/images/flag/country/br.png" width="18" alt=""></span> Brasilia</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label font-weight-normal" for="customCheck3"><span><img src="assets/images/flag/country/ar.png" width="18" alt=""></span> Buenos Aires</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label font-weight-normal" for="customCheck4"><span><img src="assets/images/flag/country/au.png" width="18" alt=""></span> Canberra</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label font-weight-normal" for="customCheck5"><span><img src="assets/images/flag/country/de.png" width="18" alt=""></span> Berlin</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label font-weight-normal" for="customCheck6"><span><img src="assets/images/flag/country/ca.png" width="18" alt=""></span> Ottawa</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="badge load-more-badge">Load more</span>
                                    <span class="badge reset-badge"> Reset </span>
                                </div>
                            </div>
                            <div class="drop-shadow mb-2 price-range-slider">
                                <span class="price-range-title">Price Range</span>
                                <div class="slider-range-wrap">
                                    <div id="slider-range"></div>
                                    <span class="min-range">$100</span>
                                    <span class="max-range">$1000</span>
                                </div>
                            </div>
                            <div class="mb-2 display-none">
                                <div id="accordion" class="faq_content faq-content-vps">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Operating System</a> </h6>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck7"><span><img src="assets/images/OS/ws-2012.jpg" width="18" alt=""></span> Windows 2008 R2</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck8"><span><img src="assets/images/OS/ws-2008.jpg" width="18" alt=""></span> Windows 2012</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck9"><span><img src="assets/images/OS/Linux.jpg" width="18" alt=""></span> Linux</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck10"><span><img src="assets/images/OS/w-7.jpg" width="18" alt=""></span> Windows 7</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck11"><span><img src="assets/images/OS/w-10.jpg" width="18" alt=""></span> Windows 10</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck12"><span><img src="assets/images/OS/ubuntu.png" width="18" alt=""></span> Ubuntu</label>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <span class="badge load-more-badge">Load more</span>
                                                    <span class="badge reset-badge"> Reset </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Payment Gateway</a> </h6>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck13"><span><img src="assets/images/payment/paypal.png" width="36" alt=""></span> Paypal</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck14"><span><img src="assets/images/payment/perfect-money.png" width="36" alt=""></span> Perfect Money</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck15"><span><img src="assets/images/payment/neteller.png" width="36" alt=""></span> Neteller</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck16">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck16"><span><img src="assets/images/payment/payoneer.png" width="36" alt=""></span> Payoneer </label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck17">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck17"><span><img src="assets/images/payment/skrill.png" width="36" alt=""></span> Skrill</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck18">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck18"><span><img src="assets/images/payment/bitcoin.png" width="22" alt=""></span> Bitcoin</label>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <span class="badge load-more-badge">Load more</span>
                                                    <span class="badge reset-badge"> Reset </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Company Location</a> </h6>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck19">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck19"><span><img src="assets/images/flag/country/us.png" width="18" alt=""></span> USA</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck20">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck20"><span><img src="assets/images/flag/country/br.png" width="18" alt=""></span> BR</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck21">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck21"><span><img src="assets/images/flag/country/ar.png" width="18" alt=""></span> AR</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck22">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck22"><span><img src="assets/images/flag/country/au.png" width="18" alt=""></span> AU </label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck23">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck23"><span><img src="assets/images/flag/country/de.png" width="18" alt=""></span> GR</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck24">
                                                    <label class="custom-control-label font-weight-normal" for="customCheck24"><span><img src="assets/images/flag/country/ca.png" width="18" alt=""></span> CA</label>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <span class="badge load-more-badge">Load more</span>
                                                    <span class="badge reset-badge"> Reset </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 display-none">
                                <img src="assets/images/add/best-fxvps.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-10 padding-0">
                            <div class="d-flex flex-column drop-shadow mb-3">
                                <div class="broker-title mb-4 mt-2">
                                    <div>
                          <span id="sidebarCollapse" class="sidebarCollapseClass">
                            <i class="fas fa-bars fa-2x"></i>
                        </span>
                                    </div>
                                    <div>
                                        <h1>top rated forex vps provider</h1>
                                        <span class="text-center d-block text-4 font-weight-500 mt-2"><i>Best VPS Provider - 2019</i></span>
                                    </div>
                                </div>
                                <div class="search-bar position-relative mb-2">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                                <div class="text-center mt-3 mb-4">
                                    <img src="assets/images/add/fx_vps.gif" alt="">
                                </div>
                                <div class="table-responsive" style="overflow-x:inherit;">
                                    <table class="table table-bordered text-center vps-broker-table">
                                        <thead class="thead-dark text-uppercase">
                                        <tr>
                                            <th class="display-none">rank</th>
                                            <th>broker</th>
                                            <th>review</th>
                                            <th class="display-none">Country</th>
                                            <th class="display-none">min prize</th>
                                            <th class="display-none">trial vps</th>
                                            <th class="display-none">promotion</th>
                                            <th>info</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="t-light-green">
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)" class="mb-1">
                                                            <img src="assets/images/broker/FXCC_FXBNP.png" alt="">
                                                        </a>
                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>FXCC_FXBNP</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/star.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>25</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <div>
                                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="badge badge-success pointer p-1 ml-1">50% Discount</span>
                                                        <span class="badge badge-success pointer p-1 ml-1">free VPS</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="t-green">
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">2</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/Pepperstone.png" alt="">
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>Pepperstone</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/spain.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>250</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="t-light-green">
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">3</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/ironfx-logo.jpg" alt="">
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>Ironfx</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/ger.jpg" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>125</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="t-green">
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">4</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/Fxsvps.png" alt="" >
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>FXVPS</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/it.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>205</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="t-light-green">
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">5</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/HyperVM.png" alt="" >
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>HyperVM</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/star.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>20</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">6</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)" class="mb-1">
                                                            <img src="assets/images/broker/FXCC_FXBNP.png" alt="">
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>FXCC_FXBNP</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/star.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>25</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">7</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/Pepperstone.png" alt="">
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>Pepperstone</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/spain.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>250</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">8</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/ironfx-logo.jpg" alt="">
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>Ironfx</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/ger.jpg" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>125</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">9</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/Fxsvps.png" alt="" >
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>FXVPS</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/it.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>205</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-primary"></i></span>
                                                    <span class="numbers">10</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/images/broker/HyperVM.png" alt="" >
                                                        </a>

                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>HyperVM</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <ul class="m-0 p-0 list-unstyled">
                                                        <li>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </li>
                                                        <li>5.0 (6 reviews)</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span><img src="assets/images/flag/star.png" width="24" alt=""></span>
                                                    <span>Cyprus, UK, Mauritius</span>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <div class="dollar-package">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>20</span>
                                                    </div>
                                                    <div class="basic-package">basic package</div>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td class="display-none">
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="all-btns">
                                                    <a href="#" class="btn bg-warning text-white">website</a>
                                                    <a href="forex-vps-review.html" class="btn bg-success text-white" target="_blank">review</a>
                                                    <a href="#" class="btn bg-info text-white">compare</a>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="all-btns-payment">
                                                    <a href="" title="Wire Transfer"><img src="assets/images/payment/wire_transfer.png" alt=""></a>
                                                    <a href="" title="Credit Cards"><img src="assets/images/payment/cards.png" alt=""></a>
                                                    <a href="" title="Skrill"><img src="assets/images/payment/Skrill-sm.png" alt=""></a>
                                                    <a href="" title="Neteller"><img src="assets/images/payment/Neteller-sm.png" alt=""></a>
                                                    <a href="" title="Fasapay"><img src="assets/images/payment/FasaPay.png" alt=""></a>
                                                    <a href="" title="UnionPay"><img src="assets/images/payment/UnionPay.png" alt=""></a>
                                                    <a href="" title="Webmoney"><img src="assets/images/payment/webmoney.png" alt=""></a>
                                                </div>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-center mt-3 mb-4">
                                <img src="assets/images/add/fx_vps.gif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
