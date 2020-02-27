@extends('admin.layouts.default')

@section('title')
    Comments
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
                                <a href="{{ url('/admin/comments') }}">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    Comments
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                <span id="targets"></span> comments List
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
                            <h3 style="margin-left: 10px; margin-top:8px;">Comments of <span id="target"></span></h3>
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
                                            <th>Member name</th>
                                            <th>Member email</th>
                                            <th>Analysis Title</th>
                                            <th>Comments</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comments as $key => $comment)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $comment->member->full_name }}</td>
                                                <td>{{ $comment->member->email }}</td>
                                                <td>{{ $comment->commentable->title }}</td>
                                                <td>{{ substr($comment->body,0,50) }}...</td>
                                                <td>
                                                    @if($comment->approved == 0)
                                                        <a href="{{ url('admin/comment/'.$comment->id. '/approved') }}" data-background="#00bf86" data-tipso="Click to Approved" data-position="bottom" class="btn btn-success tipso m-t-20"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('active-form-{{ $comment->id }}').submit();">
                                                            <i>Approved</i>
                                                        </a>
                                                        <form id="active-form-{{ $comment->id }}" action="{{ url('admin/comment/'.$comment->id. '/approved') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @else
                                                        <a href="{{ url('admin/comment/'.$comment->id. '/revoke') }}" data-background="#727b84" data-tipso="Click to Revoke" data-position="bottom" class="btn btn-secondary tipso m-t-20"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('active-form-{{ $comment->id }}').submit();">
                                                            <i>Revoke</i>
                                                        </a>
                                                        <form id="active-form-{{ $comment->id }}" action="{{ url('admin/comment/'.$comment->id. '/revoke') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endif
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
    var x = location.href;
    var y = x.split('/')
    document.getElementById('target').innerHTML = y[y.length -2 ];
</script>

<script>
    var x = location.href;
    var y = x.split('/')
    document.getElementById('targets').innerHTML = y[y.length -2 ];
</script>

@endsection

