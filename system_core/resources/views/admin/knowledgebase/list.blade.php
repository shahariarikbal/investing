@extends('admin.layouts.default')

@section('title', 'Knowladgebase')

@section('content-container-active', 'active')
@section('content-show', 'show')
@section('knowladge-active', 'active')

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
            letter-spacing: 2px;
            text-transform: capitalize;
            border-radius: 4px;
        }

        .trash{
            margin-right: 10px
        }
    </style>
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
    <script src="{{ asset('admin/vendors/tinymce/js/tinymce.min.js') }}"></script>

    <script>
        var editor_config = {

            path_absolute : "/",

            selector: "textarea.contenteditor",

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
                                Knowledgebase
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
                            <p class="alert alert-success text-center">{{Session::get('message')}}</p>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i> Knowledgebase Table
                                <button type="button" data-toggle="modal" data-target=".addKnowledgebaseModal" class="btn btn-success pull-right" title="Add Knowledgebase">
                                    Add Knowledgebase
                                </button>
                                <a href="{{ url('admin/knowledgebase/trash') }}" class="btn btn-danger pull-right trash" title="Trash List">Trash List</a>
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
                                            <th>Category name</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($knowledgebase as $key=> $knowledge)
                                            <tr>
                                                <td width="5%">{{ $key+1 }}</td>
                                                <td width="15%">
                                                    {{ $knowledge->category->name }}
                                                </td>
                                                <td width="25%">
                                                    {{ $knowledge->title }}<br/>
                                                    <span class="badge badge-pill badge-{{ $knowledge->status }} float-right x-90">{{ $knowledge->status }}</span>
                                                </td>
                                                <td width="25%">{!! strip_tags(substr($knowledge->body,0,400)) !!}</td>
                                                <td style="text-align:center" width="15%">
                                                    <!--  -->
                                                    @if( $knowledge->status == 'inactive' )
                                                        <button href="{{ url('admin/knowledgebase/edit') }}" data-toggle="modal" data-target=".editKnowledgebaseModal" onclick="editKnowledgebaseModal(this)" data-id="{!! $knowledge->id !!}" class="edit btn btn-warning tipso m-t-20"  data-background="#ffa000" data-tipso="Click to edit" data-position="bottom">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <a href="{{ url('admin/knowledgebase/' . $knowledge->id . '/active') }}" data-background="#00bf86" data-tipso="Click to activate" data-position="bottom" class="btn btn-success tipso m-t-20"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('active-form-{{ $knowledge->id }}').submit();">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <form id="active-form-{{ $knowledge->id }}" action="{{ url('admin/knowledgebase/' . $knowledge->id . '/active') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <a href="{{ url('admin/knowledgebase/' . $knowledge->id . '/delete') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                                onclick="event.preventDefault();
                                                                if (confirm('Are You sure you want to delete this!')) {
                                                                    document.getElementById('delete-form-{{ $knowledge->id }}').submit();
                                                                }">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $knowledge->id }}" action="{{ url('admin/knowledgebase/' . $knowledge->id . '/delete') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @elseif($knowledge->status == 'active')
                                                        <a href="{{ url('admin/knowledgebase/' . $knowledge->id . '/publish') }}" class="btn btn-primary tipso m-t-20" data-background="#00c0ef" data-tipso="Click to publish" data-position="bottom"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('publish-form-{{ $knowledge->id }}').submit();">
                                                            <i class="fa fa-globe"></i>
                                                        </a>
                                                        <form id="publish-form-{{ $knowledge->id }}" action="{{ url('admin/knowledgebase/' . $knowledge->id . '/publish') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <a href="{{ url('admin/knowledgebase/' . $knowledge->id . '/inactive') }}" class="btn btn-secondary tipso m-t-20" data-background="#727b84" data-tipso="Click to inactive" data-position="bottom"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('inactive-form-{{ $knowledge->id }}').submit();">
                                                            <i class="fa fa-star-o"></i>
                                                        </a>
                                                        <form id="inactive-form-{{ $knowledge->id }}" action="{{ url('admin/knowledgebase/' . $knowledge->id . '/inactive') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @elseif($knowledge->status == 'publish')
                                                        <a href="{{ url('admin/knowledgebase/' . $knowledge->id . '/active') }}" class="btn btn-success tipso m-t-20" data-background="#00bf86" data-tipso="Click to unpublish" data-position="bottom"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('active-form-{{ $knowledge->id }}').submit();">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <form id="active-form-{{ $knowledge->id }}" action="{{ url('admin/knowledgebase/' . $knowledge->id . '/active') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endif
                                                    <!--  -->
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
</div>

{{--    Add Blog Modal--}}
    @include('admin/knowledgebase/add_modal')
{{--    End Blog Modal--}}

{{--    Start Edit Blog Modal--}}
    @include('admin/knowledgebase/edit_modal')
{{--    End Edit Blog Modal--}}


{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}

<script>
    // add blog validation script
    var error = 0;
        function addKnowledgebaseValidation() {

            if (document.getElementById('category').value == ""){
                document.getElementById("category_error").innerHTML = "Please Select a Category name...";
                error++;
            }

            if (document.getElementById('title').value == ""){
                document.getElementById("title_error").innerHTML = "Please Enter Your Title...";
                error++;
            }

            if (tinymce.get("body").getContent() == ""){
                document.getElementById("body_error").innerHTML = "Please Write your body...";
                error++;
            }

            if (document.getElementById('status').value == "") {
                document.getElementById('status_error').innerHTML = 'Please Select a Status';
                error++
            }

        }

        function knowledgebase_reset_error() {
            error = 0
            document.getElementById('category_error').innerHTML = "";
            document.getElementById('title_error').innerHTML = "";
            document.getElementById('body_error').innerHTML = "";
            document.getElementById('status_error').innerHTML = "";
        }

        // add knowledgebase request script

        document.getElementById('addKnowledgebase').addEventListener('click', function(){
            knowledgebase_reset_error();
            addKnowledgebaseValidation();

            let data = new FormData()
            if (document.getElementById("image").files.length > 0) {
                let image = document.getElementById("image").files[0]
                data.append('feature_image', image, image.name)
            }

            data.append('category_id',      document.getElementById('category').value)
            data.append('title',            document.getElementById('title').value)
            data.append('orders',           document.getElementById('orders').value)
            data.append('status',           document.getElementById('status').value)
            data.append('body',             tinymce.get('body').getContent())

            //SEO code
            data.append('seo_title', document.getElementById('new_seo_title').value)
            data.append('seo_keyword', document.getElementById('new_seo_keyword').value)
            data.append('seo_description', document.getElementById('new_seo_description').value)
            //SEO Code End
            let settings = { headers: { 'content-type': 'multipart/form-data' } }
         
            if (error === 0) {
                // initialize loading effect
                var height = parseInt(document.getElementById('knowledgeForm').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('knowledge-loading').setAttribute('style', loadingStyle)   

                axios.post('/admin/knowledgebase/store',data, settings)
                .then(function (response) {
                    console.log(response);
                    
                    if(response.status === 201) {
                        //alert('Blog Insert Successfully')
                        $('.addKnowledgebaseModal').modal('hide');
                        location.reload(true)

                        document.getElementById('knowledge-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Knowledgebase has been successfully inserted')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)
                    }
                })
                .catch(error => {
                    console.log(error)
                    document.getElementById('knowledge-loading').setAttribute('style', 'display: none')
                    if (error.response.status === 422 && error.response.status === 500) {
                        
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Something is wrong. please try again')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("error_message").appendChild(div)
                    }
                })
            }
            
        })

        // Edit Knowledgebase script

        function editKnowledgebaseModal(el) {
            axios.get('/admin/knowledgebase/edit/' + el.getAttribute('data-id'))
            .then(response => {
                console.log(response)
                document.getElementById('knowledgeId').value = el.getAttribute('data-id')
                document.getElementById("ecategory").value = response.data.category_id
                document.getElementById("etitle").value = response.data.title
                document.getElementById("estatus").value = response.data.status
                document.getElementById("eorders").value = response.data.orders
                tinymce.get("ebody").setContent(response.data.body)
                if(response.data.feature_image) {
                    $("#edit_prev_img").attr("src", InvestingPartner.app_url + "/knowledgebases/images/" + response.data.feature_image)
                }
                else {
                    $("#edit_prev_img").attr("src", InvestingPartner.app_url + "/knowledgebases/images/default.jpg")
                }

                document.getElementById('edit_knowlegdebase_seo_title').value = response.data.seo_optimize.title
                document.getElementById('edit_knowlegdebase_seo_keyword').value = response.data.seo_optimize.keyword
                document.getElementById('edit_knowlegdebase_seo_description').value = response.data.seo_optimize.description
            })
            .catch(error => {
                console.log(error)
            })
        }

        // update knowledgebase script

        var edit_error = 0;
        function editKnowledgebaseValidation() {

            if (document.getElementById('ecategory').value == ""){
                document.getElementById("edit_category_error").innerHTML = "Please Select a Category name...";
                edit_error++;
            }

            if (document.getElementById('etitle').value == ""){
                document.getElementById("edit_title_error").innerHTML = "Please Enter Your Title...";
                edit_error++;
            }

            if (tinymce.get("ebody").getContent() == ""){
                document.getElementById("edit_body_error").innerHTML = "Please Write your body...";
                edit_error++;
            }

            if (document.getElementById('estatus').value == "") {
                document.getElementById('edit_status_error').innerHTML = 'Please Select a Status';
                edit_error++
            }

        }

        function edit_knowledgebase_reset_error() {
            edit_error = 0
            document.getElementById('edit_category_error').innerHTML = "";
            document.getElementById('edit_title_error').innerHTML = "";
            document.getElementById('edit_body_error').innerHTML = "";
            document.getElementById('edit_status_error').innerHTML = "";
        }

        // add knowledgebase request script

        document.getElementById('updateKnowledgebase').addEventListener('click', function(){
            edit_knowledgebase_reset_error();
            editKnowledgebaseValidation();

            let data = new FormData()
            if (document.getElementById("eimage").files.length > 0) {
                let image = document.getElementById("eimage").files[0]
                data.append('feature_image', image, image.name)
            }

            data.append('category_id',      document.getElementById('ecategory').value)
            data.append('title',            document.getElementById('etitle').value)
            data.append('orders',           document.getElementById('eorders').value)
            data.append('status',           document.getElementById('estatus').value)
            data.append('body',             tinymce.get('ebody').getContent())

            //SEO code
            data.append('seo_title', document.getElementById('edit_knowlegdebase_seo_title').value)
            data.append('seo_keyword', document.getElementById('edit_knowlegdebase_seo_keyword').value)
            data.append('seo_description', document.getElementById('edit_knowlegdebase_seo_description').value)
            //SEO Code End
            let settings = { headers: { 'content-type': 'multipart/form-data' } }
         
            if (edit_error === 0) {
                // initialize loading effect
                var height = parseInt(document.getElementById('editKnowledgebaseForm').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('edit-knowledgebase-loading').setAttribute('style', loadingStyle)  
                axios.post('/admin/knowledgebase/'+ document.getElementById('knowledgeId').value +'/update',data, settings)
                .then(function (response) {
                    console.log(response);
                    if(response.status === 200) {
                        //alert('Blog Insert Successfully')
                        $('.editKnowledgebaseModal').modal('hide');
                        location.reload(true)

                        document.getElementById('edit-knowledgebase-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Knowledgebase has been successfully Updated')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)
                    }
                })
                .catch(error => {
                    console.log(error)
                })
            }
            
        })
</script>


@endsection

