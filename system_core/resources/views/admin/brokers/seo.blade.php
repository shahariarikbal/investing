@extends('admin.layouts.default')

@section('title', 'Broker SEO')

@section('broker-container-active', 'active')
@section('broker-show', 'show')
@section('broker-active', 'active')

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

    <!--Plugin styles-->
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-switch/css/bootstrap-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/switchery/css/switchery.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/radio_checkbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/radio_css/css/radiobox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/checkbox_css/css/checkbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/multiselect/css/multi-select.css') }}"/>
    <!--Page level styles-->
    <link rel="stylesheet" href="css/pages/form_elements.css"/>
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
@endsection

@section('footer_scripts')
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
    <script  src="{{ asset('admin/js/pages/widget3.js')}}"></script>
    <script  src="{{ asset('admin/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script  src="{{ asset('admin/vendors/swiper/js/swiper.min.js')}}"></script>

    <!--Plugin scripts-->
    <script src="{{ asset('admin/vendors/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/switchery/js/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/radio_checkbox.js') }}"></script>
    <script src="{{ asset('admin/vendors/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/js/pages/form_elements.js') }}"></script>
    <!--End of plugin scripts-->

    <!--Page level scripts-->
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <!-- end page level scripts -->

    <!---Seo input script--->

    <script>
        var error = 0;

        function seoValidation() {
            if (document.getElementById('seo_title').value == "") {
                document.getElementById('error_title').innerHTML = 'Please input seo title field';
                error++
            }

            if (document.getElementById('keyword_title').value == "") {
                document.getElementById('error_keyword').innerHTML = 'Please input seo keyword field';
                error++
            }

            if (document.getElementById('description').value == "") {
                document.getElementById('error_description').innerHTML = 'Please input seo description field';
                error++
            }
        }

        function error_reset() {
            error = 0
            document.getElementById('error_title').innerHTML = '';
            document.getElementById('error_keyword').innerHTML = '';
            document.getElementById('error_description').innerHTML = '';
        }

        document.getElementById('seo_submit').addEventListener('click', function(e) {
            seoValidation()
            error_reset()

            var data = {
                title: document.getElementById('seo_title').value,
                keyword: document.getElementById('keyword_title').value,
                description: document.getElementById('description').value
            }

        

            // axios request for broker request
            if (error === 0) {
                axios.post('/admin/broker/' + {{$broker->id}} + '/seo', data)
                .then(response => {
                        if (response.status === 200) {
                            //alert('Data insert successfully')
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)

                            document.getElementById('seo_title').value = ''
                            document.getElementById('keyword_title').value = ''
                            document.getElementById('description').value = ''
                        }
                    })

                    .catch(error => {
                            //console.log(error)
                            if (error.response.status === 422) {

                                let div = document.createElement("div")
                                div.setAttribute("class", "alert alert-danger")
                                div.setAttribute("role", "alert")
                                let txt = document.createTextNode('Something is wrong. please try again, Your data is unprocessing')
                                div.appendChild(txt)

                                document.getElementById('success_message').innerHTML = ''
                                document.getElementById('error_message').innerHTML = ''
                                document.getElementById("error_message").appendChild(div)

                                if (error.response.data.title && error.response.data.title.length > 0) {
                                    document.getElementById('error_title').innerHTML = error.response.data.title[0]
                                }

                                if (error.response.data.keyword && error.response.data.keyword.length > 0) {
                                    document.getElementById('error_keyword').innerHTML = error.response.data.keyword[0]
                                }

                                if (error.response.data.description && error.response.data.description.length > 0) {
                                    document.getElementById('error_description').innerHTML = error.response.data.description[0]
                                }
                            }
                    })
            }
            
        })

    </script>
@endsection

@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg col-sm-5 col-md-12 col-12">
                    <h4 class="nav_top_align">
                        <a href="{{ url('dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </a>
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
                            <a href="{{url('/admin/manage/brokers')}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Broker List
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{url('/admin/broker/'.$broker->id.'/edit')}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Edit Broker
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Broker Seo
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center" id="success_message"></div>
                            <div class="col-md-12 text-center" id="error_message"></div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-success">
                                <h2 class="text-center" style="color:#ffffff">SEO Input</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" name="seo" class="form-horizontal">
                                    @csrf
                                   <div class="form-group">
                                        <label for="seo_title" class="col-form-label" style="font-size: 24px;">Seo Title</label>
                                        <input type="text" class="form-control" name="title" id="seo_title" value="{{ $seo ? $seo->title : '' }}" placeholder="Seo Title input here...">
                                        <small class="help-block error" id="error_title" style="color:red"></small>
                                   </div>

                                    <div class="form-group">
                                        <label for="keyword_title" class="col-form-label" style="font-size: 24px;">Seo Keyword</label>
                                        <input type="text" class="form-control" name="keyword" id="keyword_title" value="{{ $seo ? $seo->keyword : '' }}" placeholder="Seo keyword input here...">
                                        <small class="help-block error" id="error_keyword" style="color:red"></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-form-label" style="font-size: 24px;">Seo description</label>
                                        <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="Seo description input here...">{{ $seo ? $seo->description : '' }}</textarea>
                                        <small class="help-block error" id="error_description" style="color:red"></small>
                                    </div>
                                    <br/>
                                    <button type="button" class="btn btn-block btn-primary" name="seo_submit" id="seo_submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection