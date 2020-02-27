@extends('frontend.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('member/css/profile.css') }}" type="text/css">
@endsection

@section('footer-script')
    <script src="{{ asset('member/js/profile.js') }}"></script>
@endsection

@section('content')

<section class="profile-user fx_tri mb-5 mt-5">
    <div class="container">
        <profile />
    </div>
</section>
@endsection
