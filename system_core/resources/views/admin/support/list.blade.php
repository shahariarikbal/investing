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
        .trash { margin-right: 10px; }
        .text-primary {
            margin-top: 9px;
            margin-left: 10px;
            color: #212529 !important;
        }

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
    </style>
@endsection

@section('footer_scripts')

    <script>
        String.prototype.replaceAll = function(search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };

        $(document).ready(function() {

            $("#name").keyup(function() {
                let slug;
                slug = $(this).val().trim().replaceAll(/[\s//]+/, '-');
                $("#slug").val(slug);
            });

            $('#open-ticket-data-table').DataTable();
            $('#close-ticket-data-table').DataTable();
            $('#answer-ticket-data-table').DataTable();
            $('#reply-ticket-data-table').DataTable();
            $('#resolve-ticket-data-table').DataTable();

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
                            <i class="fa fa-file-text"></i>
                            Support Tickets List
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    <div class="card m-t-35 real_charts">
        <div class="card-header bg-white">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-center" href="#open_ticket" role="tab" data-toggle="tab">Open Ticket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#answer_ticket" role="tab" data-toggle="tab">Answer Ticket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#close_ticket" role="tab" data-toggle="tab">Close Ticket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#resolve_ticket" role="tab" data-toggle="tab">Resolved Ticket</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <!-- Tab panes -->
            <div class="tab-content m-t-20">
                <div role="tabpanel" class="tab-pane fade show active" id="open_ticket">
                    @include('admin.support.partial.open_ticket')
                </div>

                <div role="tabpanel" class="tab-pane fade show" id="answer_ticket">
                    @include('admin.support.partial.answer_ticket')
                </div>

                <div role="tabpanel" class="tab-pane fade show" id="close_ticket">
                    @include('admin.support.partial.close_ticket')
                </div>

                <div role="tabpanel" class="tab-pane fade show" id="resolve_ticket">
                    @include('admin.support.partial.resolve_ticket')
                </div>
            </div>
        </div>
    </div>
@endsection
