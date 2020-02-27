@extends('frontend.layouts-v2.master')

@section('home-active', 'active')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
    /* For tab CSS [How Investment partent work section] */
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

    #how_it_work .nav-pills .nav-link>span {
        display: inline-block;
        -webkit-transform: skew(21deg);
        transform: skew(21deg);
    }

    /* For Video Background CSS */
    #carouselExampleIndicators .carousel-inner .carousel-item {
        height: 80vh;
    }
    .btn-custom {
        background: inherit;
    }
</style>
<style>
	.modal {
		z-index:1150;
	}
	.modal-title {
		font-weight: 400;
	}
	.modal-body p {
		padding: 0 18px;
	}
	.modal-body ul li {
		list-style-type:none;
	}
	.box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #2980b9;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 225px;
  padding: 15px 0;
  background-color: #3498db;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 12px/1 'Lato', sans-serif;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}

/* top left*/
.ribbon-top-left {
  top: -10px;
  left: -10px;
}
.ribbon-top-left::before,
.ribbon-top-left::after {
  border-top-color: transparent;
  border-left-color: transparent;
}
.ribbon-top-left::before {
  top: 0;
  right: 0;
}
.ribbon-top-left::after {
  bottom: 0;
  left: 0;
}
.ribbon-top-left span {
  right: -25px;
  top: 37px;
  transform: rotate(-45deg);
}
.broker-list li {
	line-height: 30px;
}
html .text-primary {
    color: #3498db !important;
		padding-right: 5px;
}

</style>
@endsection

@section('bottom-script')
    <!-- Typewriting JS -->
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script>
    <script async>
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

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

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
            for (var i = 0; i < elements.length; i++) {
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
    <!-- Ticker -->
    <script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
    <script async src="{{ asset('/assets/') }}/js/start.js"></script>

    
    <!-- Video Background JS -->
    <script src="{{ asset('/assets/') }}/js/ultimate-bg.js"></script>
    <script async>
        jQuery('.top-video-frame').c47bg({
            type: 'self-hosted',
            container: 'div',
            source: {
                mp4: 'bgs.mp4'
            },
            crop: false
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('/assets/') }}/js/scripts.js"></script>
    <script async>
        // Forex Broker List Dropdown Menu
        $('.dropdown-new').click(function() {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.dropdown-menu-new').slideToggle(300);
        });
        $('.dropdown-new .dropdown-menu-new li').click(function() {
            $(this).parents('.dropdown-new').find('span.holder').text($(this).text());
            $(this).parents('.dropdown-new').find('input').attr('value', $(this));
        });
    </script>

    <script>
        

        $(document).ready(function () {
            $(".broker-regulated-information").click(function () {
                let content = JSON.parse($(this).attr('data-content'))
                //console.log(content)
                let authorities = content.regulatory_authorities.map(authority=> {
                    return authority.name
                })
               console.log(content)
                $("#broker-name-on-regulated-modal").text(content.name)
                $("#regulated-broker-website").text('Website : ' + content.website_url)
                $("#regulated-broker-company-name").text('Comapny name : ' + content.name)
                $("#regulated-broker-foundation").text('Founded in : ' + content.founded_in)
                $("#regulated-broker-headquarter").text('Headquarter : ' + content.headquarter)
                $("#regulated-broker-regulation").text('Regulation : ' + authorities.join(', '))
                $("#regulated-broker-payment-processor").text('Payment Processor : ' + content.meta.acc_currency)
            })
        })
        
        
    </script>
@endsection

@section('trading-ticker')
@include('frontend.layouts.includes.trading-ticker')
@endsection

@section('slider')
@include('frontend.layouts.includes.video-slider')
@endsection

@section('summery-widgets')
@include('frontend.layouts.includes.summery-widgets')
@endsection

@section('content')

@include('frontend.layouts.includes.about')

@include('frontend.layouts.includes.how_it_work')

@include('frontend.layouts.includes.core-services')

@include('frontend.layouts.includes.our-work')

@include('frontend.layouts.includes.our-performance')

@include('frontend.layouts.includes.broker-list')

@include('frontend.layouts.includes.client-review')

@include('frontend.partials.blog.carousel')

@include('frontend.layouts.includes.broker-regulated-modal')

@include('frontend.layouts.includes.company-details-modal')

@include('frontend.layouts.includes.company-statement-modal')

@endsection