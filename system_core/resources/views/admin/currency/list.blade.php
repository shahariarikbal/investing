@extends('admin.layouts.default')

@section('title', 'Currency')

@section('signal-container-active', 'active')
@section('signal-show', 'show')
@section('currency-active', 'active')

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
    <!--add currency preview image-->
    <script>
        function preview_logo(event)
        {
            var reader = new FileReader();
            reader.onload = function ()
            {
                var output = document.getElementById('prev');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <!--edit currency preview image-->
    <script>
        function edit_priv_image(event)
        {
            var reader = new FileReader();
            reader.onload = function ()
            {
                var output = document.getElementById('edit_prev');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        /*Save currency*/
        document.getElementById('saveCurrency').addEventListener('click', function(){
            let data = new FormData()
            if (document.getElementById('logo').files.length > 0 ) {
                let logo = document.getElementById('logo').files[0];
                data.append('logo', logo, logo.name);
            }
            data.append('name', document.getElementById('name').value)
            data.append('icon', document.getElementById('icon').value)

            let settings = { headers: { 'content-type': 'multipart/form-data' } }
            //console.log(data)

            // initialize loading effect
            var height = parseInt(document.getElementById('currencyForm').offsetHeight)

            var padding = (height - 40) / 2

            var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

            document.getElementById('currency-loading').setAttribute('style', loadingStyle)

            axios.post('/admin/currency', data, settings)
            .then(response => {
                //console.log(response)
                //alert('Currecy Successfully add');
                $('.addCurrencyModal').modal('hide');
                window.location.reload()

                document.getElementById('currency-loading').setAttribute('style', 'display: none')
                let div = document.createElement("div")
                div.setAttribute("class", "alert alert-success")
                div.setAttribute("role", "alert")
                let txt = document.createTextNode('Currency has been successfully inserted')
                div.appendChild(txt)

                document.getElementById('success_message').innerHTML = ''
                document.getElementById('error_message').innerHTML = ''
                document.getElementById("success_message").appendChild(div)
            })
           .catch((error) => {
                    //console.log(error);
                    document.getElementById('currency-loading').setAttribute('style', 'display: none')
                    if(error.response.status === 422){
                        let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-danger")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Something is wrong, please try again')
                    div.appendChild(txt)

                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("error_message").appendChild(div)
                    if(error.response.data.name && error.response.data.name[0])
                    document.getElementById("currencyValidation").innerHTML = "Please give your currency name...";
                }
            });
        })


        /*Edit Currency*/
        function editCurrency(el)
        {
            axios.get('/admin/currency/edit/'+el.getAttribute('data-id'))
                .then(function (response) {
                    console.log(response)
                    document.getElementById('currencyId').value = el.getAttribute('data-id');
                    document.getElementById('edit-name').value = response.data.name;
                    document.getElementById('edit-icon').value = response.data.icon;
                    if(response.data.logo) {
                        $("#edit_prev").attr("src", InvestingPartner.app_url + "/currency/images/" + response.data.logo)
                    }
                    else {
                        $("#edit_prev").attr("src", InvestingPartner.app_url + "/currency/images/default.jpg")
                    }

                })

                .catch(function (error) {
                    //console.log(error);
                    if(error.response.status === 422){
                        if(error.response.data.name && error.response.data.name[0])
                            document.getElementById("currencyValidation").innerHTML = "Please give your currency name...";
                    }
                });
        }

        /*Update Currency*/
        document.getElementById('updateCurrency').addEventListener('click', function(){
            let data = new FormData()
            //console.log(data);
            if (document.getElementById('edit-logo').files[0] !== undefined ) {
                let logo = document.getElementById('edit-logo').files[0];
                data.append('logo', logo, logo.name);
                //console.log(data.append('logo', logo, logo.name))
            }
            data.append('name', document.getElementById('edit-name').value)
            data.append('icon', document.getElementById('edit-icon').value)

            let settings = { headers: { 'content-type': 'multipart/form-data' } }
            //console.log(data)

            // initialize loading effect
            var height = parseInt(document.getElementById('editCurrencyForm').offsetHeight)

            var padding = (height - 40) / 2

            var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

            document.getElementById('edit-currency-loading').setAttribute('style', loadingStyle)

            axios.post('/admin/currency/' + document.getElementById('currencyId').value + '/update', data, settings)
            .then(function (response) {
                console.log(response)
                //alert('Currecy Successfully Update');
                $('.editCurrencyModal').modal('hide');
                window.location.reload()

                document.getElementById('edit-currency-loading').setAttribute('style', 'display: none')
                let div = document.createElement("div")
                div.setAttribute("class", "alert alert-success")
                div.setAttribute("role", "alert")
                let txt = document.createTextNode('Currency has been successfully updated')
                div.appendChild(txt)

                document.getElementById('success_message').innerHTML = ''
                document.getElementById('error_message').innerHTML = ''
                document.getElementById("success_message").appendChild(div)
            })

           .catch(function (error) {
                //console.log(error);
                document.getElementById('edit-currency-loading').setAttribute('style', 'display: none')
                if(error.response.status === 422){
                    let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-danger")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Something is wrong, please try again')
                    div.appendChild(txt)

                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("error_message").appendChild(div)

                    if(error.response.data.name && error.response.data.name[0])
                    document.getElementById("editCurrencyValidation").innerHTML = "Please give your currency name...";
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
                                <i class="fa fa-usd"></i>
                                Currency list
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
                        @if (session()->has('warning'))
                            <div class="alert alert-warning">
                                {!! session()->get('warning')!!}        
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i> Currency Table
                                <button type="button" data-toggle="modal" data-target=".addCurrencyModal" class="btn btn-success pull-right" title="Add currency">
                                    Add Currency
                                </button>

                                <a href="{{ url('/admin/trash/currency') }}" class="btn btn-danger pull-right" title="Trash List" style="margin-right: 8px;">
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
                                            <th>Currency name</th>
                                            <th>Currency icon</th>
                                            <th>Currency image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($currencies  as $key=> $currency)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                {{ $currency->name }}
                                            </td>
                                            <td>
                                                @php
                                                    $icon = $currency->icon;
                                                    $icon_arr = explode('-',$icon);
                                                @endphp
                                                @foreach($icon_arr as $key => $single_icon)
                                                    <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-{{ $single_icon }}"></span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($currency->logo)
                                                    <img src="{{ asset('/currency/images/'.$currency->logo) }}" style="height: 43px; width: 112px;" />
                                                @else
                                                    <img src="{{ asset('/analysis/images/default.jpg/') }}" style="height: 43px; width: 112px">
                                                @endif
                                            </td>
                                            <td style="text-align:center">

                                                <a href="{{ url('admin/currency/edit') }}" data-toggle="modal" data-target=".editCurrencyModal" data-id="{!! $currency->id !!}" class="btn btn-warning tipso m-t-20 edit" data-background="#ffa000" data-tipso="Click to edit" data-position="bottom" onclick="event.preventDefault(); editCurrency(this)">
                                                    <i class="fa fa-edit"></i>
                                                </a>


                                                <a href="{{ url('admin/currency/' . $currency->id . '/delete') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                        onclick="event.preventDefault();
                                                        if (confirm('Are You sure you want to delete this!')) {
                                                            document.getElementById('delete-form-{{ $currency->id }}').submit();
                                                        }">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $currency->id }}" action="{{ url('admin/currency/' . $currency->id . '/delete') }}" method="POST" style="display: none;">
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

{{--    Add currency Modal--}}
    @include('admin.currency.partial.add_currency')
{{--    End currency Modal--}}


{{--    Edit currency Modal--}}
    @include('admin.currency.partial.edit_currency')
{{--    End edit currency Modal --}}
@endsection
