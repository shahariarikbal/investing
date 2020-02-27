@extends('admin.layouts.default')
@section('title')
    Market Sentiments
@endsection

@section('market-sentiment-active', 'active')

@section('header_styles')


<link rel="stylesheet" href="{{ asset('admin/css/pages/widgets.css')}}">
<link rel="stylesheet" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendors/inputlimiter/css/jquery.inputlimiter.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/vendors/chosen/css/chosen.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/scroller.bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/colReorder.bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/pages/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/plugincss/responsive.dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendors/tooltipster/css/tooltipster.bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/tipso/css/tipso.min.css') }}">

<!-- Date time picker-->
<link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/vendors/datetimepicker/css/DateTimePicker.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/vendors/j_timepicker/css/jquery.timepicker.css') }}"/>

<!-- end of plugin styles -->
<!--Page level styles-->
<link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/lib/flag-icon.min.css') }}">
<style>
    .badge-1 { background: #00bf86 }
    .badge-0 { background: #727b84 }
    .badge-publish { background: #00c0ef }
    .badge-editing {  }
    .badge-trash { background: #ff8086 }
    .x-90 {
        transform: rotate(-90deg);
        letter-spacing: 2px;
        text-transform: capitalize;
        border-radius: 4px;
    }
    .cursor-pointer {
        cursor: pointer;
    }

    .add_graph{
        margin-right: 627px
    }

    .alert_msg{
        margin-left: 20px;
        margin-right: 20px;
    }
    </style>

@endsection

@section('footer_scripts')
    <script>
        document.getElementById('buy').addEventListener('keyup', function() {
            document.getElementById('sell').value = 100 - parseFloat(this.value)
        })
    </script>
    <script>
        document.getElementById('sell').addEventListener('keyup', function() {
            document.getElementById('buy').value = 100 - parseFloat(this.value)
        })
    </script>
    <script>
        /*Save market sentiment*/
        var error = 0;
        

            function marketSentimentsValidate() {
                if (document.getElementById('currency_id').value == "") {
                    document.getElementById("currency_id_error").innerHTML = "Please select your currency";
                    error++
                }

                if (document.getElementById('buy').value == "") {
                    document.getElementById("buy_error").innerHTML = "Please type buy amount";
                    error++
                }

                if (document.getElementById('sell').value == "") {
                    document.getElementById("sell_error").innerHTML = "Please type sell amount";
                    error++
                }
            }

            function reset_error() {
                error = 0
                document.getElementById("currency_id_error").innerHTML = "";
                document.getElementById("buy_error").innerHTML = "";
                document.getElementById("sell_error").innerHTML = "";
            }

        document.getElementById('saveMarketSentiments').addEventListener('click', function() {

            reset_error()
            marketSentimentsValidate()

                var data = {
                    currency_id: document.getElementById('currency_id').value,
                    buy: document.getElementById('buy').value,
                    sell: document.getElementById('sell').value,
                    status: document.getElementById('status').value,
                }
                // initialize loading effect
                var height = parseInt(document.getElementById('marketSentimentsForm').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('market-loading').setAttribute('style', loadingStyle)

                // axiox request for market sentiments
                if (error === 0) {
                    axios.post('/admin/market-sentiments', data)
                    .then(response => {
                        console.log(response)
                        if (response.status === 200) {
                            $('.addMarketSentimentsModal').modal('hide')
                            window.location.reload(true)

                            document.getElementById('market-loading').setAttribute('style', 'display: none')
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        document.getElementById('market-loading').setAttribute('style', 'display: none')
                        if (error.response && error.response.status === 422) {
                            console.log(error.response.data.errors.currency_id);

                            if (error.response.data.errors.currency_id && error.response.data.errors.currency_id.length > 0) {
                                document.getElementById("currency_id_error").innerHTML = 'There is already in entry with this currency'
                            }

                        } else {
                            console.log('Others error')
                        }
                    })
                }
                
        })
    </script>

    <!--market sentiments edit-->
    <script>
        function editMarketSentiment(el) {
            axios.get('/admin/market-sentiment/edit/' + el.getAttribute('data-id'))
                .then(response => {
                    console.log(response)
                    document.getElementById('marketSentimentId').value = el.getAttribute('data-id');
                    document.getElementById('edit_currency_id').value = response.data.currency_id;
                    document.getElementById('edit_buy').value = response.data.buy;
                    document.getElementById('edit_sell').value = response.data.sell;
                    document.getElementById('edit_status').value = response.data.status;
                })
                .catch(error => {
                    console.log(error)
                })
        }
    </script>
    <!--buy & sell amount script-->
    <script>
        document.getElementById('edit_buy').addEventListener('keyup', function() {
            document.getElementById('edit_sell').value = 100 - parseFloat(this.value)
        })
    </script>

    <script>
        document.getElementById('edit_sell').addEventListener('keyup', function() {
            document.getElementById('edit_buy').value = 100 - parseFloat(this.value)
        })
    </script>

    <script>
        /*update market sentiment*/
            var update_error = 0;

            function updateMarketSentimentsValidate() {
                if (document.getElementById('edit_currency_id').value == "") {
                    document.getElementById("edit_currency_id_error").innerHTML = "Please select your currency";
                    update_error++
                }

                if (document.getElementById('edit_buy').value == "") {
                    document.getElementById("edit_buy_error").innerHTML = "Please type buy amount";
                    update_error++
                }

                if (document.getElementById('edit_sell').value == "") {
                    document.getElementById("edit_sell_error").innerHTML = "Please type sell amount";
                    update_error++
                }
            }

            function update_reset_error() {
                update_error = 0
                document.getElementById("edit_currency_id_error").innerHTML = "";
                document.getElementById("edit_buy_error").innerHTML = "";
                document.getElementById("edit_sell_error").innerHTML = "";
            }
        document.getElementById('updateMarketSentiments').addEventListener('click', function() {
            
                update_reset_error()
                updateMarketSentimentsValidate()

                var data = {
                    currency_id: document.getElementById('edit_currency_id').value,
                    buy: document.getElementById('edit_buy').value,
                    sell: document.getElementById('edit_sell').value,
                    status: document.getElementById('edit_status').value,
                }
                // initialize loading effect
                var height = parseInt(document.getElementById('editMarketSentimentsForm').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('edit-market-loading').setAttribute('style', loadingStyle)

                axios.post('/admin/market-sentiment/' + document.getElementById('marketSentimentId').value + '/update', data)
                    .then(response => {
                        console.log(response)
                        if (response.status === 200) {
                            $('.editMarketSentimentModal').modal('hide')
                            window.location.reload(true)

                            document.getElementById('edit-market-loading').setAttribute('style', 'display: none')
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('edit_success_message').innerHTML = ''
                            document.getElementById('edit_error_message').innerHTML = ''
                            document.getElementById("edit_success_message").appendChild(div)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        document.getElementById('edit-market-loading').setAttribute('style', 'display: none')
                        if(error.response.status === 422 && error.response.status === 500) {

                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-danger")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode('Market Sentiments unprocessing please try again')
                            div.appendChild(txt)

                            document.getElementById('edit_success_message').innerHTML = ''
                            document.getElementById('edit_error_message').innerHTML = ''
                            document.getElementById("edit_error_message").appendChild(div)

                            if(error.response.data.currency_id && error.response.data.currency_id.length > 0){
                                document.getElementById("edit_currency_id_error").innerHTML = error.response.data.currency_id[0]
                            }

                            if(error.response.data.buy && error.response.data.buy.length > 0){
                                document.getElementById("edit_buy_error").innerHTML = error.response.data.buy[0]
                            }

                            if(error.response.data.sell && error.response.data.sell.length > 0){
                                document.getElementById("edit_buy_error").innerHTML = error.response.data.sell[0]
                            }
                        }
                    })
        })
    </script>

    <script src="{{ asset('admin/vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/pluginjs/dataTables.tableTools.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/pluginjs/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/inputlimiter/js/jquery.inputlimiter.js') }}"></script>
    <script src="{{ asset('admin/vendors/chosen/js/chosen.jquery.min.js') }}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script src="{{ asset('admin/js/pages/datatable.js') }}"></script>
    <script src="{{ asset('admin/vendors/tooltipster/js/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/tipso/js/tipso.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/tooltips.js') }}"></script>
    <script  src=" {{ asset('admin/js/pages/widget3.js')}} "></script>
    <script  src="{{ asset('admin/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script  src="{{ asset('admin/vendors/swiper/js/swiper.min.js')}}"></script>

    <!--Date picker-->
    <script src="{{ asset('admin/vendors/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/j_timepicker/js/jquery.timepicker.min.js') }}"></script>

@endsection

@section('content')
    <div id="content" class="bg-container">
        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg col-sm-5 col-md-12 col-12">
                        <h4 class="nav_top_align">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </h4>
                    </div>
                    <div class="col-lg col-sm-7 col-md-12 col-12">
                        <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>

                            </li>
                            <li class="breadcrumb-item active">
                                <i class="fa fa-file-text"></i>
                                Market Sentiments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="outer" id="app">
            <div class="inner bg-container">
                <div class="row">
                    <div class="col-12 data_tables">
                        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                        @if(Session::get('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                        <div class="row">
                            <div class="col-md-12 text-center" id="success_message"></div>
                            <div class="col-md-12 text-center" id="error_message"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center" id="edit_success_message"></div>
                            <div class="col-md-12 text-center" id="edit_error_message"></div>
                        </div>
                        <div class="card">
                            <div class="card-body p-t-25">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
                                            <button type="button" data-toggle="modal" data-target=".addMarketSentimentsModal" class="btn btn-success pull-right add_market_sentiments" title="Add market sentiments">
                                                Add Market Sentiments
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="pull-sm-right">
                                        <div class="tools pull-sm-right"></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>SL</th>
                                            <th>Currency</th>
                                            <th>Buy</th>
                                            <th>Sell</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($market_sentiment as $key => $sentiment)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    @php
                                                    $icon = $sentiment->currency->icon;
                                                    $icon_arr = explode('-',$icon);
                                                    @endphp
                                                    @foreach($icon_arr as $key => $currency_icon)
                                                        <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-{{ $currency_icon }}"></span>
                                                    @endforeach
                                                    {{ $sentiment->currency->name }}
                                                </td>
                                                <td>{{ $sentiment->buy }} %</td>
                                                <td>{{ $sentiment->sell }} %</td>
                                                <td style="text-align:center" width="20%">
                                                    @if ($sentiment->status === 1)
                                                        <span class="badge badge-{{ $sentiment->status }}">active</span>
                                                    @else
                                                        <span class="badge badge-{{ $sentiment->status }}">pending</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center" width="20%">
                                                    <a href="{{ url('admin/market-sentiment/edit') }}" onclick="event.preventDefault(); editMarketSentiment(this)" data-toggle="modal" data-target=".editMarketSentimentModal" data-id="{!! $sentiment->id !!}" class="btn btn-warning edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @if ($sentiment->status === 0)
                                                        <a href="{{ url('admin/market-sentiment/' . $sentiment->id . '/active') }}" data-background="#00bf86" data-tipso="Click to activate" data-position="bottom" class="btn btn-success tipso m-t-20"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('active-form-{{ $sentiment->id }}').submit();">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <form id="active-form-{{ $sentiment->id }}" action="{{ url('admin/market-sentiment/' . $sentiment->id . '/active') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @else
                                                        <a href="{{ url('admin/market-sentiment/' . $sentiment->id . '/pending') }}" data-background="#727b84" data-tipso="Click to pending" data-position="bottom" class="btn btn-secondary tipso m-t-20"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('active-form-{{ $sentiment->id }}').submit();">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <form id="active-form-{{ $sentiment->id }}" action="{{ url('admin/market-sentiment/' . $sentiment->id . '/pending') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endif
                                                    <a href="{{ url('admin/market-sentiment/' . $sentiment->id . '/delete') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                            onclick="event.preventDefault();
                                                            if (confirm('Are You sure you want to delete this!')) {
                                                                document.getElementById('delete-form-{{ $sentiment->id }}').submit();
                                                            }">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $sentiment->id }}" action="{{ url('admin/market-sentiment/' . $sentiment->id . '/delete') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Inner --}}
        </div>
    </div>

    @include('admin.market_sentiments.partials.add_market_sentiments')
    @include('admin.market_sentiments.partials.edit_market_sentiments')
@endsection