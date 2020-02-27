@extends('admin.layouts.default')

@section('title', 'Create Broker')

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
    
    
@endsection

@section('footer_scripts')

    <script>
        function preview_logo(event)
        {
            var reader = new FileReader();
            reader.onload = function ()
            {
                var output = document.getElementById('prev-logo');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_screenshot(event)
        {
            var reader = new FileReader();
            reader.onload = function ()
            {
                var output = document.getElementById('prev-screenshot');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
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
                            <a href="{{url('/admin/manage/brokers')}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Broker List
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Create Broker
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
        <div class="outer">
            <div class="inner bg-container">
                <!-- /.row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-t-35">
                        @if(Session::get('message'))
                            <h4 class="alert alert-success" style="text-align: center;">{{ Session::get('message') }}</h4>
                        @endif
                        
                            <div class="card-header bg-white">
                                <a href="{{ url('admin/manage/brokers') }}" class="btn btn-danger">Back</a>
                            </div>
                            <div class="card-body m-t-35">
                                <form action="{{ url('/admin/broker/save') }}" method="post" name="brokerCreate" class="form-horizontal login_validator" id="form_inline_validator" onsubmit = "return(validate());" enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="text-center" style="background-color:darkturquoise; color:white;">Company Information</h2><br/>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="logo" class="col-form-label">Broker Logo *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <img src="" id="prev-logo" height="100" width="100">
                                            <input type="file" name="logo" onchange="preview_logo(event)" id="logo" class="form-control">
                                            <span style="color: red"> {{ $errors->has('logo') ? $errors->first('logo') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="screen_shot" class="col-form-label">Broker ScreenShot *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <img src="" id="prev-screenshot" height="100" width="100">
                                            <input type="file" name="screenshot" onchange="preview_screenshot(event)" id="screenshot" class="form-control">
                                            <span style="color: red"> {{ $errors->has('screenshot') ? $errors->first('screenshot') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="name" class="col-form-label">Broker Name *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="BROKER NAME" >
                                            <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                            <span id="error_name" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="country" class="col-form-label">Country *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <select class="form-control" name="country_code" id="country">
                                                <option disabled selected>Select a Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->code }}" {{ old('country_code') && old('country_code') == $country->code ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red"> {{ $errors->has('country_code') ? $errors->first('country_code') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="website_url" class="col-form-label">Website Url *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="website_url" class="form-control" name="website_url" value="{{ old('website_url') }}" placeholder="WEBSITE URL" />
                                            <span style="color: red"> {{ $errors->has('website_url') ? $errors->first('website_url') : ' ' }}</span>
                                            <span id="error_website_url" style="color: red"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="website_title" class="col-form-label">Website Title *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="website_title" class="form-control" name="website_title" value="{{ old('website_title') }}" placeholder="WEBSITE TITLE" />
                                            <span style="color: red"> {{ $errors->has('website_title') ? $errors->first('website_title') : ' ' }}</span>
                                            <span id="error_website_title" style="color: red"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="headquarter" class="col-form-label">Headquartered In *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="headquarter" name="headquarter" class="form-control" value="{{ old('headquarter') }}" placeholder="HEADQUATERED IN" >
                                            <span style="color: red"> {{ $errors->has('headquarter') ? $errors->first('headquarter') : ' ' }}</span>
                                            <span id="error_headquarter" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="founded_in" class="col-form-label">Founded In *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="founded_in" name="founded_in" class="form-control" value="{{ old('founded_in') }}" placeholder="FOUNDED IN" >
                                            <span style="color: red"> {{ $errors->has('founded_in') ? $errors->first('founded_in') : ' ' }}</span>
                                            <span id="error_founded_in" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="order" class="col-form-label">Order </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="number" id="order" name="order" value="0" class="form-control" value="{{ old('order') }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="regulating_authority" class="col-form-label">Regulating Authority </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <select multiple class="form-control chzn-select" name="regulating_authority[]" id="regulating_authority" >
                                                <option value="" disabled>Select a Regulating Authority</option>
                                                @foreach ($regulatory_authorities as $regulatory_authority)
                                                <option value="{{ $regulatory_authority->id }}" {{ old('regulating_authority') && old('regulating_authority') == $regulatory_authority->id ? 'selected' : '' }}>{{ $regulatory_authority->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red"> {{ $errors->has('regulating_authority') ? $errors->first('regulating_authority') : ' ' }}</span>
                                            <span id="error_regulating_authority" style="color: red"></span>
                                        </div>
                                    </div>
                                    
                                    <!-- Switch start -->
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="us_client" class="col-form-label">Us Client Accepted </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" @if(old('us_client') && old(1,'us_client')) checked @endif name="us_client">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="us_client" class="col-form-label">Verified Broker </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="verified" @if(old('verified') && old(1,'verified')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="premium" class="col-form-label">Premium Broker </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="premium" @if(old('premium') && old(1,'premium')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="carousel" class="col-form-label">Show in Carousel </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="carousel" @if(old('carousel') && old(1,'carousel')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Switch End -->
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="broker_status" class="col-form-label">Broker Status </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="broker_status" name="broker_status" class="form-control" value="{{ old('broker_status') }}" placeholder="BROKER STATUS" >
                                            <span style="color: red"> {{ $errors->has('broker_status') ? $errors->first('broker_status') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="broker_type" class="col-form-label">Broker type </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <select multiple class="form-control chzn-select" name="broker_type[]" id="broker_type" >
                                                <option value="" disabled>Select a Broker type</option>
                                            @foreach ($broker_types as $broker_type)
                                                <option value="{{ $broker_type->id }}" {{ old('broker_type') && in_array($broker_type->id, old('broker_type')) ? 'selected' : '' }}>{{ $broker_type->name }}</option>
                                            @endforeach
                                            </select>
                                            <span style="color: red"> {{ $errors->has('broker_type') ? $errors->first('broker_type') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="telephone" class="col-form-label">Telephone Number </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" class="form-control" placeholder="TELEPHONE NUMBER" >
                                            <span style="color: red"> {{ $errors->has('telephone') ? $errors->first('telephone') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="fax" class="col-form-label">Fax Number </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="fax" name="fax" value="{{ old('fax') }}" class="form-control" placeholder="FAX NUMBER" >
                                            <span style="color: red"> {{ $errors->has('fax') ? $errors->first('fax') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="email_support" class="col-form-label">Email Support </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="email" id="email_support" name="email_support" value="{{ old('email_support') }}" class="form-control" placeholder="SUPPORT EMAIL ADDRESS" >
                                            <span style="color: red"> {{ $errors->has('email_support') ? $errors->first('email_support') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="international_office" class="col-form-label">International Office </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="international_office" name="international_office" value="{{ old('international_office') }}" class="form-control" placeholder="INTERNATIONAL OFFICE" >
                                            <span style="color: red"> {{ $errors->has('international_office') ? $errors->first('international_office') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="web_language" class="col-form-label">Web Site Language </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="web_language" name="web_language" value="{{ old('web_language') }}" class="form-control" placeholder="WEBSITE LANGUAGE" >
                                            <span style="color: red"> {{ $errors->has('web_language') ? $errors->first('web_language') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="signup_link" class="col-form-label">Sign Up Link </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="signup_link" name="signup_link" value="{{ old('web_language') }}" class="form-control" placeholder="SIGN UP LINK" >
                                            <span style="color: red"> {{ $errors->has('signup_link') ? $errors->first('signup_link') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Account Information -->

                                    <h2 class="text-center" style="background-color:crimson; color:white;">Account Information</h2><br/>
                                    
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="demo_account" class="col-form-label">Free Demo Account </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="demo_account" @if(old('demo_account') && old(1,'demo_account')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="demo_acc_link" class="col-form-label">Demo Account Link </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="demo_acc_link" name="demo_acc_link" value="{{ old('demo_acc_link') }}" class="form-control" placeholder="DEMO ACCOUNT LINK" >
                                            <span style="color: red"> {{ $errors->has('demo_acc_link') ? $errors->first('demo_acc_link') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="real_acc_link" class="col-form-label">Real Account Link </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="real_acc_link" name="real_acc_link" value="{{ old('real_acc_link') }}" class="form-control" placeholder="REAL ACCOUNT LINK" >
                                            <span style="color: red"> {{ $errors->has('real_acc_link') ? $errors->first('real_acc_link') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="min_deposit" class="col-form-label">Minimum Deposit *</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="min_deposit" name="min_deposit" value="{{ old('min_deposit') }}" class="form-control" placeholder="MINIMUM DEPOSIT" >
                                            <span style="color: red"> {{ $errors->has('min_deposit') ? $errors->first('min_deposit') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="ecn_deposit" class="col-form-label">Ecn Deposit </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="ecn_deposit" @if(old('ecn_deposit') && old(1,'ecn_deposit')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <span style="color: red"> {{ $errors->has('ecn_deposit') ? $errors->first('ecn_deposit') : ' ' }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="ecn_deposit_amount" class="col-form-label">Ecn Deposit Amount </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="ecn_deposit_amount" name="ecn_deposit_amount" value="{{ old('ecn_deposit_amount') }}" class="form-control" placeholder="ENC DEPOSIT AMOUNT" >
                                            <span style="color: red"> {{ $errors->has('ecn_deposit_amount') ? $errors->first('ecn_deposit_amount') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="acc_currency" class="col-form-label">Account Currancy </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="acc_currency" name="acc_currency" value="{{ old('acc_currency') }}" class="form-control" placeholder="ACCOUNT CURRENCY" >
                                            <span style="color: red"> {{ $errors->has('acc_currency') ? $errors->first('acc_currency') : ' ' }}</span>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="min_leverage" class="col-form-label">Minimum Leverage </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="min_leverage" name="min_leverage" value="{{ old('min_leverage') }}" class="form-control">
                                            <span style="color: red"> {{ $errors->has('min_leverage') ? $errors->first('min_leverage') : ' ' }}</span>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="min_leverage" class="col-form-label">Maximum Leverage </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="max_leverage" name="max_leverage" value="{{ old('max_leverage') }}" class="form-control" placeholder="MAXIMUM LEVERAGE" >
                                            <span style="color: red"> {{ $errors->has('max_leverage') ? $errors->first('max_leverage') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="min_order_vol" class="col-form-label">Minimum Order Vol. </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="min_order_vol" name="min_order_vol" value="{{ old('min_order_vol') }}" class="form-control" placeholder="MINIMUM ORDER VALUE">
                                            <span style="color: red"> {{ $errors->has('min_order_vol') ? $errors->first('min_order_vol') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="segregeted_acc" class="col-form-label">SEGREGATED ACCOUNT </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="segregeted_acc" @if(old('segregeted_acc') && old(1,'segregeted_acc')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="islamic_acc" class="col-form-label">ISLAMIC ACCOUNT </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="islamic_acc" @if(old('islamic_acc') && old(1,'islamic_acc')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="institutional_acc" class="col-form-label">INSTITUTIONAL ACCOUNT </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="institutional_acc" @if(old('institutional_acc') && old(1,'institutional_acc')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="vip_service" class="col-form-label">VIP SERVICE </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="vip_service" @if(old('vip_service') && old(1,'vip_service')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="pamm_mam" class="col-form-label">PAMM / MAM ACCOUN </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <select multiple class="form-control chzn-select" name="pamm_mam[]" id="pamm_mam">
                                                <option value="" disabled>No PAMM-MAM</option>
                                                @foreach ($pamm_mams as $pamm_mam)
                                                    <option value="{{ $pamm_mam->id }}" {{ old('pamm_mam') && in_array($pamm_mam->id, old('pamm_mam')) ? 'selected' : '' }}>{{ $pamm_mam->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red"> {{ $errors->has('pamm_mam') ? $errors->first('pamm_mam') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="deposit_option" class="col-form-label">DEPOSIT OPTION </label>
                                        </div>
                                        <div class="col-xl-4">
                                        <select size="3" multiple class="form-control chzn-select" name="deposit_option[]" id="deposit_option"
                                            name="test_me_form" tabindex="8">
                                                <option value="" disabled>Select a Deposit option</option>
                                            @foreach ($payment_options as $payment_option)
                                                <option value="{{ $payment_option->id }}" {{ old('deposit_option') && in_array($payment_option->id, old('deposit_option')) ? 'selected' : '' }}>{{ $payment_option->name }}</option>
                                            @endforeach
                                        </select>
                                            <span style="color: red"> {{ $errors->has('deposit_option') ? $errors->first('deposit_option') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="withdraw_option" class="col-form-label">WITHDRAWAL OPTION </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <select size="3" multiple class="form-control chzn-select" name="withdraw_option[]" id="withdraw_option" name="test_me_form" tabindex="8">
                                                <option value="" disabled>WITHDRAWAL OPTION</option>
                                                @foreach ($payment_options as $payment_option)
                                                <option value="{{ $payment_option->id }}" {{ old('withdraw_option') && in_array($payment_option->id, old('withdraw_option')) ? 'selected' : '' }}>{{ $payment_option->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red"> {{ $errors->has('withdraw_option') ? $errors->first('withdraw_option') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <!--Trading Trems  -->
                                    <h2 class="text-center" style="background-color:green; color:white;">TRADING TERMS</h2><br/>
                                    
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="interest_margin" class="col-form-label">INTEREST ON MARGIN </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="interest_margin" @if(old('interest_margin') && old(1,'interest_margin')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="os_compatibility" class="col-form-label">OS COMPATIBILITY </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="os_compatibility" name="os_compatibility" value="{{ old('os_compatibility') }}" class="form-control" placeholder="OS COMPATIBILITY" >
                                            <span style="color: red"> {{ $errors->has('os_compatibility') ? $errors->first('os_compatibility') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="news_feed_stream" class="col-form-label">STREAMING NEWS FEED </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="news_feed_stream" @if(old('news_feed_stream') && old(1,'news_feed_stream')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="charting_pack" class="col-form-label">CHARTING PACKAGE </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="charting_pack" @if(old('charting_pack') && old(1,'charting_pack')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trading_signal" class="col-form-label">TRADING SIGNAL </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="trading_signal" @if(old('trading_signal') && old(1,'trading_signal')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="market_commentary" class="col-form-label">MARKET COMMENTARY </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="market_commentary" @if(old('market_commentary') && old(1,'market_commentary')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trading_platform" class="col-form-label">TRADING PLATFORM </label>
                                        </div>
                                        <div class="col-xl-4">
                                        <select size="3" multiple class="form-control chzn-select" name="trading_platform[]" id="trading_platform" tabindex="8" >
                                            <option value="" disabled>TRADING PLATFORM</option>
                                            @foreach ($trading_platforms as $trading_platform)
                                            <option value="{{ $trading_platform->id }}" {{ old('trading_platform') && in_array($trading_platform->id, old('trading_platform')) ? 'selected' : '' }}>{{ $trading_platform->name }}</option>
                                            @endforeach
                                        </select>
                                            <span style="color: red"> {{ $errors->has('trading_platform') ? $errors->first('trading_platform') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="precision_pricing" class="col-form-label">PRECISION PRICING </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="precision_pricing" name="precision_pricing" value="{{ old('precision_pricing') }}" class="form-control" placeholder="PRECISION PRICING" >
                                            <span style="color: red"> {{ $errors->has('precision_pricing') ? $errors->first('precision_pricing') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="spread_type" class="col-form-label">TYPE OF SPREAD </label>
                                        </div>
                                        <div class="col-xl-4">
                                        <select size="3" multiple class="form-control chzn-select" name="spread_type[]" id="spread_type" tabindex="8" >
                                            <option value="" disabled>TYPE OF SPREAD</option>
                                            @foreach ($spread_types as $spread_type)
                                            <option value="{{ $spread_type->id }}" {{ old('spread_type') && in_array($spread_type->id, old('spread_type')) ? 'selected' : '' }}>{{ $spread_type->name }}</option>
                                            @endforeach
                                        </select>
                                            <span style="color: red"> {{ $errors->has('spread_type') ? $errors->first('spread_type') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="commission" class="col-form-label">COMMISSION </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="commission" @if(old('commission') && old(1,'commission')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="commission_amount" class="col-form-label">Commission Amount </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="commission_amount" name="commission_amount" value="{{ old('commission_amount') }}" class="form-control" placeholder="Commission Ammount" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="scalping" class="col-form-label">SCALPING </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="scalping" @if(old('scalping') && old(1,'scalping')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <span style="color: red"> {{ $errors->has('scalping') ? $errors->first('scalping') : ' ' }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="hedging" class="col-form-label">HEDGING </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="hedging" @if(old('hedging') && old(1,'hedging')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <span style="color: red"> {{ $errors->has('hedging') ? $errors->first('hedging') : ' ' }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="expert_advisors" class="col-form-label">EXPERT ADVISORS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="expert_advisors" @if(old('expert_advisors') && old(1,'expert_advisors')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <span style="color: red"> {{ $errors->has('expert_advisors') ? $errors->first('expert_advisors') : ' ' }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="lowest_spread" class="col-form-label">LOWEST SPREAD </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="lowest_spread" name="lowest_spread" value="{{ old('lowest_spread') }}" class="form-control" placeholder="LOWEST SPREAD" >
                                            <span style="color: red"> {{ $errors->has('lowest_spread') ? $errors->first('lowest_spread') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trading_instrument" class="col-form-label">TRADING INSTRUMENTS </label>
                                        </div>
                                        <div class="col-xl-4">
                                        <select size="3" multiple class="form-control chzn-select" name="trading_instrument[]" id="trading_instrument" tabindex="8" >
                                            <option value="" disabled>TRADING INSTRUMENTS</option>
                                            @foreach ($trading_instruments as $trading_instrument)
                                            <option value="{{ $trading_instrument->id }}" {{ old('trading_instrument') && in_array($trading_instrument->id, old('trading_instrument')) ? 'selected' : '' }}>{{ $trading_instrument->name }}</option>
                                            @endforeach
                                        <span style="color: red"> {{ $errors->has('trading_instrument') ? $errors->first('trading_instrument') : ' ' }}</span>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="one_click_execution" class="col-form-label">ONE CLICK EXECUTION </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="one_click_execution" @if(old('one_click_execution') && old(1,'one_click_execution')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="oco_orders" class="col-form-label">OCO ORDERS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="oco_orders" @if(old('oco_orders') && old(1,'oco_orders')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="managed_acc" class="col-form-label">MANAGED ACCOUNT </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="managed_acc" @if(old('managed_acc') && old(1,'managed_acc')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="email_alerts" class="col-form-label">EMAIL ALERTS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="email_alerts" @if(old('email_alerts') && old(1,'email_alerts')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="mobile_alerts" class="col-form-label">Mobile Alert </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="mobile_alerts" @if(old('mobile_alerts') && old(1,'mobile_alerts')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trailing_stops" class="col-form-label">TRAILING STOPS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="trailing_stops" @if(old('trailing_stops') && old(1,'trailing_stops')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="mobile_trading" class="col-form-label">MOBILE TRADING </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="mobile_trading" @if(old('mobile_trading') && old(1,'mobile_trading')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="web_based_trading" class="col-form-label">WEB BASED TRADING </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="web_based_trading" @if(old('web_based_trading') && old(1,'web_based_trading')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Promotion -->
                                    <h2 class="text-center" style="background-color:orangered; color:white;">Promotion</h2><br/>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trading_tools" class="col-form-label">TRADING TOOLS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="trading_tools" @if(old('trading_tools') && old(1,'trading_tools')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="other_promotion" class="col-form-label">OTHER PROMOTION </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="other_promotion" @if(old('other_promotion') && old(1,'other_promotion')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="other_promotion_text" class="col-form-label">OTHER PROMOTION TEXT </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="other_promotion_text" name="other_promotion_text" value="{{ old('other_promotion_text') }}" class="form-control" placeholder="OTHER PROMOTION TEXT" >
                                            <span style="color: red"> {{ $errors->has('other_promotion_text') ? $errors->first('other_promotion_text') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trade_close_over_phone" class="col-form-label">CLOSE TRADE OVER THE PHONE </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="trade_close_over_phone" @if(old('trade_close_over_phone') && old(1,'trade_close_over_phone')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="deposit_bonus" class="col-form-label">DEPOSIT BONUS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="deposit_bonus" @if(old('deposit_bonus') && old(1,'deposit_bonus')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="first_deposite_bonus" class="col-form-label">BONUS FOR FIRST DEPOSIT</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="first_deposite_bonus" @if(old('first_deposite_bonus') && old(1,'first_deposite_bonus')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="free_vps" class="col-form-label">FREE VPS</label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="free_vps" @if(old('free_vps') && old(1,'free_vps')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- customer Support -->
                                    <h2 class="text-center" style="background-color:goldenrod; color:white;">Customer Support</h2><br/>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="customer_service_time" class="col-form-label">CUSTOMER SERVICE HOURS </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="customer_service_time" name="customer_service_time" value="{{ old('customer_service_time') }}" class="form-control" placeholder="CUSTOMER SERVICE HOURS"/>
                                            <span style="color: red"> {{ $errors->has('customer_service_time') ? $errors->first('customer_service_time') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="trade_over_phone" class="col-form-label">PLACE TRADES OVER THE PHONE </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="trade_over_phone" @if(old('trade_over_phone') && old(1,'trade_over_phone')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="customer_support_lang" class="col-form-label">CUSTOMER SUPPORT LANG </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" id="customer_support_lang" name="customer_support_lang" value="{{ old('customer_support_lang') }}" class="form-control" placeholder="CUSTOMER SUPPORT LANG" >
                                            <span style="color: red"> {{ $errors->has('customer_support_lang') ? $errors->first('customer_support_lang') : ' ' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="email_phone_support" class="col-form-label">EMAIL+PHONE SUPPORT </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="email_phone_support" @if(old('email_phone_support') && old(1,'email_phone_support')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right">
                                            <label for="personal_acc_manager" class="col-form-label">PERSONAL ACCOUNT MANAGER </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="checkbox">
                                                <label class="text-primary">
                                                    <input type="checkbox" value="1" name="personal_acc_manager" @if(old('personal_acc_manager') && old(1,'personal_acc_manager')) checked @endif >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="form-group row">
                                        <div class="col-xl-4 text-xl-right"></div>
                                        <div id="state" style="color: red;"></div>
                                        <div class="col-xl-4">
                                            <input type="submit" value="Save" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                    <!-- / .Submit Button-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.inner -->
        </div>
         <!-- /.outer -->

        
    
@endsection