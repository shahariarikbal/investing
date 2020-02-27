@extends('admin.layouts.default')

@section('title', 'Broker Video')

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
    <style>
        .badge-active { background: #00bf86 }
        .badge-inactive { background: #727b84 }
        .badge-trash { background: #ff8086 }
        .cursor-pointer {
            cursor: pointer;
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

        function brokerVideoValidation() {
            if (document.getElementById('error_video_code').value == "") {
                document.getElementById('error_video_code').innerHTML = 'Please input video code';
                error++
            }

        }

        function broker_video_error_reset() {
            error = 0
            document.getElementById('error_video_code').innerHTML = '';
            document.getElementById('error_description').innerHTML = '';
        }

        document.getElementById('addVideo').addEventListener('click', function(e) {
            brokerVideoValidation()
            broker_video_error_reset()

            var data = {
                code: document.getElementById('code').value,
                description: document.getElementById('description').value
            }

            // axios request for broker video
            if (error === 0) {
                axios.post('/admin/broker/' + {{$broker->id}} + '/video', data)
                .then(response => {
                        if (response.status === 200) {
                            //alert('Data insert successfully')
                            $('#broker_video').modal('hide');
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)
                            setTimeout(function(){ window.location.reload(true) }, 3000);
                            document.getElementById('code').value = ''
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

                                if (error.response.data.code && error.response.data.code.length > 0) {
                                    document.getElementById('error_video_code').innerHTML = error.response.data.code[0]
                                }

                            }
                    })
            }
            
        })

    </script>

    <!---Broker video edit--->
    <script>
        function editBrokerVideo(el) {
            let content = JSON.parse(el.getAttribute('data-content'))
            
            document.getElementById('editBrokerVideoId').value = el.getAttribute('data-id');
            document.getElementById('edit_code').value = content.code
            document.getElementById('edit_description').value = content.description
        }
    </script>

    <!-----Broker video update----->
    <script>
        var video_error = 0;

        function updateBrokerVideoValidation() {
            if (document.getElementById('edit_code').value == "") {
                document.getElementById('edit_error_video_code').innerHTML = 'Please input video code';
                video_error++
            }

        }

        function update_broker_video_error_reset() {
            video_error = 0
            document.getElementById('edit_error_video_code').innerHTML = '';
        }
        document.getElementById('updateBrokerVideo').addEventListener('click', function(e) {
            update_broker_video_error_reset()
            updateBrokerVideoValidation()
            

            var data = {
                code: document.getElementById('edit_code').value,
                description: document.getElementById('edit_description').value

            }

            if (video_error === 0) {
                axios.post('/admin/broker/'+ {{$broker->id}} + '/video/' + document.getElementById('editBrokerVideoId').value + '/update', data)
                .then(response => {
                    if (response.status === 200) {
                        $('#edit_broker_video').modal('hide');
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode(response.data.message)
                        div.appendChild(txt)

                        document.getElementById('update_success_message').innerHTML = ''
                        document.getElementById('update_error_message').innerHTML = ''
                        document.getElementById("update_success_message").appendChild(div)
                        setTimeout(function(){ window.location.reload(true) }, 3000);
                        document.getElementById('edit_code').value = ''
                        document.getElementById('edit_description').value = ''
                    }
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                    if (response.status === 422 || response.status === 500) {
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-danger")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Something is wrong. please try again, Your data is unprocessing')
                        div.appendChild(txt)

                        document.getElementById('update_success_message').innerHTML = ''
                        document.getElementById('update_error_message').innerHTML = ''
                        document.getElementById("update_error_message").appendChild(div)

                        if (error.response.data.code && error.response.data.code.length > 0) {
                            document.getElementById('edit_error_video_code').innerHTML = error.response.data.code[0]
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
                            {{ $broker->name }} &nbsp;Video
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
                    <!-- BEGIN Broker video TABLE PORTLET-->
                    @if(Session::get('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12 text-center" style="font-size:24px;" id="success_message"></div>
                            <div class="col-md-12 text-center" style="font-size:24px;" id="error_message"></div>
                            <div class="col-md-12 text-center" style="font-size:24px;" id="update_success_message"></div>
                            <div class="col-md-12 text-center" style="font-size:24px;" id="update_error_message"></div>
                        </div>
                        <div class="card-body p-t-25">
                            <strong style="font-size: 24px;">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Broker Video list
                            </strong>
                            <button type="button" class="btn btn-md btn-primary pull-right" data-toggle="modal" data-target=".broker-video-modal-xl"><i class="fa fa-plus" aria-hidden="true"></i> Add Video</button>
                            
                            <div class="">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>SL</th>
                                        <th>Video</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $key => $video)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <iframe width="280" height="160" src="https://www.youtube.com/embed/{{$video->code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            <td width="35%">{{ substr($video->description, 0, 80) }}</td>
                                            <td style="text-align:center">
                                                @if($video->status === 0)
                                                <a href="{{url('admin/broker/' .$broker->id. '/video/'.$video->id.'/active')}}" class="btn btn-md btn-success" onclick="event.preventDefault(); document.getElementById('active-form-{{ $video->id }}').submit();">
                                                    <span>Inactive</span>
                                                </a>
                                                <form id="active-form-{{ $video->id }}" action="{{url('admin/broker/' .$broker->id. '/video/'.$video->id.'/active')}}" method="POST" style="display:none">
                                                    @csrf
                                                </form>
                                                @endif
                                                @if($video->status === 1)
                                                <a href="{{url('admin/broker/' .$broker->id. '/video/'.$video->id.'/inactive')}}" class="btn btn-md btn-warning" onclick="event.preventDefault(); document.getElementById('inactive-form-{{ $video->id }}').submit();">
                                                    <span>Active</span>
                                                </a>
                                                <form id="inactive-form-{{ $video->id }}" action="{{url('admin/broker/' .$broker->id. '/video/'.$video->id.'/inactive')}}" method="POST" style="display:none">
                                                    @csrf
                                                </form>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                <button 
                                                    href="{{ url('admin/broker/'.$broker->id.'/video/edit/') }}" 
                                                    data-id="{!! $video->id !!}" 
                                                    data-content="{{ $video }}" 
                                                    data-toggle="modal" 
                                                    data-target=".broker-video-edit" 
                                                    onclick="event.preventDefault(); editBrokerVideo(this)" 
                                                    class="btn btn-info m-t-20" 
                                                
                                                    >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a href="{{ url('admin/broker/' . $broker->id . '/video/'.$video->id.'/delete') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                    onclick="event.preventDefault();
                                                    if (confirm('Are You sure you want to delete this!')) {
                                                        document.getElementById('delete-form-{{ $video->id }}').submit();
                                                    }">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $video->id }}" action="{{ url('admin/broker/' . $broker->id . '/video/'.$video->id.'/delete') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
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

    <!---Broker Video Modal--->
    <div class="modal fade broker-video-modal-xl" id="broker_video" tabindex="-1" role="dialog" aria-labelledby="brokerVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Broker Video</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body m-t-35">
                    <form method="post" name="broker_video" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="video_code" class="col-form-label">Video Code</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="code" name="code" placeholder="Broker video code">
                                <small class="help-block error" id="error_video_code" style="color:red"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="description" class="col-form-label">Video Description</label>
                            </div>
                            <div class="col-xl-9">
                                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Broker Video description"></textarea>
                                <small class="help-block error" id="error_description" style="color:red"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" id="addVideo" name="broker_video" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!---Broker Video edit Modal--->
    <div class="modal fade broker-video-edit" id="edit_broker_video" tabindex="-1" role="dialog" aria-labelledby="brokerVideoEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Broker Video</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body m-t-35">
                    <form method="post" name="broker_video" class="form-horizontal">
                        @csrf
                        <input type="hidden" id="editBrokerVideoId" name="id">
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="video_code" class="col-form-label">Video Code</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="edit_code" name="code" placeholder="Broker video code">
                                <small class="help-block error" id="edit_error_video_code" style="color:red"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="description" class="col-form-label">Video Description</label>
                            </div>
                            <div class="col-xl-9">
                                <textarea class="form-control" name="description" id="edit_description" rows="5" placeholder="Broker Video description"></textarea>
                                <small class="help-block error" id="error_description" style="color:red"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" id="updateBrokerVideo" name="broker_video" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection