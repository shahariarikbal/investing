<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="INVESTING PARTNER" />
    <meta content="INVESTING PARTNER" name="site_name">
    <meta content="INVESTING PARTNER" name="image">

    <!-- SITE TITLE -->
    {!! Meta::toHtml() !!}
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <!-- IonIcons & Font Awesome Icon CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- For navigation bar CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/theme.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/theme-elements.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/navigation.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/skins/skin-corporate-8.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/custom.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/responsive.css">

    <style>
       /* forex broker list [premium tag css] */
       .premium-tag {
            left: -44px;
            line-height: 15px;
        }
        .broker-table tr td:first-child span.rank {
            left: 17.5px;
        }
    </style>
    <script type="text/javascript">
        window.InvestingPartner = <?php echo json_encode([
            'csrfToken' => csrf_token(), 
            'locale' => config('app.locale'),
            'auth' => Auth::guard('member')->user(),
            'admin' => Auth::guard('admin')->user(),
            'message-info' => Session::has('message-info') ? Session::get('message-info') : null,
            'app_url' => config('app.url')
        ]); ?>
    </script>

    @yield('style')

    @yield('head-script')

</head>

<body>
    @include('frontend.layouts.includes.social-share')

    @yield('fb-sdk')
    
    @include('frontend.layouts.includes.header')
    
    @yield('top-trading-ticker')

    @yield('slider')

    @yield('bottom-trading-ticker')

    @yield('summery-widgets')

    @yield('content')
    
    @include('frontend.layouts.includes.footer')


    <a href="#" class="scrollup btn-default" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    
    <script src="{{ asset('/js/core-v2.js') }}"></script> 
    @yield('bottom-script')
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- For Animation (WOW JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Onscroll Navbar -->
    <script src="{{ asset('/assets/') }}/others/js/common.min.js"></script>
    <script src="{{ asset('/assets/') }}/others/js/theme.js"></script>
    <script src="{{ asset('/assets/') }}/others/js/theme.init.js"></script>
    
   
    
    
    
</body>

</html>