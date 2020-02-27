@extends('admin.layouts.default')
@section('title')
    Signals
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
        /*Save graph*/
        var error = 0;

        function validate() {
            if (document.getElementById('edit_service').value == "") {
                document.getElementById("edit_service_error").innerHTML = "Please select your service";
                error++
            }

            if (document.getElementById('edit_date').value == "") {
                document.getElementById("edit_date_error").innerHTML = "Please select your date";
                error++
            }

            if (document.getElementById('edit_value').value == "") {
                document.getElementById("edit_value_error").innerHTML = "Please type your value";
                error++
            }
        }

        function reset_error() {
            error = 0
            document.getElementById("edit_service_error").innerHTML = "";
            document.getElementById("edit_date_error").innerHTML = "";
            document.getElementById("edit_value_error").innerHTML = "";
        }

        
        //add performance graph

        document.getElementById('saveGraph').addEventListener('click', function(e){

            reset_error()
            validate()

            var data = {
                service: document.getElementById('service').value,
                date: document.getElementById('date').value,
                value: document.getElementById('value').value,
                member_id: document.getElementById('member_id').value,
                status: document.getElementById('status').value,
            }

            // initialize loading effect
            var height = parseInt(document.getElementById('performance-graph').offsetHeight)

            var padding = (height - 40) / 2

            var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

            document.getElementById('graph-loading').setAttribute('style', loadingStyle)

            if (document.querySelector("input[name='profit']:checked")) {
                data.profit = document.querySelector("input[name='profit']:checked").value
            }

            axios.post('/admin/graph', data)
                .then(function (response) {
                    document.getElementById('graph-loading').setAttribute('style', 'display: none')
                    if(response.status === 201){
                        //alert('Performance Graph add successfull');
                        $('.addGraphModal').modal('hide');
                        window.location.reload()
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode(response.data.message)
                        div.appendChild(txt)
                    }
                })
                .catch(function (error) {
                    // console.log(error);
                    document.getElementById('graph-loading').setAttribute('style', 'display: none')
                    if(error.response.status === 422) {

                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-danger")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Something is wrong, please try again')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("error_message").appendChild(div)

                        if(error.response.data.service && error.response.data.service.length > 0){
                            document.getElementById("service_error").innerHTML = error.response.data.service[0]
                        }

                        if(error.response.data.date && error.response.data.date.length > 0){
                            document.getElementById("date_error").innerHTML = error.response.data.date[0]
                        }

                        if(error.response.data.value && error.response.data.value.length > 0){
                            document.getElementById("value_error").innerHTML = error.response.data.value[0]
                        }
                    }
                });
        })

        /*Edit graph*/
        function edit_graph(el) {
            // console.log(el)
            axios.get('/admin/graph/edit/'+el.getAttribute('data-id'))
                .then(function (response) {
                    // console.log(response)
                    document.getElementById('graphId').value = el.getAttribute('data-id')
                    document.getElementById("edit_service").value = response.data.service
                    document.getElementById("edit_date").value = response.data.date
                    document.getElementById("edit_value").value = response.data.value.toFixed(2)
                    document.getElementById("edit_member_id").selectedIndex = response.data.member_id
                    document.getElementById("estatus").value = response.data.status

                    if(response.data.profit === 1) {
                        document.getElementById("edit_profit").setAttribute('checked', true)
                    }
                })

                // console.log(service)
                .catch(function (error) {
                    console.log(error)
        })

        /*Update graph*/

        document.getElementById('updateGraph').addEventListener('click', function() {
            reset_error()
            validate()

            var data = {
                service: document.getElementById('edit_service').value,
                date: document.getElementById('edit_date').value,
                value: document.getElementById('edit_value').value,
                member_id: document.getElementById('edit_member_id').value,
                status: document.getElementById('estatus').value,
            }

            // initialize loading effect
            var height = parseInt(document.getElementById('performance-graph').offsetHeight)

            var padding = (height - 40) / 2

            var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

            document.getElementById('graph-loading').setAttribute('style', loadingStyle)

            if (document.querySelector("input[name='profit']:checked")) {
                data.profit = document.querySelector("input[name='profit']:checked").value
            }

            console.log(data)
            axios.post('/admin/graph/' + document.getElementById('graphId').value + '/update', data)
                .then(function (response) {
                    // console.log(response)
                    document.getElementById('graph-loading').setAttribute('style', 'display: none')
                    if(response.status === 200){
                        $('.editGraphModal').modal('hide');
                        window.location.reload()
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

                .catch(function (error) {
                    console.log(error);
                        document.getElementById('graph-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Something is wrong, please try again')
                        div.appendChild(txt)
                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("error_message").appendChild(div)
            });

            })
        }
        $(document).ready(function() {

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

        /*profit checkbox functionality for edit_graph*/
        document.getElementById("edit_profit").addEventListener("click", function() {
            if (!this.checked) {
                document.getElementById("edit_value").value = "-" + document.getElementById("edit_value").value.replace('-', '')
            }
            else {
                document.getElementById("edit_value").value = document.getElementById("edit_value").value.replace('-', '')
            }
        })

        document.getElementById("edit_value").addEventListener("keyup", function() {
            if (this.value.search("-")) {
                document.getElementById("edit_profit").checked = true
            }
            else {
                document.getElementById("edit_profit").checked = false
            }
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
                                <a href="{{ url('/admin/graphs') }}">
                                    <i class="fa fa-file-text"></i>
                                    Performance
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                @php
                                    $parameters = \Request::segment(3);
                                    //dd($parameters);
                                @endphp
                            <i class="fa fa-file-text"></i>
                                   {{ ucfirst($parameters) }} List
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
                        <div class="card">
                            <div class="card-header bg-white">
                                @php
                                    $parameters = \Request::segment(3);
                                    //dd($parameters);
                                @endphp
                                <i class="fa fa-table"></i> Performance Graph of {{ ucfirst($parameters) }}
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
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Profit</th>
                                            <th>Value</th>
                                            <th>Member</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($graphs  as $key => $graph)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{ $graph->service }}</td>
                                                <td>{{ $graph->date }}</td>
                                                <td>{{ $graph->profit }}</td>
                                                <td>{{ $graph->value }}</td>
                                                @if(isset($graph->member->email))
                                                    <td>{{ $graph->member->email }}</td>
                                                @else
                                                    <td></td>
                                                @endif

                                                <td style="text-align: center">
                                                    <button type="button" data-toggle="modal" data-target=".editGraphModal" class="edit btn btn-dark tipso m-t-20" data-background="#728C00" data-tipso="Click to Edit" data-position="bottom" title="Edit Graph" onclick="edit_graph(this)" data-id="{{ $graph->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    @if($graph->status == 1)
                                                        <a href="{{ url('/admin/graph/'.$graph->id.'/active') }}" class="btn btn-success tipso m-t-20" data-background="#00c0ef" data-tipso="Click to Inactive" data-position="bottom">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ url('/admin/graph/'.$graph->id.'/inactive') }}" class="btn btn-warning tipso m-t-20" data-background="#00c0ef" data-tipso="Click to Active" data-position="bottom">
                                                            <i class="fa fa-star-o"></i>
                                                        </a>
                                                    @endif
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
    </div>
    @include('admin.performance_graph.partial.edit_graph')
    @include('admin.performance_graph.partial.add_graph')
    <script>
        var x = location.href
        var y = x.split('/')
        document.getElementById('target').innerHTML = y[y.length - 1]
    </script>
@endsection
