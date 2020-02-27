@extends('admin.layouts.default')

@section('title', 'Category')

@section('category-active', 'active')

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
<style>
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
    .cursor-pointer {
        cursor: pointer;
    }

    .add_category{
        margin-right: 688px
    }

    .alert_msg{
        margin-left: 20px;
        margin-right: 20px;
    }

    .error{
        color: red;
    }
    </style>

@endsection


@section('footer_scripts')
    <script>
        document.getElementById('service').addEventListener('change', function () {
            let service = this.value;
            opt = '';
            axios.get('/admin/category/service', {params: {'service' : service}})
                .then(response => {
                    console.log(response)
                    opt += "<option value=''>Select a category</option>";
                    for (var i = 0; i <= response.data.length - 1; i++){
                        opt += "<option value='"+ response.data[i].id +"'>"+ response.data[i].name +"</option>";
                    }
                    $("#parent_id").html(opt);
                })
                .catch(error => {
                    console.log(error)
                })
        })
    </script>


<script>
    /*Save category*/
    var error = 0;

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

        // initialize loading effect
        var height = parseInt(document.getElementById('categoryForm').offsetHeight)

        var padding = (height - 40) / 2

        var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

        document.getElementById('category-loading').setAttribute('style', loadingStyle)

        // console.log(data)
        axios.post('/admin/category', data)
        .then(function (response) {
            // console.log(response)
                if(response.status === 201){
                    $('.addCategoryModal').modal('hide');
                    window.location.reload()

                    document.getElementById('category-loading').setAttribute('style', 'display: none')
                    let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-success")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Category has been successfully inserted')
                    div.appendChild(txt)

                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("success_message").appendChild(div)
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

    $(document).ready(function() {

        /*Data table*/
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
                    <button type="button" data-toggle="modal" data-target=".addCategoryModal" class="btn btn-success pull-right add_category" title="Add category">
                        Add Category
                    </button>
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
                            Category
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header><br>


    <div id="content" class="bg-container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center" id="success_message"></div>
                    <div class="col-md-12 text-center" id="error_message"></div>
                </div>
                @if(Session::get('message'))
                    <p class="alert alert-success alert_msg">{{Session::get('message')}}</p>
                @endif
            </div>
        </div>
        <div class="outer">
            <div class="inner bg-container">
                <div class="row sales_section">
                    @foreach ($counts as $key => $count)
                        <div class="col-md-3 media_max_573 cursor-pointer" onclick="location.href = `{{ url('admin/category/' . strtolower(str_replace('App\\', '', $key))) }}`">
                            <div class="card p-d-15">
                                <div class="sales_icons">
                                    <span class="bg-danger"></span>
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <div>
                                    <h5 class="sales_orders text-right m-t-5">{{ strtolower(str_replace('App\\', '', $key)) }}</h5>
                                    <h1 class="sales_number m-t-15 text-right">{{ $count }}</h1>
                                    <a href="#">
                                        <b class="sales_text">Total {{ strtolower(str_replace('App\\', '', $key)) }}: {{ $count }} </b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    @include('admin.category.partial.add_category')

@endsection
