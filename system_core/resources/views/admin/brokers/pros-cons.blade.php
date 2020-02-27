@extends('admin.layouts.default')

@section('title', 'Broker Pros and Cons')

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

    <script src="{{ asset('admin/vendors/tinymce/js/tinymce.min.js') }}"></script>

    

    <script>
        var editor_config = {

            path_absolute : "/",

            selector: "textarea.prosConsEditor",

            plugins: [

                "advlist autolink lists link image charmap print preview hr anchor pagebreak",

                "searchreplace wordcount visualblocks visualchars code fullscreen",

                "insertdatetime media nonbreaking save table contextmenu directionality",

                "emoticons template paste textcolor colorpicker textpattern"

            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

            relative_urls: false,

            file_browser_callback : function(field_name, url, type, win) {

                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;

                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;



                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;

                if (type == 'image') {

                    cmsURL = cmsURL + "&type=Images";

                } else {

                    cmsURL = cmsURL + "&type=Files";

                }



                tinyMCE.activeEditor.windowManager.open({

                    file : cmsURL,

                    title : 'Filemanager',

                    width : x * 0.8,

                    height : y * 0.8,

                    resizable : "yes",

                    close_previous : "no"

                });

            }

        };

        tinymce.init(editor_config);
    </script>

<script>

    var error = 0;

    function prosConsValidation() {
        if (tinymce.get("pros").getContent() == "") {
            document.getElementById('error_pros').innerHTML = 'Pros field is required';
            error++
        }

        if (tinymce.get("cons").getContent() == "") {
            document.getElementById('error_cons').innerHTML = 'Cons field is required';
            error++
        }
    }

    function pros_cons_error_reset() {
        error = 0
        document.getElementById('error_pros').innerHTML = '';
        document.getElementById('error_cons').innerHTML = '';
    }
    
    document.getElementById('addProsCons').addEventListener('click', function() {
        pros_cons_error_reset()
        prosConsValidation()

        var data = {
            pros: tinymce.get("pros").getContent(),
            cons: tinymce.get("cons").getContent()
        }

        if (error === 0) {
            axios.post('/admin/broker/' + {{$broker->id}} + '/pros-cons', data )
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

                    tinymce.get("pros").setContent('')
                    tinymce.get("cons").setContent('')
                }
            })    
            .catch(error => {
                if (error.response.status === 422) {

                    let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-danger")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Something is wrong. please try again, Your data is unprocessing')
                    div.appendChild(txt)

                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("error_message").appendChild(div)

                    if (error.response.data.pros && error.response.data.pros.length > 0) {
                        document.getElementById('error_pros').innerHTML = error.response.data.pros[0]
                    }

                    if (error.response.data.cons && error.response.data.cons.length > 0) {
                        document.getElementById('error_cons').innerHTML = error.response.data.cons[0]
                    }

                }
            })
        }
        
    });
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
                            {{ $broker->name }} &nbsp;pros-cons
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
                    <div class="col-md-12 text-center" id="success_message"></div>
                    <div class="col-md-12 text-center" id="error_message"></div>
                </div>
                <form method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label" style="font-size: 24px;">Pros</label>
                                        <textarea type="text" class="form-control prosConsEditor" name="pros" id="pros" style="height:200px;">{{ $broker->pros }}</textarea>
                                        <small class="help-block error" id="error_pros" style="color:red"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label" style="font-size: 24px;">Cons</label>
                                        <textarea type="text" class="form-control prosConsEditor" name="cons" id="cons" style="height:200px;">{{ $broker->cons }}</textarea>
                                        <small class="help-block error" id="error_cons" style="color:red"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-block btn-primary" id="addProsCons" name="pros_cons_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection