@extends('admin.layouts.default')

@section('title', 'Category')

@section('category-active', 'active')

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
        document.getElementById('service').addEventListener('change', function () {
            let service = this.value;
            opt = '';
            axios.get('/admin/category/service', {params: {'service' : service}})
                .then(response => {
                    console.log(response)
                    opt += "<option value=''>Select a SubCategory</option>";
                    for (var i = 0; i <= response.data.length - 1; i++){
                        opt += "<option value='"+ response.data[i].id +"'>"+ response.data[i].name +"</option>";
                    }
                    $("#parent_id").html(opt);
                })
                .catch(error => {
                    console.log(error)
                })
        })
        /*Add category*/

        function validate() {
        if (document.getElementById('service').value == "") {
            document.getElementById("service_error").innerHTML = "Please select your service";
            error++
        }

        if (document.getElementById('name').value == "") {
            document.getElementById("name_error").innerHTML = "Please type category name";
            error++
        }
    }

        function reset_error() {
            error = 0
            document.getElementById("service_error").innerHTML = "";
            document.getElementById("name_error").innerHTML = "";
        }

        document.getElementById('saveCategory').addEventListener('click', function(e){
        reset_error()
        validate()

        var data = {
            service: document.getElementById('service').value,
            name: document.getElementById('name').value,
            parent_id: document.getElementById('parent_id').value,
        }

        // console.log(data)
        axios.post('/admin/category', data)
        .then(function (response) {
            // console.log(response)
                if(response.status === 201){
                    $('.addCategoryModal').modal('hide');
                    window.location.reload()
                }
        })
        .catch(function (error) {
                console.log(error);
                if(error.response.status === 422) {

                    if(error.response.data.service && error.response.data.service.length > 0){
                        document.getElementById("service_error").innerHTML = error.response.data.service[0]
                    }

                    if(error.response.data.name && error.response.data.name.length > 0){
                        document.getElementById("name_error").innerHTML = error.response.data.name[0]
                    }
                }
            });
        })

        /*Edit category*/
        var error = 0;

        function edit_validate() {
            if (document.getElementById('edit_service').value == "") {
                document.getElementById("edit_service_error").innerHTML = "Please select your service";
                error++
            }

            if (document.getElementById('edit_name').value == "") {
                document.getElementById("edit_date_error").innerHTML = "Please select your date";
                error++
            }
        }

        function edit_reset_error() {
            error = 0
            document.getElementById("edit_service_error").innerHTML = "";
            document.getElementById("edit_name_error").innerHTML = "";
        }

        document.getElementById('edit_service').addEventListener('change', function () {
            let service_edit = this.value;
            opt = '';
            axios.get('/admin/category/service', {params: {'service' : service_edit}})
                .then(response => {
                    console.log(response)
                    opt += "<option>Select a category</option>";
                    for (var i = 0; i <= response.data.length - 1; i++){
                        opt += "<option value='"+ response.data[i].id +"'>"+ response.data[i].name +"</option>";
                    }
                    $("#edit_parent_id").html(opt);
                })
                .catch(error => {
                    console.log(error)
                })
        })

        /*Edit category*/
        function editCategory(el) {
            // console.log(el)
            axios.get('/admin/category/edit/'+el.getAttribute('data-id'))
                .then(function (response) {
                    console.log(response)
                    document.getElementById('categoryId').value = el.getAttribute('data-id')
                    document.getElementById("edit_service").value = response.data.service
                    document.getElementById("edit_name").value = response.data.name
                    document.getElementById("edit_parent_id").value = response.data.parent_id
                })
                .catch(function (error) {
                    console.log(error)
        })

        /*Update category*/

        document.getElementById('updateCategory').addEventListener('click', function() {
            edit_reset_error()
            edit_validate()

            var data = {
                service: document.getElementById('edit_service').value,
                parent_id: document.getElementById('edit_parent_id').value,
                name: document.getElementById('edit_name').value,
            }

            // initialize loading effect
            var height = parseInt(document.getElementById('editCategoryForm').offsetHeight)

            var padding = (height - 40) / 2

            var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

            document.getElementById('edit-category-loading').setAttribute('style', loadingStyle)

            // console.log(data)
            axios.post('/admin/category/' + document.getElementById('categoryId').value + '/update', data)
                .then(function (response) {
                    // console.log(response)
                    if(response.status === 200){
                        $('.editCategoryModal').modal('hide');
                        window.location.reload()

                        document.getElementById('edit-category-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Category has been successfully updated')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)
                    }
                })

                .catch(function (error) {
                    document.getElementById('edit-category-loading').setAttribute('style', 'display: none')
                    let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-danger")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Something is wrong, please try again')
                    div.appendChild(txt)

                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("error_message").appendChild(div)
                    console.log(error);
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
                                <a href="{{ url('admin/categories') }}"><i class="fa fa-file-text"></i> Category</a>
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
                        <div class="row">
                            <div class="col-md-12 text-center" id="success_message"></div>
                            <div class="col-md-12 text-center" id="error_message"></div>
                        </div>
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
                                <i class="fa fa-table"></i> Categories of {{ ucfirst($parameters) }}
{{--                                <button type="button" data-toggle="modal" data-target=".addCategoryModal" class="btn btn-success pull-right add_category" title="Add category">--}}
{{--                                    Add Category--}}
{{--                                </button>--}}

                                <a href="{{ url('admin/category/'.$parameters.'/trash') }}" class="btn btn-danger pull-right trash" title="Trash List">Trash List</a>
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
                                            <th>Category Name</th>
                                            <th>Slug</th>
                                            <th>Parent Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories  as $key => $category)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->parent ? $category->parent->name : 'No Parent Category' }}</td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target=".editCategoryModal" class="edit btn btn-dark btn-sm" title="Edit Category" onclick="editCategory(this)" data-id="{{ $category->id }}">
                                                        Edit
                                                    </button>

                                                    <a href="{{ url('/admin/category/'.$category->id.'/delete') }}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                                    if (confirm('Are you sure move to trash this category ?')) {
                                                        document.getElementById('trash-form-{{ $category->id }}').submit();
                                                    }">
                                                        Trash
                                                    </a>

                                                    <form id="trash-form-{{ $category->id }}" action="{{ url('/admin/category/'.$category->id.'/delete') }}" method="POST" style="display: none;">
                                                        @csrf
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

    @include('admin.category.partial.add_category')
    @include('admin.category.partial.edit_category')

@endsection
