@extends('admin.layouts.default')

@section('title', 'Trashed Analysis')

@section('content-container-active', 'active')
@section('content-show', 'show')
@section('analysis-active', 'active')

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
                                <a href="{{ url('/admin/analyses') }}">
                                    <i class="fa fa-bar-chart-o" aria-hidden="true"></i>
                                    Analysis List
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <i class="fa fa-trash"></i>
                                Analysis Trash List
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
                        <p class="alert alert-success text-center">{{Session::get('message')}}</p>
                        @endif
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i>Analysis Trash List
                            </div>

                            <div class="card-body p-t-25">
                                <a href="{{ url('admin/analyses') }}" class="btn btn-primary pull-right" title="Blog List">Back to Analyses List</a>
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
                                        @foreach($deleted_analysis as $key=> $analysis)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    {{ $analysis->category ? $analysis->category->name : '' }}
                                                </td>
                                                <td>
                                                    <p>{{ $analysis->title }}</p>
                                                    @if($analysis->feature_image)
                                                        <img src="{{ asset('/analysis/images/278x180-'.$analysis->feature_image) }}" style="height: 50px;" width="100px">
                                                    @else
                                                        <img src="{{ asset('/analysis/images/default.jpg') }}" style="height: 80px;" width="100px">
                                                    @endif
                                                    <span class="badge badge-pill badge-{{ $analysis->status }} float-right x-90">{{ $analysis->status }}</span>
                                                </td>
                                                <td width="25%">{!! strip_tags(substr($analysis->body,0,100)) !!}</td>
                                                <td style="text-align:center">
                                                    <a href="{{ url('admin/analysis/' . $analysis->id . '/destroy') }}" class="btn btn-danger tipso m-t-20" data-background="#ff8086" data-tipso="Click to destroy" data-position="bottom"
                                                            onclick="event.preventDefault();
                                                            if (confirm('Are You sure you want to destroy this!')) {
                                                                document.getElementById('destroy-form-{{ $analysis->id }}').submit();
                                                            }">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="destroy-form-{{ $analysis->id }}" action="{{ url('admin/analysis/' . $analysis->id . '/destroy') }}" method="post" style="display: none;">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                    </form>
                                                    <a href="{{ url('admin/analysis/'.$analysis->id.'/restore') }}" class="btn btn-raised btn-warning" id="{{$analysis->id}}">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                                    <form method="get" action="{{ url('admin/analysis/'.$analysis->id.'/restore') }}" style="display: none">
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
            <!-- /.inner -->
        </div>
    </div>
</div>
@endsection
