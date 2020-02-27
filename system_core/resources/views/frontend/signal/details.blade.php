@extends('frontend.layouts-v2.master')

@section('signal-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/signal-report-details.css') }}" />
@endsection
@section('bottom-script')
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart', 'line']
    });
    google.charts.setOnLoadCallback(drawBackgroundColor);

    function drawBackgroundColor() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'X');
        data.addColumn('number', 'Pips (Per Tarding Signal)');
        data.addColumn('number', 'Total Pips Gained');
        data.addColumn('number', 'Average (Per Trading Signal)');

        var signals;


        var url = '{{ env('
        APP_URL ') }}' + '/forex-signal-report/detailsForGraph?' + window.location.href.split('?')[1];

        // console.log(FxsuccessDB.app_url+'/forex-signal-report/detailsForGraph'+url.split('?')[1])

        axios.get(url)
            .then(response => {
                signals = response.data
                doSomething()
            })
            .catch(error => {
                console.log(error)
            })

        function doSomething() {
            var d = []
            var prevPips = 0
            var count = 0
            signals.map(signal => {
                var a = []
                a.push(signal.updated_at)
                var pips = signal.is_profit ? parseInt(signal.pips) : -parseInt(signal.pips)
                a.push(pips)
                prevPips = prevPips + pips
                a.push(prevPips + pips)
                d.push(a)
                count++
            })

            d.map(each => {
                each.push(prevPips / count)
            })
            data.addRows(d);
            // console.log(d)

            var options = {
                hAxis: {
                    title: 'Date'
                },
                vAxis: {
                    title: 'Performance'
                },
                backgroundColor: '#f1f8e9'
            };

            var chart = new google.visualization.LineChart(document.getElementById('month_graph'));
            chart.draw(data, options);
        }

    }
</script>
@endsection

@section('content')
<div id="app"></div>
@include('frontend.layouts.includes.trading-ticker')
<section class="signal-report-details">
    <div class="container-shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="month_graph"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="st table table-hover">
                            <thead>
                                <tr>
                                    <th>Date, time</th>
                                    <th>Currency</th>
                                    <th>Order</th>
                                    <th>Entry Price</th>
                                    <th>Take Profit</th>
                                    <th>Stop Loss</th>
                                    <th>State</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($signals as $signal)
                                {{-- @dd($signal->currency['name']) --}}
                                <tr class="{{ $signal->is_profit === true ? 'filled-profit' : 'filled-loss' }}">
                                    <td>
                                        <span>
                                            <small>
                                                <a href="{{ url('/forex-signal/'.$signal->currency['name'].'/'.$signal->created_at->format('Y').'/'.$signal->created_at->format('m').'/'.$signal->created_at->format('d').'/'.$signal->id) }}">
                                                    @php
                                                    $date = \Carbon\Carbon::parse($signal->updated_at)
                                                    @endphp
                                                    {{ $date->toDayDateTimeString() }}
                                                </a>
                                            </small>
                                        </span>
                                    </td>
                                    @php
                                    $icon = $signal->currency['icon'];
                                    $icon_arr = explode('-',$icon);
                                    @endphp
                                    <td>
                                        {{ $signal->currency['name'] }}
                                        @foreach($icon_arr as $key => $single_icon)
                                        <span @if ($key==1) style="margin-left: -1px;" @endif class="flag-icon flag-icon-{{ $single_icon }}"></span>
                                        @endforeach
                                    </td>
                                    <td>{{ ucfirst($signal->signal_type_display) }}</td>
                                    <td>{{ $signal->price }}</td>
                                    <td>{{ $signal->take_profit }}</td>
                                    <td>{{ $signal->stop_loss }}</td>
                                    <td class="word-break">{{ $signal->status === 'filled' ? 'Filled' : $signal->status }}</td>

                                    <td>{{ $signal->is_profit === true ? '+' : '-' }}{{ $signal->pips }}</td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection