@extends('admin.layouts.default')
@section('title')
    Subscriptions
@endsection

@section('subscription-active', 'active')

@section('vue-router-js')
<script src="{{ asset('admin/js/subscription.js') }}"></script>
@endsection

@section('header_styles')

<link rel="stylesheet" href="{{ asset('/admin/css/pages/general_components.css') }}"/>


@endsection


@section('footer_scripts')

@endsection

@section('content')

<div id="content" class="bg-container">
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
                            <i class="fa fa-file-text"></i>
                            Subscriptions
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header><br>


    <!-- <div id="content" class="bg-container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::get('message'))
                    <p class="alert alert-success alert_msg">{{Session::get('message')}}</p>
                @endif
            </div>
        </div>
        <div class="outer">
            <div class="inner bg-container">
                <div class="row sales_section">
                    @foreach ($counts as $key => $count)
                        @php
                            $service = strtolower(str_replace('App\\', '', $key));
                            $service = $service === 'fundmanagement' ? 'fund-management' : $service;
                        @endphp
                        <div class="col-md-3 media_max_573 cursor-pointer" onclick="location.href = `{{ url('admin/subscription/' . $service) }}`">
                            <div class="card p-d-15">
                                <div class="sales_icons">
                                    <span class="bg-danger"></span>
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <div>
                                    <h5 class="sales_orders text-right m-t-5">{{ strtolower(str_replace('App\\', '', $key)) }}</h5>
                                    <h1 class="sales_number m-t-15 text-right">{{ $count }}</h1>
                                    <a href="#">
                                        <b class="sales_text">Total {{ strtolower(str_replace('App\\', '', $key)) }}: {{ $count }} </b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> -->

    <div class="outer">
        <div class="inner bg-container">
            <subscription />
        </div>
    </div>
</div>



@endsection
