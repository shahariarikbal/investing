@extends('admin.layouts.default')
@section('title')
    shouts
@endsection

@section('shout-active', 'active')

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

        .trash_btn{
            margin-right: 10px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/css/lib/flag-icon.min.css') }}">
@endsection

@section('footer_scripts')
    <script>
        /*Save shout*/
        var error = 0;

        function validate() {
            if (document.getElementById('service').value == "") {
                document.getElementById("service_error").innerHTML = "Please select your service";
                error++
            }

            if (document.getElementById('title').value == "") {
                document.getElementById("title_error").innerHTML = "Please provide shout title";
                error++
            }

            if (document.getElementById('description').value == "") {
                document.getElementById("description_error").innerHTML = "Please provide shout description";
                error++
            }
        }

        function reset_error() {
            error = 0
            document.getElementById("service_error").innerHTML = "";
            document.getElementById("title_error").innerHTML = "";
            document.getElementById("description_error").innerHTML = "";
        }

        document.getElementById('saveShout').addEventListener('click', function(e){

            reset_error()
            validate()

            var data = {
                service: document.getElementById('service').value,
                title: document.getElementById('title').value,
                description: document.getElementById('description').value,
                member_id: document.getElementById('member_id').value,
            }

            // if (document.querySelector("input[name='status']:checked")) {
            //     data.status = document.querySelector("input[name='status']:checked").value
            // }

            if (error === 0 ) {
                // initialize loading effect
            var height = parseInt(document.getElementById('shoutForm').offsetHeight)

            var padding = (height - 40) / 2

            var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

            document.getElementById('shout-loading').setAttribute('style', loadingStyle)

            // console.log(data)
            axios.post('/admin/shout', data)
            .then(function (response) {
                // console.log(response)
                    if(response.status === 201){
                        //alert('Shout add successfull');
                        $('.addShoutModal').modal('hide');
                        window.location.reload()

                        document.getElementById('shout-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Shout has been successfully inserted')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)
                    }
            })
            .catch(function (error) {
                    // console.log(error);
                    document.getElementById('shout-loading').setAttribute('style', 'display: none')
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

                        if(error.response.data.title && error.response.data.title.length > 0){
                            document.getElementById("title_error").innerHTML = error.response.data.title[0]
                        }

                        if(error.response.data.description && error.response.data.description.length > 0){
                            document.getElementById("description_error").innerHTML = error.response.data.description[0]
                        }
                    }
                });
            }
        })

        /*Edit graph*/
        function edit_shout(el) {
            // console.log(el)
            axios.get('/admin/shout/edit/'+el.getAttribute('data-id'))
                .then(function (response) {
                    // console.log(response)
                    document.getElementById('shoutId').value = el.getAttribute('data-id')
                    document.getElementById("edit_service").value = response.data.service
                    document.getElementById("edit_title").value = response.data.title
                    document.getElementById("edit_description").value = response.data.description
                    document.getElementById("edit_member_id").value = response.data.member_id

                    // if(response.data.status === 1) {
                    //     document.getElementById("edit_status").setAttribute('checked', true)
                    // }
                })

                .catch(function (error) {
                    console.log(error)
        })
    }

        var edit_error = 0;

        function edit_validate() {
            if (document.getElementById('edit_service').value == "") {
                document.getElementById("edit_service_error").innerHTML = "Please select your service";
                edit_error++
            }

            if (document.getElementById('edit_title').value == "") {
                document.getElementById("edit_title_error").innerHTML = "Please provide shout title";
                edit_error++
            }

            if (document.getElementById('edit_description').value == "") {
                document.getElementById("edit_description_error").innerHTML = "Please provide shout description";
                edit_error++
            }
        }

        function edit_reset_error() {
            edit_error = 0
            document.getElementById("edit_service_error").innerHTML = "";
            document.getElementById("edit_title_error").innerHTML = "";
            document.getElementById("edit_description_error").innerHTML = "";
        }
        /*Update shout*/

        document.getElementById('updateShout').addEventListener('click', function() {
            edit_reset_error()
            edit_validate()

            var data = {
                service: document.getElementById('edit_service').value,
                title: document.getElementById('edit_title').value,
                description: document.getElementById('edit_description').value,
                member_id: document.getElementById('edit_member_id').value,
            }

            // if (document.querySelector("input[name='status']:checked")) {
            //     data.status = document.querySelector("input[name='status']:checked").value
            // }

                if (edit_error === 0 ) {
                    // initialize loading effect
                    var height = parseInt(document.getElementById('editShoutForm').offsetHeight)

                    var padding = (height - 40) / 2

                    var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                    document.getElementById('edit-shout-loading').setAttribute('style', loadingStyle)

                    // console.log(data)
                    axios.post('/admin/shout/' + document.getElementById('shoutId').value + '/update', data)
                        .then(function (response) {
                            // console.log(response)
                            if(response.status === 200){
                                //alert('Shout update successfull');
                                $('.editShoutModal').modal('hide');
                                window.location.reload()

                                document.getElementById('edit-shout-loading').setAttribute('style', 'display: none')
                                let div = document.createElement("div")
                                div.setAttribute("class", "alert alert-success")
                                div.setAttribute("role", "alert")
                                let txt = document.createTextNode('Shout has been successfully updated')
                                div.appendChild(txt)

                                document.getElementById('success_message').innerHTML = ''
                                document.getElementById('error_message').innerHTML = ''
                                document.getElementById("success_message").appendChild(div)
                            }
                        })

                        .catch(function (error) {
                            document.getElementById('edit-shout-loading').setAttribute('style', 'display: none')
                            console.log(error);
                            if (response.status === 422) {
                                let div = document.createElement("div")
                                div.setAttribute("class", "alert alert-danger")
                                div.setAttribute("role", "alert")
                                let txt = document.createTextNode('Something is wrong, please try again')
                                div.appendChild(txt)

                                document.getElementById('success_message').innerHTML = ''
                                document.getElementById('error_message').innerHTML = ''
                                document.getElementById("error_message").appendChild(div)
                            }
                            
                        });
                    }

            })

        /*Data table*/
        $(document).ready(function() {

            $('.data_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'print'
                ]
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
                                <i class="fa fa-file-text"></i>
                                Shout List
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
                        <div class="row">
                            <div class="col-md-12 text-center" id="success_message"></div>
                            <div class="col-md-12 text-center" id="error_message"></div>
                        </div>
                        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                        @if(Session::get('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i> Shout List
                                <button type="button" data-toggle="modal" data-target=".addShoutModal" class="btn btn-success pull-right" title="Add shouts">
                                    Add Shout
                                </button>

                                <a href="{{ url('admin/shout/trash') }}" class="btn btn-danger pull-right trash_btn" title="Trash list">
                                    Trash List
                                </a>
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
                                            <th>Title</th>
                                            <th>Member</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shouts  as $key => $shout)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $shout->service }}</td>
                                            <td>{{ $shout->title }}</td>

                                            @if(isset($shout->member->email))
                                                <td>{{ $shout->member->email }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $shout->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                @if($shout->status == 0)
                                                    <button type="button" data-toggle="modal" data-target=".editShoutModal" class="edit btn btn-dark btn-sm" title="Edit Shout" onclick="edit_shout(this)" data-id="{{ $shout->id }}">
                                                    Edit
                                                    </button>

                                                    <a href="{{ url('/admin/shout/'.$shout->id.'/delete') }}" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault();
                                                    if (confirm('Are you sure move to trash this shout ?')) {
                                                        document.getElementById('trash-form-{{ $shout->id }}').submit();
                                                    }">
                                                    Trash
                                                    </a>
                                                    <form id="trash-form-{{ $shout->id }}" action="{{ url('/admin/shout/'.$shout->id.'/delete') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endif

                                                @if($shout->status == false)
                                                    <a href="{{ url('/admin/shout/'.$shout->id.'/active') }}" class="btn btn-info btn-sm"
                                                    onclick="event.preventDefault();
                                                        if (confirm('Are you sure to active this shout ?')) {
                                                            document.getElementById('active-form-{{ $shout->id }}').submit();
                                                        }">
                                                    Active
                                                    </a>
                                                    <form id="active-form-{{ $shout->id }}" action="{{ url('/admin/shout/'.$shout->id.'/active') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endif

                                                @if($shout->status == true)
                                                    <a href="{{ url('/admin/shout/'.$shout->id.'/inactive') }}" class="btn btn-success btn-sm"
                                                    onclick="event.preventDefault();
                                                        if (confirm('Are you sure to inactive this shout ?')) {
                                                            document.getElementById('inactive-form-{{ $shout->id }}').submit();
                                                        }">
                                                    Inactive
                                                    </a>
                                                    <form id="inactive-form-{{ $shout->id }}" action="{{ url('/admin/shout/'.$shout->id.'/inactive') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
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

    @include('admin.shout.partial.add_shout')
    @include('admin.shout.partial.edit_shout')
@endsection
