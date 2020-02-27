@extends('layouts.app')

@section('content')



<payments></payments>

@endsection



@push('style')
<link rel="stylesheet" type="text/css" href="{{ mix('css/wallet.css') }}">
@endpush


@push('script')
<script src="{{ mix('js/wallet.js') }}"></script>

@endpush