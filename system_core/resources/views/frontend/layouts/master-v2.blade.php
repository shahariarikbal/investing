<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="INVESTING PARTNER" />
    <meta content="INVESTING PARTNER" name="site_name">
    <meta content="INVESTING PARTNER" name="image">
    <meta name="google-signin-client_id" content="428114322971-u562mt0vk2iipa431svho22uafsu4dnt.apps.googleusercontent.com">
    <!-- SITE TITLE -->
    {!! Meta::toHtml() !!}
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <!-- Latest Bootstrap min CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/bootstrap/css/bootstrap.min.css"> --}}
    <!-- Google Font -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Font Awesome CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/ionicons.min.css"> --}}
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{ asset('/css/lib/owl.carousel.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/owl.carousel.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/owlcarousel/css/owl.theme.css"> --}}
    <!-- Magnific Popup CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/magnific-popup.css"> --}}


    <!-- For navigation bar CSS -->
    <link rel="stylesheet" href="{{ asset('/css/navigation.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/theme.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/theme-elements.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/navigation.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/others/css/skins/skin-corporate-8.css"> --}}

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/jssocials.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/jssocials-theme-flat.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/jssocials.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/style.css"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('/css/lib/animate.min.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/animate.css"> --}}
    {{-- <link id="layoutstyle" rel="stylesheet" href="{{ asset('/assets/') }}/color/theme.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> --}}
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/footable.standalone.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/jquery.rateyo.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/custom-theme.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/custom.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/responsive.css"> --}}
    <script type="text/javascript">
        window.InvestingPartner = <?php echo json_encode([
            'csrfToken' => csrf_token(), 
            'locale' => config('app.locale'),
            'auth' => Auth::guard('member')->user(),
            'app_url' => config('app.url')
        ]); ?>
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '658010044628631',
                cookie     : true,
                xfbml      : true,
                version    : 'v3.2'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    @yield('style')
    @yield('head-script')
    <style>
        #how_it_work .nav-pills .nav-link{

        }
        #how_it_work .nav-pills .nav-link {
            color: #fff;
            background: none;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            border: 1px solid #fff;
            padding: 7px 15px;
            display: inline-block;

            margin: 5px;
            outline: 0;

        }
        #how_it_work .nav-pills .nav-link:visited {
            color: #fff;
        }
        #how_it_work .nav-pills .nav-link:hover {
            transform: skew(-21deg);
            -webkit-transform: skew(-21deg);
            transform: skew(-21deg);
        }
        #how_it_work .nav-pills .nav-link > span {
            display: inline-block;
            -webkit-transform: skew(21deg);
            transform: skew(21deg);
        }
        #carouselExampleIndicators .carousel-inner .carousel-item {
            height: 80vh;
        }
        /* .top-video-frame .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: black;
        opacity: 0.5;
        z-index: 1;
      } */

    </style>
</head>
<body>

    <div id="app">
        <!-- LOADER -->
        <!-- <div class="preloader">
            <div id="loader"></div>
        </div> -->
        <!-- END LOADER -->

        @include('frontend.layouts.includes.header')

        @yield('slider')


        <!-- Start who we are -->
        @yield('content')




        <!-- START FOOTER SECTION -->
        @include('frontend.layouts.includes.footer')




        <!-- Login Modal -->
        @include('frontend.layouts.includes.modal')
        <!-- END FOOTER SECTION -->


    </div>



<a href="#" class="scrollup btn-default" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<script src="{{ asset('/js/core.js') }}"></script>


<!-- Latest jQuery -->
<!-- <script src="assets/others/js/jquery.min.js"></script> -->
<!--for navigation bar js-->



<!-- Latest compiled and minified Bootstrap -->

<script src="{{ asset('/assets/') }}/others/js/common.min.js"></script>
<script src="{{ asset('/assets/') }}/others/js/theme.js"></script>
<script src="{{ asset('/assets/') }}/others/js/theme.init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script>

<!-- magnific-popup min js  -->
<script src="{{ asset('/assets/') }}/js/magnific-popup.min.js"></script>

<script>
    $('.after-login').hide();

    $('#submitButton').click(function(){
        $('.after-login').show();
        $('.login-sign-container').hide();
    })
</script>
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script src="{{ asset('/assets/') }}/js/start.js"></script>


<script>
    /*Dropdown Menu*/
    $('.dropdown-new').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu-new').slideToggle(300);
    });
    // $('.dropdown-new').focusout(function () {
    //     $(this).removeClass('active');
    //     $(this).find('.dropdown-menu-new').slideUp(300);
    // });
    $('.dropdown-new .dropdown-menu-new li').click(function () {
        $(this).parents('.dropdown-new').find('span.holder').text($(this).text());
        $(this).parents('.dropdown-new').find('input').attr('value', $(this));
    });
    /*End Dropdown Menu*/
    //          $('.navbar-toggler').click(function(e){
    //   alert('works');
    //   $('.sb-slidebar').toggleClass('show-menu');
    // })
</script>

<script>
    let modalBtn = ["join_now", "sign_in", "sign_in_on_forgot", "forgot_password"]
    $.each(modalBtn, function(index, value) {
        $("#"+value).click(function(event) {
            event.preventDefault()
            $(".modal").modal('hide')
        })
    })

</script>
@yield('footer-script')

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

@yield('trading-session-script')

</body>
</html>
