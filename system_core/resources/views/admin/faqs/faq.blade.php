@extends('admin.layouts.default')

@section('title', 'FAQ')

@section('faq-active', 'active')

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
    </style>
@endsection

@section('footer_scripts')
    <script>
        var error = 0;
        //Add faq
        function validate() {
            if (document.getElementById('service').value == "") {
                document.getElementById("service_error").innerHTML = 'Please Select Your Service name';
                error++
            }

            if (document.getElementById('question').value == "") {
                document.getElementById("question_error").innerHTML = 'Please Write Your Question';
                error++
            }

            if (tinymce.get("answer").getContent() == "") {
                document.getElementById("answer_error").innerHTML = 'Please Write Your Answer';
                error++
            }
        }

        function reset_error() {
            error = 0
            document.getElementById("service_error").innerHTML = "";
            document.getElementById("question_error").innerHTML = "";
            document.getElementById("answer_error").innerHTML = "";
        }

        document.getElementById('saveFaq').addEventListener('click', function () {
            reset_error()
            validate();

            var data = {
                service: document.getElementById('service').value,
                question: document.getElementById('question').value,
                answer: tinymce.get("answer").getContent(),
            }

            if (error === 0 ) {
                // initialize loading effect
                var height = parseInt(document.getElementById('faqForm').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('faq-loading').setAttribute('style', loadingStyle)

                axios.post('/admin/faq/save', data)
                .then(response => {
                    console.log(response)
                    if(response.status === 200){
                        document.getElementById('faq-loading').setAttribute('style', 'display: none')
                        $('.addFaqModal').modal('hide');
                        window.location.reload()
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Blog save successfully')
                        div.appendChild(txt)
                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)
                    }
                })
                .catch(error => {
                    document.getElementById('faq-loading').setAttribute('style', 'display: none')
                    let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-danger")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Something is wrong')
                    div.appendChild(txt)
                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("error_message").appendChild(div)
                    console.log(error)
                })
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
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script src="{{ asset('admin/js/pages/datatable.js') }}"></script>
    <script src="{{ asset('admin/vendors/tooltipster/js/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/tipso/js/tipso.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/tooltips.js') }}"></script>
    <script  src=" {{ asset('admin/js/pages/widget3.js')}} "></script>
    <script  src="{{ asset('admin/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script  src="{{ asset('admin/vendors/swiper/js/swiper.min.js')}}"></script>
    <script src="{{ asset('admin/vendors/tinymce/js/tinymce.min.js') }}"></script>

    <script>
        var editor_config = {

            path_absolute : "/",

            selector: "textarea.faqEditor",

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
@endsection

@section('content')
        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg col-sm-5 col-md-12 col-12">
                        <h4 class="nav_top_align">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </h4>
                        <button type="button" data-toggle="modal" data-target=".addFaqModal" class="btn btn-success" title="Add Faq">
                            Add Faq
                        </button>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                FAQ
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div id="content" class="bg-container">
            <div class="col-md-12 text-center"></div>
                <div class="outer">
                    <div class="inner bg-container">
                        <div class="row">
                            <div class="col-md-12 text-center" id="success_message"></div>
                            <div class="col-md-12 text-center" id="error_message"></div>
                        </div>
                        <div class="row sales_section">
                            @foreach ($counts as $key => $count)
                            <div class="col-sm-3 col-3 media_max_573 cursor-pointer" onclick="location.href = `{{ url('admin/faq/'.strtolower($key)) }}`">
                                <div class="card p-d-15">
                                    <div class="sales_icons">
                                        <span class="bg-danger"></span>
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <div>
                                        <h5 class="sales_orders text-right m-t-5">{{ $key }}</h5>
                                        <h1 class="sales_number m-t-15 text-right">{{ $count }}</h1>
                                        <a href="#">
                                            <b class="sales_text">Total {{ $key }}: {{ $count }} </b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <!--Faq Add and Edid Modal-->
    @include('admin.faqs.add_faq')
    @include('admin.faqs.edit_faq')
@endsection

