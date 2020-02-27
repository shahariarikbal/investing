@extends('admin.layouts.default')
@section('title')
    Signals
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
    <link rel="stylesheet" href="{{ asset('admin/vendors/radio_css/css/radiobox.min.css') }}" />

    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/radio_checkbox.css') }}" />
    <style>
        .ticket_detail{
            margin-left: 70px;
            margin-right: 70px;
        }

        .header{
            margin-left: 25px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .table{
            margin-right: 25px;
            margin-left: 25px;
            margin-top: 25px;
        }

        .card-header{
            margin-left: 5px;
        }

        .m-t-35{
            margin-top: 6px;
        }

        .issue{
            margin-left: 11px;
        }
    </style>
@endsection

@section('footer_scripts')
    <script>
        var error = 0;

        function validate() {
            if (tinymce.get("message").getContent() == "") {
                document.getElementById("replyError").innerHTML = "Please type your message...";
                error++
            }
        }

        function resetError() {
            error = 0
            document.getElementById("replyError").innerHTML = "";
        }

        document.getElementById('saveReply').addEventListener('click', function(e) {

            resetError()
            validate()

            if(error === 0) {
                let data = new FormData()
                if (document.getElementById("attachment").files.length > 0) {
                    let attachment = document.getElementById("attachment").files[0]
                    data.append('attachment', attachment, attachment.name)
                }
                // data.append('attachment', attachment, attachment.name)
                data.append('message', tinymce.get("message").getContent())
                let settings = { headers: { 'content-type': 'multipart/form-data' } }

                axios.post('/admin/ticket/' + document.getElementById('replyId').value + '/reply', data, settings)
                    .then(function (response) {
                            if(response.status === 201){
                                alert('Reply Successfully Done....');
                                $('.replyModal').modal('hide');
                                window.location.reload()
                            }
                    })
                    .catch(function (error) {
                        if(error.response.status === 422){
                            if(error.response.data.message && error.response.data.message[0])
                                document.getElementById("replyError").innerHTML = "Please type your message...";
                            }
                    });
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
    <script src="{{ asset('admin/js/pages/radio_checkbox.js') }}"></script>
    <script src="{{ asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js') }}"></script>

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

            selector: "textarea.replyEditor",

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

        var screenshotBtn = document.getElementsByClassName("reply-screenshot")

        for(var i = 0; i <= screenshotBtn.length - 1; i++) {
            screenshotBtn[i].addEventListener('click', function() {
                let reply = JSON.parse(this.getAttribute('data-content'))
                reply.attachment
                console.log(reply.ticket_id)
                var isImage = false
                var isPdf = false
                if (reply.attachment.split('.')[1] === 'jpg' || reply.attachment.split('.')[1] === 'png') {
                    isImage = true
                    isPdf = false
                }
                if (reply.attachment.split('.')[1] === 'pdf') {
                    isImage = false
                    isPdf = true
                }

                if (isImage) {
                    var img = document.createElement('img')
                    img.setAttribute('src', "{{ url('storage/support-ticket/') }}" + '/' + reply.attachment)
                    img.setAttribute('width', "100%")
                    document.getElementById('file-target').innerHTML = ''
                    document.getElementById('file-target').appendChild(img)
                }

                if (isPdf) {
                    var pdf = document.createElement('iframe')
                    pdf.setAttribute('src', "{{ url('storage/support-ticket/') }}" + '/' + reply.attachment)
                    pdf.setAttribute('width', "100%")
                    pdf.setAttribute('height', "800px")
                    document.getElementById('file-target').innerHTML = ''
                    document.getElementById('file-target').appendChild(pdf)
                }
            })
        }

    </script>
@endsection

@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg col-sm-7 col-md-12 col-12">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url('/admin/tickets') }}">
                                <i class="fa fa-file-text"></i>
                               Support Tickets List
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-file-text"></i>
                            Case ID: {{ $ticket->id }} Ticket Details
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="row ticket_detail">

        <div class="col-lg m-t-35">
            <h2>Case ID: {{ $ticket->id }}</h2>
            <div class="card">
                <div class="card-header bg-white">
                    Case Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        Subject <br>
                                        {{ ucfirst($ticket->subject) }}<br><br>

                                        Case ID <br>
                                        {{ $ticket->id }} <br><br>

                                        Created <br>
                                        {{ $ticket->created_at }}<br><br>

                                        Department <br>
                                        {{ $ticket->supportDepartment->name }}<br><br>
                                    </td>

                                    <td>
                                        Opened By <br>
                                        {{ $ticket->member->email }}<br><br>

                                        Status <br>
                                        {{ ucfirst($ticket->status) }}<br><br>

                                        Severity <br>
                                        {{ ucfirst($ticket->severity) }}<br><br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><hr>
                
                    <div class="row issue">
                        <h4>Issue</h4>
                        <p style="margin-left: 20px;">{!! ucfirst($ticket->issue) !!}</p>
                    </div>
                    @if ($ticket->attachment)
                        <a class="btn btn-primary" style="margin-left: 10px;" href="{{ url('storage/support-ticket/'.$ticket->attachment) }}" data-toggle="modal" data-target="#ticketModal"><i class="fa fa-paperclip"></i>  {{ $ticket->attachment }}</a>
                    @endif
                    <br/>
                    <button class="btn btn-info" style="margin-left: 10px; margin-top: 10px;" data-toggle="modal" data-target="#replyModal" data-id="{{ $ticket->id }}">Reply</button>
                </div>
            </div>
        </div>
    </div>

    @if(count($ticket->replies) > 0)
        <div class="row ticket_detail">
            <div class="col-lg m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                        Correspondence
                    </div>
                    <div class="card-body">

                        @foreach($ticket->replies as $reply)
                            <div class="row border-bottom">
                                <div class="col-lg-3">
                                    Created <br>
                                    {{ $reply->created_at }}<br><br>

                                    {{ $reply->member ? 'Member' : 'Admin' }}  Email <br>
                                    {{ $reply->member ? $reply->member->email : $reply->admin->email }}<br><br>
                                </div>
                                <div class="col-lg-9 border-left">
                                    Reply <br>
                                    {!! $reply->message !!}<br>
                                    @if($reply->attachment)
                                        <a class="btn btn-primary reply-screenshot" href="#" data-toggle="modal" data-target="#replyTicketModal" data-content="{{ $reply }}"><i class="fa fa-paperclip"></i>  {{ $reply->attachment }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('admin.support.partial.reply_ticket_modal')
    @else
        <div class="row ticket_detail">
            <div class="col-lg m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                        No reply found
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('admin.support.partial.reply_form')
    @include('admin.support.partial.ticket_modal')
@endsection
