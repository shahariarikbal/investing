@extends('admin.layouts.default')

@section('title')
    Faq
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
        .badge-active { background: #00bf86 }
        .badge-inactive { background: #727b84 }
        .badge-publish { background: #00c0ef }
        .badge-editing {  }
        .badge-trash { background: #ff8086 }
        .x-90 {
            transform: rotate(-90deg);
            letter-spacing: 0px;
            text-transform: capitalize;
            border-radius: 4px;
            margin-top: 10px;
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

        //edit Faq

        function edit_faq() {

            //var error = 0;
            var edit_error = 0;

            if (document.getElementById('edit_service').value == "") {
                document.getElementById('edit_service_error').innerHTML = 'Please Select Your Service';
                edit_error++
            }

            if (document.getElementById('edit_question').value == "") {
                document.getElementById('edit_question_error').innerHTML = 'Please Write Your Question';
                edit_error++
            }

            if (tinymce.get("edit_answer").getContent() == "") {
                document.getElementById('edit_answer_error').innerHTML = 'Please Write Your Answer';
                edit_error++
            }

        }
        function edit_reset_error() {
            edit_error = 0
            document.getElementById("edit_service_error").innerHTML = "";
            document.getElementById("edit_question_error").innerHTML = "";
            document.getElementById("edit_answer_error").innerHTML = "";
        }

        function editFaq(el) {
            axios.get('/admin/faq/edit/'+el.getAttribute('data-id'))
                .then(response => {
                    console.log(response);
                    document.getElementById('faqId').value = el.getAttribute('data-id');
                    document.getElementById('edit_service').value = response.data.service;
                    document.getElementById('edit_question').value = response.data.question;
                    //document.getElementById('edit_answer').value = response.data.answer;
                    tinymce.get("edit_answer").setContent(response.data.answer)
                })
                .catch(error => {
                    console.log(error)
            })
        }

        //update Faq

        document.getElementById('updateFaq').addEventListener('click', function () {
            edit_reset_error();
            edit_faq()

            var data = {
                service: document.getElementById('edit_service').value,
                question: document.getElementById('edit_question').value,
                answer: tinymce.get("edit_answer").getContent(),
            }

            if (edit_error = 0 ) {
                // initialize loading effect
                var height = parseInt(document.getElementById('editFaqForm').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('edit-faq-loading').setAttribute('style', loadingStyle)

            axios.post('/admin/faq/' + document.getElementById('faqId').value + '/update', data)
                .then(response => {
                    console.log(response);
                    if (response.status === 200) {
                        document.getElementById('faq-loading').setAttribute('style', 'display: none')
                        $('.editFaqModal').modal('hide')
                        window.location.reload();

                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Blog Update successfully')
                        div.appendChild(txt)
                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)
                    }
                })
                .catch(error => {
                    document.getElementById('edi-faq-loading').setAttribute('style', 'display: none')
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
        var x = location.href
        var y = x.split('/')
        document.getElementById('target').innerHTML = y[y.length - 1]
    </script>

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
    <script type="text/javascript">
      window.InvestingPartner = <?php echo json_encode([
          'csrfToken' => csrf_token(), 
          'locale' => config('app.locale'),
          'auth' => Auth::user(),
          'app_url' => config('app.url')
      ]); ?>
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
                                <a href="{{ url('/admin/faq') }}">
                                    <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                    Faq
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                    <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                @php
                                    $parameters = \Request::segment(3);
                                @endphp
                                {{ ucfirst($parameters) }} Faq List
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
                        <div class="col-md-12 text-center"></div>
                        <div class="row">
                            <div class="col-md-12 text-center" id="success_message"></div>
                            <div class="col-md-12 text-center" id="error_message"></div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body p-t-25">
{{--                                <button type="button" data-toggle="modal" data-target=".addFaqModal" class="btn btn-success pull-right" title="Add Faq">--}}
{{--                                    Add Faq--}}
{{--                                </button>--}}
                                @php
                                    $parameters = \Request::segment(3);
                                @endphp
                                <a href="{{ '/admin/faq/' .$parameters .'/trash-list' }}" class="btn btn-danger pull-right" style="margin-right: 10px;">Trash list</a>
                                <div class="">
                                    <h3> <span id="target"></span> Faq List</h3>
                                    <div class="pull-sm-right">
                                        <div class="tools pull-sm-right"></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>SL</th>
                                            <th>Service</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($faqs as $key => $faq)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $faq->service }}</td>
                                                <td>
                                                    {{ $faq->question }}
                                                    <span class="badge badge-pill badge-{{ $faq->status }} float-right x-90">{{ $faq->status }}</span>
                                                </td>
                                                <td>{{ strip_tags(substr($faq->answer,0,80)) }}...</td>
                                                <td style="text-align:center">
                                                    @if($faq->status == 'inactive')
                                                    <a href="{{ url('admin/faq/'.$faq->id. '/active') }}" data-background="#00bf86" data-tipso="Click to Active" data-position="bottom" class="btn btn-success tipso m-t-20"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('active-form-{{ $faq->id }}').submit();">
                                                        <i class="fa fa-star"></i>
                                                    </a>

                                                    <form id="active-form-{{ $faq->id }}" action="{{ url('admin/faq/'.$faq->id. '/active') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    @else

                                                    <a href="{{ url('admin/faq/'.$faq->id. '/inactive') }}" data-background="#727b84" data-tipso="Click to Inactive" data-position="bottom" class="btn btn-secondary tipso m-t-20"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('active-form-{{ $faq->id }}').submit();">
                                                        <i class="fa fa-star-o"></i>
                                                    </a>

                                                    <form id="active-form-{{ $faq->id }}" action="{{ url('admin/faq/'.$faq->id. '/inactive') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    @endif

                                                    <a href="{{ url('admin/faq/' . $faq->id . '/delete') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                        onclick="event.preventDefault();
                                                        if (confirm('Are You sure you want to delete this!')) {
                                                            document.getElementById('delete-form-{{ $faq->id }}').submit();
                                                        }">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $faq->id }}" action="{{ url('admin/faq/' . $faq->id . '/delete') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <button type="button" data-toggle="modal" data-target=".editFaqModal" class="btn btn-warning" title="Edit Faq" onclick="editFaq(this)" data-id="{{ $faq->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
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
    <!--Faq Add and Edid Modal-->
    @include('admin.faqs.add_faq')
    @include('admin.faqs.edit_faq')
@endsection

