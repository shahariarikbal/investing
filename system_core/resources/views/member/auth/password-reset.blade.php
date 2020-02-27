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
                    @if($success = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $success }}</p>
                        </div>
                    @endif
                    <div class="authorize_box mt-5 mb-5 p-5" style="box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);">
                        <div class="title_dark text-center mb-3">
                            <h2>Password Reset</h2>
                        </div>
                        <div class="authorize_form">
                            <form method="POST" action="{{ url('/password-update?token='.request('token')) }}">
                                @csrf
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="New Password" required autocomplete="current-password">
                                    <small style="color: red"> {{ $errors->has('password') ? $errors->first('password') : ' ' }}</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn" style="background: #212529;color: #fff; font-size: 16px;">Reset Password</button>
                                </div>

                                <div class="form-group text-center">
                                    <span>Back to <a href="{{ url('/login/member') }}" class="theme-color"><u>Login</u></a></span>
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
