<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        | Admire
        @show
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
    <!-- global styles-->
    <!-- <link type="text/css" rel="stylesheet" href="#" id="skin_change"/> -->
    <!-- end of global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/custom.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/vendors/themify/css/themify-icons.css') }}" />
    @yield('header_styles')
    <script type="text/javascript">
        window.InvestingPartner = <?php echo json_encode([
            'csrfToken' => csrf_token(), 
            'locale' => config('app.locale'),
            'auth' => Auth::guard('admin')->user(),
            'app_url' => config('app.url')
        ]); ?>
    </script>
</head>

<body @yield('body-class')>
<!--</div>-->
<!-- <div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('admin/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div> -->
<div class="" id="wrap">
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand mr-0" href="{{ url('/dashboard') }}">
                    <h4 class="text-white"><img src="{{ asset('/assets/images/logo.png') }}" class="admin_img" alt="logo"> {{ env('APP_NAME') }} Admin</h4>
                </a>
                <div class="menu mr-sm-auto">
                        <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars text-white"></i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right ml-auto">


                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{asset('admin/img/admin.jpg')}}" class="admin_img2 rounded-circle avatar-img" alt="avatar"> <strong>{{ auth()->guard('admin')->user()->full_name }}</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <div class="popover-header">Investing Partner Admin</div>

                                <a class="dropdown-item" href="{{ url('admin/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
    <!-- /#top -->
    <div class="wrapper" id="app">
        <div id="left">
            <div class="menu_scroll">
                <div class="media user-media dker">
                    <div class="media user-media">
                        <div class="user-media-toggleHover">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="user-wrapper">
                            <a class="user-link" href="">
                                <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                                     alt="User Picture" src="{{asset('admin/img/admin.jpg')}}">
                                <p class="text-white user-info">Welcome {{ auth()->guard('admin')->user()->full_name }}</p>
                            </a>
                            <div class="search_bar col">
                                <div class="input-group">
                                    <input type="search" class="form-control " placeholder="search">
                                    <span class="input-group-append">
                                    <button class="btn input-group-text" type="button"><span class="fa fa-search" >
                                    </span></button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #menu -->
                <ul id="menu" class="bg-blue dker">

                    <li class="@yield('content-container-active')">
                        <a href="javascript:;">
                            <i class="fa fa-hdd-o"></i>
                            <span class="link-title menu_hide">&nbsp; Content</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="@yield('content-show')">
                            <li class="@yield('blog-active')">
                                <a href="{{ url('admin/blogs') }}">
                                    <i class="fa fa-file-text"></i>
                                    &nbsp; Blog
                                </a>
                            </li>
                            <li class="@yield('analysis-active')">
                                <a href="{{ url('admin/analyses') }}">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span class="link-title">&nbsp;Analyses</span>
                                </a>
                            </li>
                            <li class="@yield('knowladge-active')">
                                <a href="{{ url('admin/knowledgebase') }}">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span class="link-title">&nbsp;Knowledgebase</span>
                                </a>
                            </li>
                            <!-- <li {!! (Request::is('admin/comments') ? 'class="active"' : '') !!}>
                            <a href="{{ url('/admin/comments') }}">
                                <i class="fa fa-comment"></i>
                                &nbsp; Comments
                            </a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="@yield('category-active')">
                        <a href="{{ url('admin/categories') }}">
                            <i class="fa fa-list"></i>
                            <span class="link-title menu_hide">&nbsp; Category</span>
                        </a>
                    </li>

                    <li class="@yield('plan-active')">
                        <a href="{{ url('admin/packages') }}">
                            <i class="fa fa-th-large"></i>
                            <span class="link-title menu_hide">&nbsp; Plans</span>
                        </a>
                    </li>
                    <li class="@yield('faq-active')">
                        <a href="{{ url('admin/faq') }}">
                            <i class="fa fa-pencil"></i>
                            <span class="link-title menu_hide">&nbsp; FAQ</span>
                        </a>
                    </li>
                    <li class="@yield('broker-container-active')">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span class="link-title menu_hide">&nbsp; Brokers</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="@yield('broker-show')">
                            <li class="@yield('broker-active')">
                                <a href="{{ url('admin/manage/brokers') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Manage Brokers
                                </a>
                            </li>
                            <li class="@yield('parameter-active')">
                                <a href="{{ url('admin/brokers/Parametars') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Brokers Parametars
                                </a>
                            </li>
                            <li class="@yield('broker-reviews-active')">
                                <a href="{{ url('admin/brokers/reviews') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Brokers Reviews
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="@yield('signal-container-active')">
                        <a href="#">
                            <i class="fa fa-signal"></i>
                            <span class="link-title menu_hide">&nbsp; Signal</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="@yield('signal-open')">
                            <li class="@yield('currency-active')">
                                <a href="{!! url('admin/currencies') !!} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Currency List
                                </a>
                            </li>
                            <li class="@yield('signal-active')">
                                <a href="{{ url('admin/signals') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Signal List
                                </a>
                            </li>
                        
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-support"></i>
                            <span class="link-title menu_hide">&nbsp; Support</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                            <a href="{{ url('admin/tickets') }}">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Support List
                            </a>
                            </li>
                        </ul>
                    </li>

                    <li class="@yield('performance-graph-active')">
                        <a href="{{ url('admin/graphs') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="link-title menu_hide">&nbsp; Performance Graph</span>
                        </a>
                    </li>

                    <li class="@yield('monthly-trade-statement-active')">
                        <a href="{{ url('admin/monthly-trade-statement') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="link-title menu_hide">&nbsp; Monthly Trade Statement</span>
                        </a>
                    </li>

                    <li class="@yield('market-sentiment-active')">
                        <a href="{{ url('admin/market-sentiments') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="link-title menu_hide">&nbsp; Market Sentiments</span>
                        </a>
                    </li>

                    <li class="@yield('shout-active')">
                        <a href="{{ url('admin/shouts') }}">
                            <i class="fa fa-bullhorn"></i>
                            <span class="link-title menu_hide">&nbsp; Shout Management</span>
                        </a>
                    </li>

                    <li class="@yield('subscription-active')">
                        <a href="{{ route('admin.subscription.index') }}">
                            <i class="fa fa-bullhorn"></i>
                            <span class="link-title menu_hide">&nbsp; Subscriptions Management</span>
                        </a>
                    </li>

                    <li class="@yield('wallet-active')">
                        <a href="#">
                            <i class="ti-wallet"></i>
                            <span class="link-title menu_hide">&nbsp; Wallet Management</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="@yield('wallet-show')">
                            <li class="@yield('deposit-active')">
                                <a href="{{ route('admin.wallet.deposit') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Deposits
                                </a>
                            </li>
                            <li class="@yield('withdraw-active')">
                                <a href="{{ route('admin.wallet.withdraw') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Withdraws
                                </a>
                            </li>
                            <li class="@yield('balance-active')">
                                <a href="{{ route('admin.wallet.balance') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Balance
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="@yield('settings-active')">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="link-title menu_hide">&nbsp; Settings</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul class="@yield('settings-container-show')">
                            <li class="@yield('permission-management-active')">
                                <a href="{{ route('admin.permission.management') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Permission Management
                                </a>
                            </li>
                            <li class="@yield('role-management-active')">
                                <a href="{{ route('admin.role.management') }}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Role Management
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="@yield('member-active')">
                        <a href="{{ route('admin.member-management') }}">
                            <i class="fa fa-users"></i>
                            <span class="link-title menu_hide">&nbsp; Member Management</span>
                        </a>
                    </li>
                </ul>
                <!-- /#menu -->
            </div>
        </div>
        <!-- /#left -->
        <div id="content" class="bg-container">
            <!-- Content -->
            @yield('content')
            <!-- Content end -->
        </div>


    </div>
    @include('admin.layouts.right_sidebar')
    <!-- # right side -->
</div>

<!-- global scripts-->
<script src="{{ asset('admin/js/core.js') }}"></script>
@yield('vue-router-js')
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script type="text/javascript" src="{{asset('/admin/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin/js/custom.js')}}"></script>
<!-- end of global scripts-->
<!-- page level js -->

@yield('footer_scripts')
<!-- end page level js -->
</body>
</html>
