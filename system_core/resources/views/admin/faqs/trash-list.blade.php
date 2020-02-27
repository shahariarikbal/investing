@extends('admin.layouts.default')

@section('title')
    Trash List
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

{{--    <script>--}}
{{--        var x = location.href--}}
{{--        var y = x.split('/')--}}
{{--        document.getElementById('target').innerHTML = y[y.length - 1]--}}
{{--    </script>--}}
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
                            @php
                                $parameters = \Request::segment(3);
                            @endphp
                            <a href="{{ '/admin/faq/' .$parameters }}">
                                <i class="fa fa-circle-o" aria-hidden="true"></i>
                                {{ ucfirst($parameters) }} List
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            {{ ucfirst($parameters) }} Trash List
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
                            <a href="{{ '/admin/faq/' .$parameters }}" class="btn btn-primary pull-right" style="margin-right: 10px;">Back to Faq List</a>
                            <div class="">
                                <h3><i class="fa fa-trash-o" aria-hidden="true"></i> {{ ucfirst($parameters) }} Trash List</h3>
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
                                    @foreach($trash_list as $key => $list)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $list->service }}</td>
                                            <td>
                                                {{ $list->question }}
                                            </td>
                                            <td>{{ strip_tags(substr($list->answer,0,80)) }}...</td>
                                            <td style="text-align:center">
                                                <a href="{{ url('/admin/faq/'.$list->id.'/restore') }}" class="btn btn-warning btn-sm"
                                                   onclick="event.preventDefault();
                                                           if (confirm('Are you sure to restore this Faq Service ?')) {
                                                           document.getElementById('restore-form-{{ $list->id }}').submit();
                                                           }">
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </a>
                                                <form id="restore-form-{{ $list->id }}" action="{{ url('/admin/faq/'.$list->id.'/restore') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>

                                                <a href="{{ url('/admin/faq/'.$list->id.'/destroy') }}" class="btn btn-danger btn-sm"
                                                   onclick="event.preventDefault();
                                                           if (confirm('Are you sure to permanently delete this Faq Service ?')) {
                                                           document.getElementById('delete-form-{{ $list->id }}').submit();
                                                           }">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                                <form id="delete-form-{{ $list->id }}" action="{{ url('/admin/faq/'.$list->id.'/destroy') }}" method="POST" style="display: none;">
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
        <!-- /.inner -->
    </div>
    <!--Faq Add and Edid Modal-->
@endsection