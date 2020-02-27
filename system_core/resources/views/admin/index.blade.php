@extends('admin.layouts.default')

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
                    <li class="breadcrumb-item active">
                        <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                    </li>
                </ol>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="inner bg-container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-white">
                        Dashboard
                    </div>
                    <div class="card-body">
                    
                        <div class="row m-t-35">
                            <div class="col-lg">
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×
                                    </button>
                                    <strong>Well done!</strong>
                                    Welcome to admin dashboard, {{ Auth::guard('admin')->user()->full_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
