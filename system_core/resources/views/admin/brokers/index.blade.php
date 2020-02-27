@extends('admin.layouts.default')

@section('title', 'Brokers')

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
    <!--Page level styles-->
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
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Broker
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <div class="col-12 data_tables">
                    <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                    @if(Session::get('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-file-text-o"></i>
                            Broker List
                        </div>
                        <div class="card-body p-t-25">
                        <a href="{{ url('admin/broker/trash') }}" class="btn btn-danger pull-right">Trash</a>
                        <a href="{{ url('admin/broker/create') }}" class="btn btn-success pull-right" style="margin-right: 10px;">Create</a>
                            <div class="">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>SL</th>
                                        <th>Broker Name</th>
                                        <th>Logo</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Option</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach($brokers as $key => $broker)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                {{ $broker->name }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('/broker/logo/89x36-'.$broker->logo) }}" style="height: 50px;" width="100px">
                                            </td>
                                            <td style="text-align: center;">
                                                @if($broker->status == 0)
                                                <a href="{{url('admin/broker/'.$broker->id.'/active')}}" onclick="event.preventDefault(); document.getElementById('active-form-{{ $broker->id }}').submit();">
                                                    <span style='background:#dc3545 ;padding: 3px 14px;border-radius: 2px;color:#fff;font-weight:600'>Pending</span>
                                                </a>
                                                <form id="active-form-{{ $broker->id }}" action="{{url('admin/broker/'.$broker->id.'/active')}}" method="POST" style="display:none">
                                                    @csrf
                                                </form>
                                                @endif
                                                @if($broker->status == 1)
                                                <a href="{{url('admin/broker/'.$broker->id.'/inactive')}}" onclick="event.preventDefault(); document.getElementById('inactive-form-{{ $broker->id }}').submit();">
                                                    <span style='background:#28a745 ;padding: 3px 14px;border-radius: 2px;color:#fff;font-weight:600'>Published</span>
                                                </a>
                                                <form id="inactive-form-{{ $broker->id }}" action="{{url('admin/broker/'.$broker->id.'/inactive')}}" method="POST" style="display:none">
                                                    @csrf
                                                </form>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{url('admin/broker/'.$broker->id.'/edit')}}" class="btn btn-raised btn-success" id="{{$broker->id}}">Show Data</a>
                                                <form id="delete-form-{{ $broker->id }}" method="post" action="{{ url('admin/broker/'.$broker->id.'/delete') }}" style="display: none">
                                                    {{ csrf_field() }}
                                                </form>
                                                <a href="" onclick="
                                                    if(confirm('Are you sure, You Want to send it into trash?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$broker->id}}').submit();
                                                    }
                                                    else{
                                                    event.preventDefault();
                                                    }" class="btn  btn-danger "><i class="fa fa-trash"></i>
                                                </a>
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
@endsection