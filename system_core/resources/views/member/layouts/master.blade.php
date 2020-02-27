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

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    
    <!-- For navigation bar CSS -->
    <link rel="stylesheet" href="{{ asset('/css/navigation.css') }}">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('/assets/') }}/css/footable.standalone.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/') }}/css/jquery.rateyo.min.css"> -->
    
    <script type="text/javascript">
        window.InvestingPartner = <?php echo json_encode([
            'csrfToken' => csrf_token(), 
            'locale' => config('app.locale'),
            'auth' => Auth::guard('member')->user(),
            'admin' => Auth::guard('admin')->user(),
            'messageInfo' => Session::has('message-info') ? Session::get('message-info') : null,
            'app_url' => config('app.url')
        ]); ?>
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

    <!-- <div id="app"> -->
        <!-- LOADER -->
        <div class="preloader">
            <div id="loader"></div>
        </div>
        <!-- END LOADER -->

        @include('frontend.layouts.includes.header')

        <!-- Start who we are -->
        @yield('content')

        <!-- START FOOTER SECTION -->
        @include('frontend.layouts.includes.footer')

    <!-- </div> -->



<a href="#" class="scrollup btn-default" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<script src="{{ asset('/js/core.js') }}"></script>


<!-- Latest compiled and minified Bootstrap -->
<script src="https://dev.investingpartner.com/assets/others/js/common.min.js"></script>
<script src="{{ asset('/assets/') }}/others/js/theme.js"></script>
<script src="{{ asset('/assets/') }}/others/js/theme.init.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script> -->
<!-- owl-carousel min js  -->
<!-- <script src="{{ asset('/js/lib/owl.carousel.min.js') }}"></script> -->
<!-- magnific-popup min js  -->
<!-- <script src="{{ asset('/assets/') }}/js/magnific-popup.min.js"></script> -->
<!-- waypoints min js  -->
<!-- <script src="{{ asset('/assets/') }}/js/waypoints.min.js"></script> -->
<!-- parallax js  -->
<!-- <script src="{{ asset('/assets/') }}/js/parallax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> -->


<!-- countdown js  -->
<!-- <script src="{{ asset('/assets/') }}/js/jquery.countdown.min.js"></script> -->
<!-- particles min js  -->
<!-- <script src="{{ asset('/assets/') }}/js/particles.min.js"></script> -->
<!-- <script>
    $('.after-login').hide();

    $('#submitButton').click(function(){
        $('.after-login').show();
        $('.login-sign-container').hide();
    })
</script> -->
<!-- Ticker -->
<!-- <script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script src="{{ asset('/assets/') }}/js/start.js"></script> -->
<!-- Slider JS -->
<!-- <script>
    (function($) {
        //Function to animate slider captions
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = "webkitAnimationEnd animationend";

            elems.each(function() {
                var $this = $(this),
                    $animationType = $this.data("animation");
                $this.addClass($animationType).one(animEndEv, function() {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $("#carouselExampleIndicators"),
            $firstAnimatingElems = $myCarousel
                .find(".carousel-item:first")
                .find("[data-animation ^= 'animated']");

        //Initialize carousel
        $myCarousel.carousel();

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);

        //Other slides to be animated on carousel slide event
        $myCarousel.on("slide.bs.carousel", function(e) {
            var $animatingElems = $(e.relatedTarget).find(
                "[data-animation ^= 'animated']"
            );
            doAnimations($animatingElems);
        });
    })(jQuery);
</script> -->
<!-- scripts js -->
<!-- <script src="{{ asset('/assets/') }}/js/footable.min.js"></script> -->
<!-- <script>
    // Foo Table

    jQuery(function($){
        $('#broker-table').footable({
            "sorting": {
                "enabled": true
            },
            "filtering": {
                "enabled": true
            },
            "paging": {
                "enabled": false,
            }
        });







        // Sorting Enabled External Dropdown
        $('.call-sort li').on('click', function (e) {
            e.preventDefault();
            var sorting = FooTable.get('#broker-table').use(FooTable.Sorting),
                column = parseInt($(this).attr('data-sort-column')),
                direction = $(this).attr('data-sort-direction');
            sorting._sort(column, direction);
        });



        $('.filter-show li').on('click', function (e) {
            var filtering = FooTable.get('#broker-table').use(FooTable.Filtering), // get the filtering component for the table
                filter = $(this).html(); // get the value to filter by


            if (filter === 'All Catagories'){ // if the value is "none" remove the filter
                filtering.removeFilter('keySearch');
            } else { // otherwise add/update the filter.
                filtering.addFilter('keySearch', filter);
            }
            filtering.filter();
        });
    })



</script> -->
<!-- <script>
    $('#vps').footable({
        "sorting": {
            "enabled": true
        },
        "filtering": {
            "enabled": true
        },
        "paging": {
            "enabled": true,
            "size": 10
        }
    });
    // Sorting Enabled External Dropdown
    $('.com-call-sort li').on('click', function (e) {
        e.preventDefault();
        var sorting_new = FooTable.get('#vps').use(FooTable.Sorting),
            column_new = parseInt($(this).attr('data-sort-column')),
            direction_new = $(this).attr('data-sort-direction');
        sorting_new._sort(column_new, direction_new);

        var checked = $('#vps input').attr('checked','checked');
    });
</script> -->
<!-- <script src="{{ asset('/assets/') }}/js/ultimate-bg.js"></script> -->
<!-- <script>
    jQuery('.top-video-frame').c47bg({
        type: 'self-hosted',
        container: 'div',
        source: {
            mp4: 'bgs.mp4'
        },
        crop:false
    });
</script> -->

<!-- <script>
    $('#extra input').click( function(){
        starvalue = $(this).attr('value');
        alert(starvalue);

        // iterate through the checkboxes and check those with values lower than or equal to the one you selected. Uncheck any other.
        for(i=0.5; i<=5; i+=0.5){
            if (i <= starvalue){
                $('.new'+i).prop('checked', true);
            } else {
                $('.new'+i).prop('checked', false);
                alert(i);
            }
        }
    });
</script> -->
<!-- <script src="{{ asset('/assets/') }}/js/jssocials.min.js"></script> -->
<!-- <script src="{{ asset('/assets/') }}/js/jquery.rateyo.min.js"></script>
<script src="{{ asset('/assets/') }}/js/scripts.js"></script> -->
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


<!-- <script>
    new WOW().init();
</script>
<script>
    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
<script>
    let modalBtn = ["join_now", "sign_in", "sign_in_on_forgot", "forgot_password"]
    $.each(modalBtn, function(index, value) {
        $("#"+value).click(function(event) {
            event.preventDefault()
            $(".modal").modal('hide')
        })
    })

</script> -->
@yield('footer-script')

<script src="{{ asset('/js/app.js') }}"></script>
<script>
    $(window).on('load', function() {
		var preLoder = $(".preloader");
		preLoder.delay(700).fadeOut(500);
    });
    
</script>

<script>
    $(function() {
        var setPause = null;
        var tickerLength = $('.scrollBoxFundManagement ul li').length;
        var tickerHeight = $('.scrollBoxFundManagement ul li').outerHeight();
        $('.scrollBoxFundManagement ul li:last-child').prependTo('.scrollBoxFundManagement ul');
        $('.scrollBoxFundManagement ul').css('marginTop', -tickerHeight);

        function moveTop() {
            $('.scrollBoxFundManagement ul').animate({
                top: -tickerHeight
            }, 600, function() {
                $('.scrollBoxFundManagement ul li:first-child').appendTo('.scrollBoxFundManagement ul');
                $('.scrollBoxFundManagement ul').css('top', '');
            });
        }
        $('.scrollBoxFundManagement').hover(function() {

                clearInterval(setPause);
            },
            function() {
                setPause = setInterval(function() {
                    moveTop();
                }, 3000);
            }
        );
        setPause = setInterval(function() {
            moveTop();
        }, 3000);
    });
</script>
<!-- <script src="{{ asset('assets/js/scripts.js') }}"></script> -->

</body>
</html>
