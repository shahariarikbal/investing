@extends('admin.layouts.default')

@section('title', 'Broker Press Release')

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

        function pressReleasesVideoValidation() {
            if (document.getElementById('tag').value == "") {
                document.getElementById('error_tag').innerHTML = 'Tag field is required';
                error++
            }

            if (document.getElementById('tag_url').value == "") {
                document.getElementById('error_tag_url').innerHTML = 'Tag url field is required';
                error++
            }

            if (document.getElementById('title').value == "") {
                document.getElementById('error_title').innerHTML = 'Title field is required';
                error++
            }

            if (document.getElementById('url').value == "") {
                document.getElementById('error_url').innerHTML = 'url field is required';
                error++
            }


        }

        function broker_press_release_error_reset() {
            error = 0
            document.getElementById('error_tag').innerHTML = '';
            document.getElementById('error_tag_url').innerHTML = '';
            document.getElementById('error_title').innerHTML = '';
            document.getElementById('error_url').innerHTML = '';
        }

        document.getElementById('addPressRelease').addEventListener('click', function(e) {
            pressReleasesVideoValidation()
            broker_press_release_error_reset()

            var data = {
                tag: document.getElementById('tag').value,
                tag_url: document.getElementById('tag_url').value,
                title: document.getElementById('title').value,
                url: document.getElementById('url').value,
            }

            // axios request for broker video
            if (error === 0) {
                axios.post('/admin/broker/' + {{$broker->id}} + '/press-release', data)
                .then(response => {
                        if (response.status === 200) {
                            //alert('Data insert successfully')
                            $('#pressRelease').modal('hide');
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)
                            setTimeout(function(){ window.location.reload(true) }, 3000);
                            document.getElementById('tag').value = ''
                            document.getElementById('tag_url').value = ''
                            document.getElementById('title').value = ''
                            document.getElementById('url').value = ''
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

                                if (error.response.data.tag && error.response.data.tag.length > 0) {
                                    document.getElementById('error_tag').innerHTML = error.response.data.tag[0]
                                }

                                if (error.response.data.tag_url && error.response.data.tag_url.length > 0) {
                                    document.getElementById('error_tag_url').innerHTML = error.response.data.tag_url[0]
                                }

                                if (error.response.data.title && error.response.data.title.length > 0) {
                                    document.getElementById('error_title').innerHTML = error.response.data.title[0]
                                }

                                if (error.response.data.url && error.response.data.url.length > 0) {
                                    document.getElementById('error_url').innerHTML = error.response.data.url[0]
                                }

                            }
                    })
            }
            
        })

    </script>

    <!---Broker press release edit--->
    <script>
        function editBrokerPressRelease(el) {
            let content = JSON.parse(el.getAttribute('data-content'))
            //console.log(content)
            document.getElementById('editPressReleaseId').value = el.getAttribute('data-id');
            document.getElementById('edit_tag').value = content.tag
            document.getElementById('edit_tag_url').value = content.tag_url
            document.getElementById('edit_title').value = content.title
            document.getElementById('edit_url').value = content.url
        }
    </script>

    <!-----Broker press release update----->
    <script>
        var press_relese_error = 0;

        function updateBrokerPressReleaseValidation() {
            if (document.getElementById('edit_tag').value == "") {
                document.getElementById('edit_error_tag').innerHTML = 'Tag field is required';
                press_relese_error++
            }

            if (document.getElementById('edit_tag_url').value == "") {
                document.getElementById('edit_error_tag_url').innerHTML = 'Tag url field is required';
                press_relese_error++
            }

            if (document.getElementById('edit_title').value == "") {
                document.getElementById('edit_error_title').innerHTML = 'Title field is required';
                press_relese_error++
            }

            if (document.getElementById('edit_url').value == "") {
                document.getElementById('edit_error_url').innerHTML = 'url field is required';
                press_relese_error++
            }

        }

        function update_broker_Press_release_error_reset() {
            press_relese_error = 0
            document.getElementById('edit_error_tag').innerHTML = '';
            document.getElementById('edit_error_tag_url').innerHTML = '';
            document.getElementById('edit_error_title').innerHTML = '';
            document.getElementById('edit_error_url').innerHTML = '';
        }
        document.getElementById('updateBrokerPressRelese').addEventListener('click', function(e) {
            update_broker_Press_release_error_reset()
            updateBrokerPressReleaseValidation()
            

            var data = {
                tag: document.getElementById('edit_tag').value,
                tag_url: document.getElementById('edit_tag_url').value,
                title: document.getElementById('edit_title').value,
                url: document.getElementById('edit_url').value,

            }

            if (press_relese_error === 0) {
                axios.post('/admin/broker/'+ {{$broker->id}} + '/press-release/' + document.getElementById('editPressReleaseId').value + '/update', data)
                .then(response => {
                    if (response.status === 200) {
                        $('#pressReleaseUpdate').modal('hide');
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode(response.data.message)
                        div.appendChild(txt)

                        document.getElementById('update_success_message').innerHTML = ''
                        document.getElementById('update_error_message').innerHTML = ''
                        document.getElementById("update_success_message").appendChild(div)
                        setTimeout(function(){ window.location.reload(true) }, 3000);
                        document.getElementById('edit_tag').value = ''
                        document.getElementById('edit_tag_url').value = ''
                        document.getElementById('edit_title').value = ''
                        document.getElementById('edit_url').value = ''
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

                        if (error.response.data.tag && error.response.data.tag.length > 0) {
                            document.getElementById('edit_error_tag').innerHTML = error.response.data.tag[0]
                        }

                        if (error.response.data.tag_url && error.response.data.tag_url.length > 0) {
                            document.getElementById('edit_error_tag_url').innerHTML = error.response.data.tag_url[0]
                        }

                        if (error.response.data.title && error.response.data.title.length > 0) {
                            document.getElementById('edit_error_title').innerHTML = error.response.data.title[0]
                        }

                        if (error.response.data.url && error.response.data.url.length > 0) {
                            document.getElementById('edit_error_url').innerHTML = error.response.data.url[0]
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
                            {{ $broker->name }} &nbsp;Press Releases
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
                                Broker press Releases
                            </strong>
                            <button type="button" class="btn btn-md btn-primary pull-right" data-toggle="modal" data-target=".pressRelease"><i class="fa fa-plus" aria-hidden="true"></i> Add Pree Release</button>
                            
                            <div class="">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>SL</th>
                                        <th>Source</th>
                                        <th>Source Url</th>
                                        <th>Title</th>
                                        <th>Url</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($press_releases as $key => $press_release)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td width="15%">{{ $press_release->tag }}</td>
                                            <td>
                                                <a href="{{ $press_release->tag_url }}" target="_blank"> {{$press_release->tag_url }}</a>
                                            </td>
                                            <td>{{ $press_release->title }}</td>
                                            <td>
                                                <a href="{{ $press_release->url }}" target="_blank">{{ $press_release->url }}</a>
                                            </td>
                                            <td style="text-align:center">
                                                @if($press_release->status === 0)
                                                <a href="{{url('admin/broker/' .$broker->id. '/press-release/'.$press_release->id.'/active')}}" class="btn btn-md btn-success" onclick="event.preventDefault(); document.getElementById('active-form-{{ $press_release->id }}').submit();">
                                                    <span>Inactive</span>
                                                </a>
                                                <form id="active-form-{{ $press_release->id }}" action="{{url('admin/broker/' .$broker->id. '/press-release/'.$press_release->id.'/active')}}" method="POST" style="display:none">
                                                    @csrf
                                                </form>
                                                @endif
                                                @if($press_release->status === 1)
                                                <a href="{{url('admin/broker/' .$broker->id. '/press-release/'.$press_release->id.'/inactive')}}" class="btn btn-md btn-warning" onclick="event.preventDefault(); document.getElementById('inactive-form-{{ $press_release->id }}').submit();">
                                                    <span>Active</span>
                                                </a>
                                                <form id="inactive-form-{{ $press_release->id }}" action="{{url('admin/broker/' .$broker->id. '/press-release/'.$press_release->id.'/inactive')}}" method="POST" style="display:none">
                                                    @csrf
                                                </form>
                                                @endif
                                            </td>
                                            <td style="text-align:center" width="15%">
                                                <button 
                                                    href="{{ url('admin/broker/'.$broker->id.'/press-release/edit/') }}" 
                                                    data-id="{!! $press_release->id !!}" 
                                                    data-content="{{ $press_release }}" 
                                                    data-toggle="modal" 
                                                    data-target=".pressReleaseUpdate" 
                                                    onclick="event.preventDefault(); editBrokerPressRelease(this)" 
                                                    class="btn btn-info m-t-20 edit" 
                                                    
                                                    >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a href="{{ url('admin/broker/' . $broker->id . '/press-release/'.$press_release->id.'/delete') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to delete" data-position="bottom"
                                                    onclick="event.preventDefault();
                                                    if (confirm('Are You sure you want to delete this!')) {
                                                        document.getElementById('delete-form-{{ $press_release->id }}').submit();
                                                    }">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $press_release->id }}" action="{{ url('admin/broker/' . $broker->id . '/press-release/'.$press_release->id.'/delete') }}" method="POST" style="display: none;">
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
    <div class="modal fade pressRelease" id="pressRelease" tabindex="-1" role="dialog" aria-labelledby="pressReleaseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Broker Press Release</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body m-t-35">
                    <form method="post" name="broker_press_release" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="tag" class="col-form-label">Source</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="tag" name="tag" placeholder="Press Release source">
                                <small class="help-block error" id="error_tag" style="color:red"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="tag_url" class="col-form-label">Source Url</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="tag_url" name="tag_url" placeholder="Press Release source url">
                                <small class="help-block error" id="error_tag_url" style="color:red"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="title" class="col-form-label">Title</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="title" name="title" placeholder="Press Release Title">
                                <small class="help-block error" id="error_title" style="color:red"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="url" class="col-form-label">Url</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="url" name="url" placeholder="Press Release url">
                                <small class="help-block error" id="error_url" style="color:red"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" id="addPressRelease" name="broker_video" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!---Broker Video edit Modal--->
    <div class="modal fade pressReleaseUpdate" id="pressReleaseUpdate" tabindex="-1" role="dialog" aria-labelledby="pressReleaseUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Broker Press Release</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body m-t-35">
                    <form method="post" name="broker_video" class="form-horizontal">
                        @csrf
                        <input type="hidden" id="editPressReleaseId" name="id">
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="tag" class="col-form-label">Source</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="edit_tag" name="tag" placeholder="Press Release source">
                                <small class="help-block error" id="edit_error_tag" style="color:red"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="tag_url" class="col-form-label">Source Url</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="edit_tag_url" name="tag_url" placeholder="Press Release source url">
                                <small class="help-block error" id="edit_error_tag_url" style="color:red"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="title" class="col-form-label">Title</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="edit_title" name="title" placeholder="Press Release Title">
                                <small class="help-block error" id="edit_error_title" style="color:red"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xl-3 text-xl-right">
                                <label for="url" class="col-form-label">Url</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" class="form-control form-control-sm" id="edit_url" name="url" placeholder="Press Release url">
                                <small class="help-block error" id="edit_error_url" style="color:red"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" id="updateBrokerPressRelese" name="update_press_release" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection