@extends('member.layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('member/css/dashboard.css') }}" type="text/css">
@endsection

@section('footer-script')
<script src="{{ asset('member/js/dashboard.js') }}"></script>
@endsection

@section('content')

<section class="mb-5 mt-5" id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <dashboard />
            </div>
        </div>
    </div>
</section>
@endsection