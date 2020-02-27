@extends('frontend.layouts-v2.master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/signal.css') }}" />
<style>
    .bg-red {
        background: #dca5a9;
        padding: 4px 7px;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        height: 30px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }

    .bg-gray {
        background: #ccc;
        padding: 4px 7px;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        height: 30px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }

    .bg-green {
        background: #a0c5a8;
        padding: 4px 7px;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        height: 30px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }

    .activetexts {
        color: #fff;
        background-color: #4caf50;
        line-height: 36px;
    }

    .filltexts {
        color: #fff;
        background-color: #010047;
        line-height: 36px;
    }

    .expiretexts {
        color: #fff;
        background-color: #ff9800;
        line-height: 36px;
    }

    .deletetexts {
        color: #fff;
        background-color: #f44336;
        line-height: 36px;
    }
</style>
@endsection

@section('bottom-script')

<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
<script src="{{ env('APP_URL') . '/js/index.js' }}" type="text/javascript"></script>
@if (!is_null($signal->notes))
<script>
    document.getElementById('note').style.cursor = 'pointer'
    document.getElementById('note').addEventListener('click', function() {
        $("#note-area").toggle("slow");
    });
</script>
@endif
@if (!is_null($signal->image))
<div class="modal fade bd-example-modal-lg" id="signal" tabindex="-1" role="dialog" aria-labelledby="signalModalLabel" aria-hidden="true" style="z-index:1140;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-bg-signal">
                <h3 id="signalModalLabel" class="modal-title">Signal Analysis</h3>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
            </div>
            <div class="modal-body no-pb modal-list-menu pt-1">
                <div class="intra-modal-image"><img id="analysisModalshow" class="img-fluid" src="{{ env('APP_URL') . '/signal/' . $signal->image }}" alt="signalimages">
                    <div class="pic-shadow"></div>
                </div>
            </div>
            <div class="modal-footer no-pb no-pt">
                <button type="button" data-dismiss="modal" class="btn btn-raised btn-primary-modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('content')
<div id="app"></div>
@include('frontend.layouts.includes.trading-ticker')


<section class="signal">
    <div class="container-shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pl-0 pr-0">
                    <h1>{{ $signal->currency->name . ' Forex Signal @ ' . $signal->updated_at->format('d M, o h:m a') }}</h1>
                </div>
            </div>
            <?php
            $bg = 'other';
            if ($signal->signal_type === 'buy' && (!isset($signal->status) || (isset($signal->status) && $signal->status === 'active'))) {
                $bg = 'buy';
            }
            if ($signal->signal_type === 'sell' && (!isset($signal->status) || (isset($signal->status) && $signal->status === 'active'))) {
                $bg = 'sell';
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card {{ $bg }}">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="title-bar">
                                    @php
                                    $icon = $signal->currency->icon;
                                    $icon_arr = explode('-',$icon);
                                    @endphp
                                    <span>
                                        <strong>
                                            {{ $signal->currency->name }}
                                            @foreach($icon_arr as $key => $single_icon)
                                            <span @if ($key==1) style="margin-left: -1px;" @endif class="flag-icon flag-icon-{{ $single_icon }}"></span>
                                            @endforeach
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $signal->currency->name }} signal
                                        <span class="badge badge-custom">{{ $signal->updated_at->format('d M, o h:m a') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Signal Time
                                        <span class="badge badge-custom">{{ $signal->signal_time->format('d M, o h:m a') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Valid Till
                                        <span class="badge badge-custom">{{ !is_null($signal->valid_till) ? $signal->valid_till->format('d M, o h:m a') : 'Not Specified' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Sell at
                                        <span class="badge font-custom">{{ $signal->type }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Take profit* at
                                        <span class="badge">{{ $signal->take_profit }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Stop loss at
                                        <span class="badge">{{ $signal->stop_loss }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Analysis
                                        <span class="badge badge-check" data-toggle="modal" data-target="#analysis">{{ !is_null($signal->image) ? 'Check' : 'N/A' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="note" class="signal-note">
                                    <div>
                                        @if (!is_null($signal->notes))
                                        <span><i class="fas fa-plus"></i></span>
                                        @endif
                                    </div>
                                    <div><span><strong>SIGNAL NOTE</strong></span></div>
                                    <div>
                                        @if (!is_null($signal->notes))
                                        <span><i class="fas fa-plus"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div style="display:none" id="note-area" class="signal-note-details">
                                    <div>
                                        <p>{{ $signal->notes }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="{{ !isset($signal->status) || (isset($signal->status) && $signal->status === 'active') ? 'activetexts' : '' }}{{ $signal->status === 'filled' ? 'filltexts' : '' }}{{ $signal->status === 'expired' ? 'expiretexts' : '' }}{{ $signal->status === 'cancel' ? 'deletetexts' : '' }}">
                                    <span>
                                        <strong>
                                            {{ !isset($signal->status) || (isset($signal->status) && $signal->status === 'active') ? 'ACTIVE' : '' }}
                                            {{ $signal->status === 'filled' ? 'FILLED (' . ($signal->profit ? '+' : '-') . $signal->pips . ' Pips)' : '' }}
                                            {{ $signal->status === 'expired' ? 'EXPIRED' : '' }}
                                            {{ $signal->status === 'cancel' ? 'CANCELED' : '' }}
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection