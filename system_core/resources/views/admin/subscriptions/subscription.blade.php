@extends('admin.layouts.default')
@section('title')
    Subscriptions
@endsection

@section('header_styles')
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
    <link rel="stylesheet" href="{{ asset('admin/vendors/radio_css/css/radiobox.min.css') }}" />

    <!-- Date time picker-->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/datetimepicker/css/DateTimePicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/j_timepicker/css/jquery.timepicker.css') }}"/>
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/radio_checkbox.css') }}" />
    <style>
        .trash { margin-right: 10px; }
        .text-primary {
            margin-top: 9px;
            margin-left: 10px;
            color: #212529 !important;
        }

        .badge-active { background: #00bf86 }
        .badge-inactive { background: #727b84 }
        .badge-publish { background: #00c0ef }
        .badge-editing {  }
        .badge-trash { background: #ff8086 }
        .x-90 {
            transform: rotate(-90deg);
            letter-spacing: 2px;
            text-transform: capitalize;
            border-radius: 4px;
        }

        .error{
            color: red;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/css/lib/flag-icon.min.css') }}">
@endsection

@section('footer_scripts')
    <script>
        
        $(document).ready(function() {

            $(".showBalance").click(function() {
                let balance = jQuery.parseJSON($(this).attr('data-balance'));
                $("#balance").html(balance.balance);
                $("#restricted").html(balance.restricted);
                $("#inreview").html(balance.inreview);
                $("#pending").html(balance.pending);
            });

            $(".showSubscriptionTransaction").click(function() {
                let transaction = jQuery.parseJSON($(this).attr('data-transaction'));
                console.log(transaction)
                $("#subscription_transaction_date").html(transaction.created_at);
                $("#subscription_transaction").html(transaction.action);
                $("#subscription_transaction_invoice").html(transaction.invoice);
                $("#subscription_transaction_amount").html(transaction.amount+"<i class=\"fa fa-usd\"></i>");
                $("#subscription_transaction_balance").html(transaction.balance+"<i class=\"fa fa-usd\"></i>");
            
                let msg = transaction.action + " by " + transaction.type + " transaction of \"" + transaction.balance_type + "\" " + transaction.amount + "<i class=\"fa fa-usd\"></i>" + " with forwarding balance " + transaction.balance + "<i class=\"fa fa-usd\"></i>"

                $("#subscription_transaction_message").html(msg);
                              
            });

            /*Data table*/
            $('.data_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'print'
                ]
            });

            $('.dp2').datepicker({
                todayHighlight: true,
                autoclose: true,
                orientation:"bottom"
            });
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
    <script src="{{ asset('admin/js/pages/radio_checkbox.js') }}"></script>
    <script src="{{ asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js') }}"></script>
    <!--Date picker-->

    <script src="{{ asset('admin/vendors/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/j_timepicker/js/jquery.timepicker.min.js') }}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script src="{{ asset('admin/js/pages/datatable.js') }}"></script>
    <script src="{{ asset('admin/vendors/tooltipster/js/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/tipso/js/tipso.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/tooltips.js') }}"></script>
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
                                <a href="{{ url('admin/subscriptions') }}"><i class="fa fa-file-text"></i> Subscriptions</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <i class="fa fa-th-list"></i>
                                @php
                                    $parameters = \Request::segment(3);
                                @endphp
                                {{ ucfirst($parameters) }}
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
                        @if(Session::has('warning'))
                            <p class="alert alert-warning alert_msg">{{Session::get('warning')}}</p>
                        @endif
                        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                        @if(Session::get('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                        <div class="card">
                            <div class="card-header bg-white">
                                @php
                                    $parameters = \Request::segment(3);
                                @endphp
                                <i class="fa fa-table"></i> Subscriptions of {{ ucfirst($parameters) }}
                            </div>

                            <div class="card-body p-t-25">
                                <div class="">
                                    <div class="pull-sm-right">
                                        <div class="tools pull-sm-right"></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>SL</th>
                                            <th>Plan</th>
                                            <th>Payment</th>
                                            <th>Subscription</th>
                                            <th>Member</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscriptions  as $key => $subscription)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    <b>Name: </b>{{ $subscription->plan->name }} <br />
                                                    <b>Duration: </b>{{ $subscription->plan->duration }} <br />
                                                    <b>Price: </b>{{ $subscription->plan->service === 'App\FundManagement' ? $subscription->plan->details[0]['value'] : $subscription->plan->price }}
                                                </td>
                                                <td>
                                                    <b>Method: </b>{{ $subscription->payment_method }} <br />
                                                    <b>Status: </b>{{ $subscription->status }} <br />
                                                    @if($subscription->transaction)
                                                    <b>Investment: </b>{{ $subscription->transaction->amount }} <br />
                                                    @endif
                                                </td>
                                                <td>
                                                    <b>Start: </b>{{ $subscription->start_at }} <br />
                                                    <b>End: </b>{{ $subscription->ends_at }} <br />
                                                    @if($subscription->status === 'Active')
                                                        <button 
                                                        class="btn btn-raised btn-primary md-trigger adv_cust_mod_btn showSubscriptionTransaction" 
                                                        data-toggle="modal" 
                                                        data-target="#transactionModal" 
                                                        data-transaction="{{ $subscription->transaction }}">Transaction</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{ $subscription->member->first_name }} {{ $subscription->member->last_name }} <br />
                                                    <b>Email: </b> {{ $subscription->member->email }} <br />
                                                    <button 
                                                        class="btn btn-raised btn-info md-trigger adv_cust_mod_btn showBalance" 
                                                        data-toggle="modal" 
                                                        data-target="#balanceModal" 
                                                        data-balance="{{ $subscription->member->account }}">Balance: {{ $subscription->member->account->balance }} <i class="fa fa-usd"></i></button>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <button class="btn btn-primary">Wallet</button>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-success">Activate</button>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-danger">Suspend</button>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-info">Cancel</button>
                                                        </li>
                                                    </ul>
                                                   
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
        </div>
    </div>

    <div class="modal fade" id="balanceModal" role="dialog" aria-labelledby="balanceInfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white" id="balanceInfo">Balance Information</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive m-t-35">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>Balance</th>
                                    <th>Restricted</th>
                                    <th>Inreview</th>
                                    <th>Pending</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="balance"></td>
                                    <td id="restricted"></td>
                                    <td id="inreview"></td>
                                    <td id="pending"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn  btn-info" data-dismiss="modal">Close me!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="transactionModal" role="dialog" aria-labelledby="transactionInfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="transactionInfo">Transaction Information</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive m-t-35">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="subscription_transaction_date"></td>
                                    <td id="subscription_transaction"></td>
                                    <td id="subscription_transaction_invoice"></td>
                                    <td id="subscription_transaction_amount"></td>
                                    <td id="subscription_transaction_balance"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" id="subscription_transaction_message"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Close me!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
