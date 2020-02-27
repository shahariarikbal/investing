@extends('admin.layouts.default')

@section('title')
    Packages
@endsection

@section('wallet-active', 'active')
@section('wallet-show', 'show')
@section('deposit-active', 'active')

@section('vue-router-js')
<script src="{{ asset('admin/js/deposit.js') }}"></script>
@endsection

@section('header_styles')
    
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/general_components.css') }}"/>
    
    <style>
        .badge-half.yearly {
            background: #ffa000
        }
    </style>
@endsection

@section('footer_scripts')

@endsection

@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg col-sm-5 col-md-12 col-12">
                    <h4 class="nav_top_align">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Dashboard
                    </h4>
                </div>
                <div class="col-lg col-sm-7 col-md-12 col-12">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                    <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-paw" aria-hidden="true"></i>
                            Deposit
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <deposit />
            </div>
        </div>
    </div>
@endsection

