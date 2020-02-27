@extends('admin.layouts.default')

@section('title')
    currencys
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
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
    <style>
        .trash{
            margin-right: 10px;
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
    </style>
    <link rel="stylesheet" href="{{ asset('/css/lib/flag-icon.min.css') }}">
@endsection

@section('footer_scripts')
    <script>
        /*Save currency*/
        document.getElementById('saveCurrency').addEventListener('click', function(){
            var data = {
                name: document.getElementById('name').value,
                icon: document.getElementById('icon').value
            }
            //console.log(data)
            axios.post('/admin/currency', data)
            .then(function (response) {
                $('.addcurrencyModal').modal('hide');
                window.location.reload()
            })

           .catch(function (error) {
                //console.log(error);
                if(error.response.status === 422){
                    if(error.response.data.name && error.response.data.name[0])
                    document.getElementById("currencyValidation").innerHTML = "Please give your currency name...";
                }
            });
        })


        /*Edit currency*/
        function editCurrency(el)
        {
            axios.get('/admin/currency/edit/'+el.getAttribute('data-id'))
            .then(function (response) {
                document.getElementById('currencyId').value = el.getAttribute('data-id')
                document.getElementById('edit-name').value = response.data.name,
                document.getElementById('edit-icon').value = response.data.icon
            })

        .catch(function (error) {
                //console.log(error);
                if(error.response.status === 422){
                    if(error.response.data.name && error.response.data.name[0])
                    document.getElementById("currencyValidation").innerHTML = "Please give your currency name...";
                }
            });
        }

        /*Update currency*/
        document.getElementById('updateCurrency').addEventListener('click', function(){
            var data = {
                id:   document.getElementById('currencyId').value,
                name: document.getElementById('edit-name').value,
                icon: document.getElementById('edit-icon').value
            }
            //console.log(data)
            axios.post('/admin/currency/update', data)
            .then(function (response) {
                $('.editCurrencyModal').modal('hide');
                window.location.reload()
            })

           .catch(function (error) {
                //console.log(error);
                if(error.response.status === 422){
                    if(error.response.data.name && error.response.data.name[0])
                    document.getElementById("currencyValidation").innerHTML = "Please give your currency name...";
                }
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
                                <a href="{{ url('/admin/currencies') }}">
                                    <i class="fa fa-usd"></i>
                                    Currency List
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <i class="fa fa-trash"></i>
                                Currency Trash
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
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i>  Trash Currency Table
                                <a href="{{ url('/admin/currencies') }}" class="btn btn-primary pull-right">
                                    Back to Currency List
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
                                            <th>Currency name</th>
                                            <th>Currency icon</th>
                                            {{-- <th>Currency image</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($trash_currency as $key=> $currency)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    {{ $currency->name }}
                                                </td>
                                                <td>
                                                    <?php
                                                        $icon = $currency->icon;
                                                        $icon_arr = explode('-',$icon);
                                                        foreach($icon_arr as $key => $single_icon){
                                                    ?>
                                                        <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-<?= $single_icon ?>"></span>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td style="text-align:center">

                                                    <a href="{{ url('admin/currency/' . $currency->id . '/destroy') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                        onclick="event.preventDefault();
                                                        if (confirm('Are You sure you want to premanently delete this!')) {
                                                            document.getElementById('delete-form-{{ $currency->id }}').submit();
                                                        }">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $currency->id }}" action="{{ url('admin/currency/' . $currency->id . '/destroy') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="{{ url('admin/currency/'.$currency->id.'/restore') }}" class="btn btn-raised btn-warning" id="{{$currency->id}}">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                                    <form method="get" action="{{ url('admin/currency/'.$currency->id.'/restore') }}" style="display: none">
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
            <!-- /.inner -->
        </div>
    </div>

    <script>
        /*Change currency*/
            $("#currency").on('change', function () {
                var currency = $("#currency").val();
                var opt = "";
                $.ajax({
                    url:"{{ url('/admin/sub-currency') }}/" + currency,
                    success:function (response) {
                        opt += "<option></option>";
                        for (var i = 0; i <= response.length - 1; i++){
                            opt += "<option value='"+ response[i].id +"'>"+ response[i].name +"</option>";
                        }
                        $("#subcurrency").html(opt);
                    }
                });
            });

            //ajax currency editing script

            $(document).on('click', '.edit', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = $(this).attr('href')

                $.ajax({
                    url:url,
                    data:{id:id},
                    type:"GET",
                    dataType:"JSON",
                    success(response){
                        $("#updatecurrencyModal").modal("show");
                        $("#etitle").val(response.title);
                        $("#ebody").val(response.body);
                        $("#currencyId").val(response.id);

                        if (response.currency.parent.parent_id) {
                            // sub currency
                            // select currency
                            $("#ecurrency").val(response.currency.parent.parent_id);

                            // fetch sub currency
                            var opt = "";
                            $.ajax({
                                url:"{{ url('/admin/sub-currency') }}/" + response.currency.parent.parent_id,
                                success:function (res) {
                                    opt += "<option>Select Sub currency</option>";
                                    for (var i = 0; i <= res.length - 1; i++){
                                        opt += "<option value='"+ res[i].id +"'>"+ res[i].name +"</option>";
                                    }
                                    $("#esubcurrency").html(opt);

                                    // select subcurrency
                                    $("#esubcurrency").val(response.currency.id)
                                }
                            });

                        } else {
                            // currency selected
                            $("#ecurrency").val(response.currency.id);

                            // fetch sub currency
                            var opt = "";
                            $.ajax({
                                url:"{{ url('/admin/sub-currency') }}/" + response.currency.id,
                                success:function (response) {
                                    opt += "<option>Select Sub currency</option>";
                                    for (var i = 0; i <= response.length - 1; i++){
                                        opt += "<option value='"+ response[i].id +"'>"+ response[i].name +"</option>";
                                    }
                                    $("#esubcurrency").html(opt);
                                }
                            });

                        }

                    }
                });
            });

            //currency update work

            $(".updatecurrencyModal").on("submit", function (e){
                e.preventDefault();
                var form = $(this);
                var url = form.attr("action");
                var type = form.attr("method");
                var data = form.serialize();


                $.ajax({
                    url:url,
                    type:type,
                    data:data,
                    dataType: "JSON",
                    success(response){
                        $("#updatecurrencyModal").modal("hide");
                        location.reload(true);
                    },

                });

            });
        });
    </script>
@endsection

