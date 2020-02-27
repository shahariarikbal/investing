@extends('admin.layouts.default')

@section('title')
    Packages
@endsection

@section('wallet-active', 'active')
@section('wallet-show', 'show')
@section('withdraw-active', 'active')

@section('vue-router-js')
<script src="{{ asset('admin/js/withdraw.js') }}"></script>
@endsection

@section('header_styles')
 
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/general_components.css') }}"/>
    
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
                            Withdraw
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <Withdraw />
            </div>
        </div>
    </div>
@endsection

