@extends('frontend.layouts-v2.master')
@section('bottom-script')
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
@endsection
@section('content')
<div id="app">
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="authorize_box mt-5 mb-5 p-5" style="box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);">
                @if($success = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $success }}</p>
                    </div>
                @endif
                @if($warning = Session::get('warning'))
                        <div class="alert alert-danger">
                            <p>{{ $warning }}</p>
                        </div>
                    @endif
                <div class="title_dark text-center mb-3">
                    <h2>Forgot Password</h2>
                </div>
                    <div class=" text-muted text-center mb-3">
                    <p>Please enter your email address and we'll send you a link to reset your password.</p>
                    </div>
                    
                    <div class="authorize_form">
                        <form method="post" action="{{ url('/forgot/password-reset-link') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn" name="btn" style="background: #212529;color: #fff; font-size: 16px;">Send Email</button>
                            </div>
                            <div class="form-group text-center">
                                <span>Already a Member <a href="{{ url('/login/member') }}" class="theme-color"><u>Sign In</u></a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
</div>
@endsection