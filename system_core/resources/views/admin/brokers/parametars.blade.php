@extends('admin.layouts.default')

@section('title', 'Broker Parameters')

@section('broker-container-active', 'active')
@section('broker-show', 'show')
@section('parameter-active', 'active')

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
    <link rel="stylesheet" href="{{ asset('admin/css/pages/radio_checkbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/radio_css/css/radiobox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/checkbox_css/css/checkbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/multiselect/css/multi-select.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"/>
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('admin/css/pages/form_elements.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/wizards.css') }}"/>
    
    <style>
        .teb-weight{
            margin-left: 5%;
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
    
    <script src="{{ asset('admin/js/pages/radio_checkbox.js') }}"></script>
    <script src="{{ asset('admin/vendors/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/js/pages/form_elements.js') }}"></script>
    <script src="{{ asset('admin/vendors/twitter-bootstrap-wizard/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
    <!--End of plugin scripts-->

    
    <!--Page level scripts-->
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script src="{{ asset('admin/js/pages/wizard.js') }}"></script>
    
<!-- end page level scripts -->

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
                            Broker Parametars
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer form_wizzards">
        <div class="inner bg-container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @if(Session::get('message'))
                            <h4 class="alert alert-success" style="text-align: center;">{{ Session::get('message') }}</h4>
                        @endif

                        @if(Session::get('error'))
                            <h4 class="alert alert-danger" style="text-align: center;">{{ Session::get('error') }}</h4>
                        @endif

                        <p style="color: red; text-align: center; font-size: 18px;"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</p>
                        <p style="color: red; text-align: center; font-size: 18px;"> {{ $errors->has('slug') ? $errors->first('slug') : ' ' }}</p>
                        <p style="color: red; text-align: center; font-size: 18px;"> {{ $errors->has('quick_display') ? $errors->first('quick_display') : ' ' }}</p>

                        <div class="card-header bg-white">
                            <i class="fa fa-file-text-o"></i>
                            Broker Parametars
                        </div>
                            <div class="card-body m-t-20">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link active" data-toggle="tab" href="#broker-type" role="tab">Broker Type</a>
                                    </li>
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link" data-toggle="tab" href="#payment-option" role="tab">Payment Option</a>
                                    </li>
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link" data-toggle="tab" href="#regulatory-authority" role="tab">Regulatory Authority</a>
                                    </li>
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link" data-toggle="tab" href="#spread-type" role="tab">Spread Type</a>
                                    </li>
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link" data-toggle="tab" href="#trading-instrument" role="tab">Trading Instrument</a>
                                    </li>
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link" data-toggle="tab" href="#trading-platform" role="tab">Trading Platform</a>
                                    </li>
                                    <li class="nav-item teb-weight">
                                        <a class="nav-link" data-toggle="tab" href="#country" role="tab">Country</a>
                                    </li>
                                </ul>
                            </div>                            
                            <br/>
                            <div class="tab-content" id="">
                                <div class="tab-pane fade show active" id="broker-type" role="tabpanel" aria-labelledby="broker-type-tab">
                                <button type="button" class="btn btn-primary" style="margin-left:2%" onclick="openForm('broker-type')">Create</button>
                                
                                    <div class="card m-t-35">
                                        <div class="card-header bg-white">
                                            <i class="fa fa-table"></i> Broker Type List
                                        </div>
                                        <div class="card-body p-t-10">
                                            <div class=" m-t-25">
                                                <table class="table table-bordered" id="broker-type-data-table">
                                                    <thead>
                                                        <tr>
                                                            <th width="10%">S.N</th>
                                                            <th width="20%">Name</th>
                                                            <th width="40%">Description</th>
                                                            <th width="10%">Quick Display</th>
                                                            <th width="30%">Order</th>
                                                            <th width="10%">Action</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($broker_types as $key => $broker_type)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $broker_type->name }}</td>
                                                            <td>{{ $broker_type->description }}</td>
                                                            <td>{{ $broker_type->quick_display ? 'Yes': 'No' }}</td>
                                                            <td>{{ $broker_type->order }}</td>
                                                            <td>
                                                                <button class="btn btn-info" onclick="openForm('broker-type', {
                                                                    id: {{ $broker_type->id }},
                                                                    name: '{{ $broker_type->name }}',
                                                                    slug: '{{ $broker_type->slug }}',
                                                                    description: '{{ $broker_type->description }}',
                                                                    quick_display: '{{ $broker_type->quick_display }}',
                                                                    order: '{{ $broker_type->order }}'
                                                                })"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                                
                                                                <a onclick="
                                                                if(confirm('Are you sure?'))
                                                                {
                                                                    event.preventDefault();
                                                                    document.getElementById('broker-type-delete-form-{{ $broker_type->id }}').submit();
                                                                }
                                                                else{
                                                                    event.preventDefault();
                                                                }" href="{{ url('/admin/broker/parameter/broker-type/'.$broker_type->id) }}" class="btn btn-danger" id="{{$broker_type->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                <form id="broker-type-delete-form-{{ $broker_type->id }}" method="post" action="{{ url('/admin/broker/parameter/broker-type/'.$broker_type->id) }}" style="display: none">
                                                                    @csrf
                                                                    @method('DELETE')
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
                                <div class="tab-pane fade" id="payment-option" role="tabpanel" aria-labelledby="payment-option-tab">
                                <button type="button" class="btn btn-primary" style="margin-left:2%" onclick="openForm('payment-option')">Create</button>
                                
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Payment Option
                                    </div>
                                    <div class="card-body p-t-10">
                                        <div class=" m-t-25">
                                            <table class="table table-striped table-bordered table-hover " id="payment-option-data-table">
                                                <thead>
                                                <tr>
                                                    <th width="10%">S.N</th>
                                                    <th width="20%">Name</th>
                                                    <th width="40%">Description</th>
                                                    <th width="10%">Quick Display</th>
                                                    <th width="10%">Order</th>
                                                    <th width="15%">Action</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($payment_options as $key => $payment_option)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $payment_option->name }}</td>
                                                        <td>{{ $payment_option->description }}</td>
                                                        <td>{{ $payment_option->quick_display ? 'Yes': 'No' }}</td>
                                                        <td>{{ $payment_option->order }}</td>
                                                        <td>
                                                            <button class="btn btn-info" onclick="openForm('payment-option', {
                                                                id: {{ $payment_option->id }},
                                                                name: '{{ $payment_option->name }}',
                                                                slug: '{{ $payment_option->slug }}',
                                                                description: '{{ $payment_option->description }}',
                                                                quick_display: '{{ $payment_option->quick_display }}',
                                                                order: '{{ $payment_option->order }}'
                                                            })"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            
                                                            <a onclick="
                                                            if(confirm('Are you sure?'))
                                                            {
                                                                event.preventDefault();
                                                                document.getElementById('payment-option-delete-form-{{ $payment_option->id }}').submit();
                                                            }
                                                            else{
                                                                event.preventDefault();
                                                            }" href="{{ url('/admin/broker/parameter/payment-option/'.$payment_option->id) }}" class="btn btn-danger" id="{{$payment_option->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            <form id="payment-option-delete-form-{{ $payment_option->id }}" method="post" action="{{ url('/admin/broker/parameter/payment-option/'.$payment_option->id) }}" style="display: none">
                                                                @csrf
                                                                @method('DELETE')
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
                                <div class="tab-pane fade" id="regulatory-authority" role="tabpanel" aria-labelledby="regulatory-authority-tab">
                                <button type="button" class="btn btn-primary" style="margin-left:2%" onclick="openForm('regulatory-authority')">Create</button>
                                
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Regulatory Authority
                                    </div>
                                    <div class="card-body p-t-10">
                                        <div class=" m-t-25">
                                            <table class="table table-striped table-bordered table-hover " id="regulatory-authority-data-table">
                                                <thead>
                                                <tr>
                                                    <th width="10%">S.N</th>
                                                    <th width="20%">Name</th>
                                                    <th width="40%">Description</th>
                                                    <th width="10%">Quick Display</th>
                                                    <th width="10%">Order</th>
                                                    <th width="10%">Action</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($regulatory_authorities as $key => $regulatory_authority)
                                                    <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $regulatory_authority->name }}</td>
                                                    <td>{{ $regulatory_authority->description }}</td>
                                                    <td>{{ $regulatory_authority->quick_display ? 'Yes': 'No' }}</td>
                                                    <td>{{ $regulatory_authority->order }}</td>
                                                    <td>
                                                        <button class="btn btn-info" onclick="openForm('regulatory-authority', {
                                                            id: {{ $regulatory_authority->id }},
                                                            name: '{{ $regulatory_authority->name }}',
                                                            slug: '{{ $regulatory_authority->slug }}',
                                                            description: '{{ $regulatory_authority->description }}',
                                                            quick_display: '{{ $regulatory_authority->quick_display }}',
                                                            order: '{{ $regulatory_authority->order }}'
                                                        })"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                                        <a onclick="
                                                        if(confirm('Are you sure?'))
                                                        {
                                                            event.preventDefault();
                                                            document.getElementById('regulatory-authority-delete-form-{{ $regulatory_authority->id }}').submit();
                                                        }
                                                        else{
                                                            event.preventDefault();
                                                        }" href="{{ url('admin/broker/parameter/regulatory-authority/'.$regulatory_authority->id) }}" class="btn btn-danger" id="{{$regulatory_authority->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        <form id="regulatory-authority-delete-form-{{ $regulatory_authority->id }}" method="post" action="{{ url('admin/broker/parameter/regulatory-authority/'.$regulatory_authority->id) }}" style="display: none">
                                                            @csrf
                                                            @method('DELETE')
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
                                <div class="tab-pane fade" id="spread-type" role="tabpanel" aria-labelledby="spread-type-tab">
                                <button type="button" class="btn btn-primary" style="margin-left:2%" onclick="openForm('spread-type')">Create</button>
                                
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Spread Type
                                    </div>
                                    <div class="card-body p-t-10">
                                        <div class=" m-t-25">
                                            <table class="table table-striped table-bordered table-hover " id="spread-type-data-table">
                                            <thead>
                                                <tr>
                                                    <th width="10%">S.N</th>
                                                    <th width="20%">Name</th>
                                                    <th width="30%">Description</th>
                                                    <th width="30%">Quick Display</th>
                                                    <th width="30%">Order</th>
                                                    <th width="10%">Action</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($spread_types as $key => $spread_type)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $spread_type->name }}</td>
                                                        <td>{{ $spread_type->description }}</td>
                                                        <td>{{ $spread_type->quick_display ? 'Yes': 'No' }}</td>
                                                        <td>{{ $spread_type->order }}</td>
                                                        <td>
                                                            <button class="btn btn-info" onclick="openForm('spread-type', {
                                                                id: {{ $spread_type->id }},
                                                                name: '{{ $spread_type->name }}',
                                                                slug: '{{ $spread_type->slug }}',
                                                                description: '{{ $spread_type->description }}',
                                                                quick_display: '{{ $spread_type->quick_display }}',
                                                                order: '{{ $spread_type->order }}'
                                                            })"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            
                                                            <a onclick="
                                                            if(confirm('Are you sure?'))
                                                            {
                                                                event.preventDefault();
                                                                document.getElementById('spread-type-delete-form-{{ $spread_type->id }}').submit();
                                                            }
                                                            else{
                                                                event.preventDefault();
                                                            }" href="{{ url('admin/broker/parameter/spread-type/'.$spread_type->id) }}" class="btn btn-danger" id="{{$spread_type->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            <form id="spread-type-delete-form-{{ $spread_type->id }}" method="post" action="{{ url('admin/broker/parameter/spread-type/'.$spread_type->id) }}" style="display: none">
                                                                @csrf
                                                                @method('DELETE')
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
                                <div class="tab-pane fade" id="trading-instrument" role="tabpanel" aria-labelledby="trading-instrument-tab">
                                <button type="button" class="btn btn-primary" style="margin-left:2%" onclick="openForm('trading-instrument')">Create</button>
                                
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Trading Instrument
                                    </div>
                                    <div class="card-body p-t-10">
                                        <div class=" m-t-25">
                                            <table class="table table-striped table-bordered table-hover " id="trading-instrument-data-table">
                                                <thead>
                                                <tr>
                                                    <th width="10%">S.N</th>
                                                    <th width="20%">Name</th>
                                                    <th width="40%">Description</th>
                                                    <th width="10%">Quick Display</th>
                                                    <th width="10%">Order</th>
                                                    <th width="10%">Action</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($trading_instruments as $key => $trading_instrument)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $trading_instrument->name }}</td>
                                                        <td>{{ $trading_instrument->description }}</td>
                                                        <td>{{ $trading_instrument->quick_display ? 'Yes': 'No' }}</td>
                                                        <td>{{ $trading_instrument->order }}</td>
                                                        <td>
                                                            <button class="btn btn-info" onclick="openForm('trading-instrument', {
                                                                id: {{ $trading_instrument->id }},
                                                                name: '{{ $trading_instrument->name }}',
                                                                slug: '{{ $trading_instrument->slug }}',
                                                                description: '{{ $trading_instrument->description }}',
                                                                quick_display: '{{ $trading_instrument->quick_display }}',
                                                                order: '{{ $trading_instrument->order }}'
                                                            })"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            
                                                            <a onclick="
                                                            if(confirm('Are you sure?'))
                                                            {
                                                                event.preventDefault();
                                                                document.getElementById('trading-instrument-delete-form-{{ $trading_instrument->id }}').submit();
                                                            }
                                                            else{
                                                                event.preventDefault();
                                                            }" href="{{ url('admin/broker/parameter/trading-instrument/'.$trading_instrument->id) }}" class="btn btn-danger" id="{{$trading_instrument->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            <form id="trading-instrument-delete-form-{{ $trading_instrument->id }}" method="post" action="{{ url('admin/broker/parameter/trading-instrument/'.$trading_instrument->id) }}" style="display: none">
                                                                @csrf
                                                                @method('DELETE')
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
                                <div class="tab-pane fade" id="trading-platform" role="tabpanel" aria-labelledby="trading-platform-tab">
                                <button type="button" class="btn btn-primary" style="margin-left:2%" onclick="openForm('trading-platform')">Create</button>
                                
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Trading Platform
                                    </div>
                                    <div class="card-body p-t-10">
                                        <div class=" m-t-25">
                                            <table class="table table-striped table-bordered table-hover " id="trading-platform-data-table">
                                            <thead>
                                                <tr>
                                                    <th width="10%">S.N</th>
                                                    <th width="20%">Name</th>
                                                    <th width="40%">Description</th>
                                                    <th width="10%">Quick Display</th>
                                                    <th width="10%">Order</th>
                                                    <th width="10%">Action</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($trading_platforms as $key => $trading_platform)
                                                    <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $trading_platform->name }}</td>
                                                    <td width="40%">{{ $trading_platform->description }}</td>
                                                    <td>{{ $trading_platform->quick_display ? 'Yes': 'No' }}</td>
                                                    <td>{{ $trading_platform->order }}</td>
                                                    <td>
                                                        <button class="btn btn-info" onclick="openForm('trading-platform', {
                                                            id: {{ $trading_platform->id }},
                                                            name: '{{ $trading_platform->name }}',
                                                            slug: '{{ $trading_platform->slug }}',
                                                            description: '{{ $trading_platform->description }}',
                                                            quick_display: '{{ $trading_platform->quick_display }}',
                                                            order: '{{ $trading_platform->order }}'
                                                        })"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        
                                                        <a onclick="
                                                        if(confirm('Are you sure?'))
                                                        {
                                                            event.preventDefault();
                                                            document.getElementById('trading-platform-delete-form-{{ $trading_platform->id }}').submit();
                                                        }
                                                        else{
                                                            event.preventDefault();
                                                        }" href="{{ url('admin/broker/parameter/trading-platform/'.$trading_platform->id) }}" class="btn btn-danger" id="{{$trading_platform->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        <form id="trading-platform-delete-form-{{ $trading_platform->id }}" method="post" action="{{ url('admin/broker/parameter/trading-platform/'.$trading_platform->id) }}" style="display: none">
                                                            @csrf
                                                            @method('DELETE')
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
                                <div class="tab-pane fade" id="country" role="tabpanel" aria-labelledby="country-tab">
                                    <div class="card m-t-35">
                                        <div class="card-header bg-white">
                                            <i class="fa fa-table"></i> Country
                                        </div>
                                        <div class="card-body p-t-10">
                                            <div class=" m-t-25">
                                                <form id="country-parameter-form" action="{{ url('admin/broker/parameter/country') }}" method="POST">
                                                @csrf
                                                    <table class="table table-striped table-bordered table-hover " id="country-data-table">
                                                        <thead>
                                                            <tr>
                                                            <th width="10%">S.N</th>
                                                                <th width="20%">Name</th>
                                                                <th width="30%">Enable Search</th>
                                                                <th width="30%">Quick Display</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($countries as $key => $country)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $country->name }}</td>
                                                                <td>
                                                                    <div class="checkbox">
                                                                        <label class="text-primary">
                                                                            <input type="checkbox" {{ !is_null($country->parameter) ? "checked" : "" }}
                                                                                name="enable_search[{{ $country->code }}]" 
                                                                                value="1"/>
                                                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="checkbox">
                                                                        <label class="text-primary">
                                                                            <input type="checkbox" {{ !is_null($country->parameter) && $country->parameter->quick_display ? "checked" : "" }}
                                                                                name="quick_display[{{ $country->code }}]" 
                                                                                value="1" />
                                                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <!-- Broker Parameter Modal -->
        <div class="modal fade" id="create-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form" action="#" method="POST">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title pull-left" id="title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control" placeholder="Write name here" required />
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control form-control" placeholder="slug will generate" required />
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Write description here"></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <label for="description">Quick Display</label>
                                <div class="checkbox">
                                    <label class="text-primary">
                                        <input type="checkbox" value="1" id="quick_display" name="quick_display">
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    </label>
                                </div>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="text" name="order" id="order" class="form-control" placeholder="Order number"/>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        String.prototype.replaceAll = function(search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };

        $(document).ready(function() {

            $("#name").keyup(function() {
                let slug;
                slug = $(this).val().trim().replaceAll(/[\s//]+/, '-').toLowerCase();
                $("#slug").val(slug);
            });

            $('#broker-type-data-table').DataTable();
            $('#payment-option-data-table').DataTable();
            $('#regulatory-authority-data-table').DataTable();
            $('#spread-type-data-table').DataTable();
            $('#trading-instrument-data-table').DataTable();
            $('#trading-platform-data-table').DataTable();
            
        })

        function openForm(type, data)
            {
                
                var json = {id: false, type: type, title: 'Create ' + type, name: "", slug: "", description: "", quick_display: 0, order: 0}
                if(typeof data !== 'undefined') {
                    json.id             = data.id
                    json.title          = "Edit " + type
                    json.name           = data.name
                    json.slug           = data.slug
                    json.description    = data.description
                    json.quick_display  = data.quick_display
                    json.order          = data.order
                }
            
                updateForm(json)
                
                $("#create-modal").modal('show');
            }

            function updateForm(data)
            {
                console.log(data)
                $("#title").text(data.title.replace('-', ' ').toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                }));
                $("#name").val(data.name);
                $("#slug").val(data.slug);
                $("#description").val(data.description);
                $( "#quick_display" ).prop( "checked", false );
                if(data.quick_display) {
                    $( "#quick_display" ).prop( "checked", true );
                }
                $("#order").val(data.order);
                if(data.id === false) {
                    $("#form").attr("action", "/admin/broker/parameter/" + data.type)
                } else {
                    $("#form").attr("action", "/admin/broker/parameter/" + data.type+"/"+data.id)
                }
            }
    </script>
@endsection