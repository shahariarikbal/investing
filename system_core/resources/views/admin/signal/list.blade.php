@extends('admin.layouts.default')

@section('title', 'Signals')

@section('signal-container-active', 'active')
@section('signal-show', 'show')
@section('signal-active', 'active')

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

    <!-- Date time picker-->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/datetimepicker/css/DateTimePicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/vendors/j_timepicker/css/jquery.timepicker.css') }}"/>
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('/admin/css/pages/tables.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/radio_checkbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/lib/flatpickr.min.css') }}" />
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
    <link rel="stylesheet" href="{{ asset('/css/lib/flag-icon.min.css') }}">

    <link rel="stylesheet" href="css/pages/form_elements.css"/>
@endsection

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.js"></script>

    <!--add currency preview image-->
    <script>
        function preview_signal(event)
        {
            var reader = new FileReader();
            reader.onload = function ()
            {
                var output = document.getElementById('prev');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <!--edit currency preview image-->
    <script>
        function edit_priv_signal(event)
        {
            var reader = new FileReader();
            reader.onload = function ()
            {
                var output = document.getElementById('edit_prev');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>



    <script>

        function freeNPremiumChecked () {
            
            document.getElementById('free').checked = false
            document.getElementById('premium').checked = false
            document.getElementById('edit_free').checked = false
            document.getElementById('edit_premium').checked = false

            if (document.getElementById('all_member').checked) {
                document.getElementById('free').checked = true
                document.getElementById('premium').checked = true
            }

            if (document.getElementById('edit_all_member').checked) {
                document.getElementById('edit_free').checked = true
                document.getElementById('edit_premium').checked = true
            }
        }

        var error = 0;

        function validate() {
            if (document.getElementById('category_id').value == "") {
                document.getElementById("category_error").innerHTML = "Please select your Category";
                error++
            }

            if (document.getElementById('currency_id').value == "") {
                document.getElementById("currency_error").innerHTML = "Please select your Currency";
                error++
            }

            
            if (document.querySelector("input[name='type']") == "") {
                document.getElementById("type_error").innerHTML = "Please select your Type";
                error++
            }

            if (document.getElementById('signal_time').value == "") {
                document.getElementById("signal_time_error").innerHTML = "Please select Signal Time";
                error++
            }

            // if (document.getElementById('valid_till').value == "") {
            //     document.getElementById("valid_time_error").innerHTML = "Please select Valid Time";
            //     error++
            // }

            if (document.getElementById('price').value == "") {
                document.getElementById("price_error").innerHTML = "Please Write Your Price";
                error++
            }

            if (document.getElementById('take_profit').value == "") {
                document.getElementById("take_profit_error").innerHTML = "Please Write Your Take Profit";
                error++
            }

            if (document.getElementById('stop_loss').value == "") {
                document.getElementById("stop_loss_error").innerHTML = "Please Write Your Stop loss";
                error++
            }
        }

        function reset_error() {
            error = 0
            document.getElementById("category_error").innerHTML = "";
            document.getElementById("currency_error").innerHTML = "";
            document.getElementById("type_error").innerHTML = "";
            document.getElementById("signal_time_error").innerHTML = "";
            document.getElementById("valid_time_error").innerHTML = "";
            document.getElementById("price_error").innerHTML = "";
            document.getElementById("stop_loss_error").innerHTML = "";
        }
        /*Save signal*/
        document.getElementById('saveSignal').addEventListener('click', function(e) {
            reset_error();
            validate()

            let data = new FormData()
            if (document.getElementById("attachment").files.length > 0) {
                let attachment = document.getElementById("attachment").files[0]
                data.append('attachment', attachment, attachment.name)
            }
            data.append('category_id', document.getElementById('category_id').value)
            data.append('currency_id', document.getElementById('currency_id').value)
            data.append('type', document.querySelector('input[name="type"]:checked').value)
            data.append('signal_time', new Date(document.getElementById('signal_time').value).toUTCString())
            data.append('price', document.getElementById('price').value)
            data.append('take_profit', document.getElementById('take_profit').value)
            data.append('stop_loss', document.getElementById('stop_loss').value)

            if (document.getElementById('valid_till').value !== "") {
                data.append('valid_till', new Date(document.getElementById('valid_till').value).toUTCString())
            } else {
                data.append('valid_till', '')
            }

            // data.append('valid_till', new Date(document.getElementById('valid_till').value).toUTCString())
            data.append('notes', document.getElementById('notes').value)

            let premium = 0
            if (document.querySelector("input[name='premium']:checked")) {
                premium = document.querySelector("input[name='premium']:checked").value
            }
            data.append('premium', premium)
            
            let free = 0
            if (document.querySelector("input[name='free']:checked")) {
                free = document.querySelector("input[name='free']:checked").value
            }
            data.append('free', free)

            data.append('package_id', $('#package_id').val())

            if (error === 0 ) {
                // initialize loading effect
                var height = parseInt(document.getElementById('signal').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('signal-loading').setAttribute('style', loadingStyle)

                let settings = { headers: { 'content-type': 'multipart/form-data' } }

                axios.post('/admin/signal', data, settings)
                .then(function (response) {
                        document.getElementById('signal-loading').setAttribute('style', 'display: none')
                        if(response.status === 201){
                            //alert('Signal Add Succesfully Done');
                            $('.addSignalModal').modal('hide');
                            window.location.reload()
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)
                        }
                })
                .catch(function (error) {
                    //console.log(error);
                    
                    if(error.response.status === 422){
                        //console.log(error.response.data);
                        document.getElementById('signal-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-danger")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Something is wrong, please try again')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("error_message").appendChild(div)

                        if(error.response.data.take_profit && error.response.data.take_profit.length > 0){
                            //console.log(error.response.data.signal_time)
                            document.getElementById("take_profit_error").innerHTML = error.response.data.take_profit[0]
                        }

                        if(error.response.data.stop_loss && error.response.data.stop_loss.length > 0){
                            //console.log(error.response.data.signal_time)
                            document.getElementById("stop_loss_error").innerHTML = error.response.data.stop_loss[0]
                        }

                        if(error.response.data.price && error.response.data.price.length > 0){
                            //console.log(error.response.data.price)
                            document.getElementById("price_error").innerHTML = error.response.data.price[0]
                        }
                    }
                });
            }

        })

        /*Edit signal*/


        function signalEdit(el) {

            axios.get('/admin/signal/edit/'+el.getAttribute('data-id'))
                .then(function (response) {
                
                    document.getElementById('signalId').value = el.getAttribute('data-id')
                    document.getElementById("edit_category_id").value = response.data.category_id
                    $('#edit_category_id').select2().trigger('change')
                    document.getElementById("edit_currency_id").selectedIndex = response.data.currency_id
                    $('#edit_currency_id').select2().trigger('change')
                    document.getElementById('edit_signal_time').value = moment.utc(response.data.signal_time).local().format('YYYY-MM-DD HH:mm:ss')
                    document.getElementById('edit_valid_till').value = moment.utc(response.data.valid_till).local().format('YYYY-MM-DD HH:mm:ss')
                    document.getElementById('edit_price').value = response.data.price
                    document.getElementById('edit_take_profit').value = response.data.take_profit

                    if(response.data.attachment) {
                        $("#edit_prev").attr("src", InvestingPartner.app_url + "/signal/images/" + response.data.attachment)
                    }
                    else {
                        $("#edit_prev").attr("src", InvestingPartner.app_url + "/signal/images/default.jpg")
                    }

                    document.getElementById('edit_stop_loss').value = response.data.stop_loss
                    document.getElementById('edit_notes').value = response.data.notes

                    document.getElementById('edit_' + response.data.type).setAttribute('checked', true)

                    if(response.data.free == 1 && response.data.premium == 1){
                        document.getElementById('edit_all_member').checked = true
                    }
                    
                    if(response.data.free == 1){
                        document.getElementById('edit_free').checked = true
                    }

                    if(response.data.premium == 0){
                        document.getElementById('edit_free').checked = false
                    }

                    if(response.data.premium == 1){
                        document.getElementById('edit_premium').checked = true
                    }

                    if(response.data.premium == 0){
                        document.getElementById('edit_premium').checked = false
                    }
                    
                    let packages = response.data.package_id
                    if (response.data.package_id.indexOf(',') !== -1) {
                        packages = response.data.package_id.split(',')
                    } else {
                        packages.push(packages)
                    }
                    $('#edit_package_id').val(packages)
                    $('#edit_package_id').select2().trigger('change')

                })

                .catch(function (error) {
                    console.log(error);
                });
        }

        /*Update signal*/
        var edit_error = 0;

        function edit_validate_error() {
            if (document.getElementById('edit_category_id').value == "") {
                document.getElementById("edit_category_error").innerHTML = "Please select your Category";
                edit_error++
            }

            if (document.getElementById('edit_currency_id').value == "") {
                document.getElementById("edit_currency_error").innerHTML = "Please select your Currency";
                edit_error++
            }

            if (document.getElementById('edit_type').value == "") {
                document.getElementById("edit_type_error").innerHTML = "Please select your Type";
                edit_error++
            }

            if (document.getElementById('edit_signal_time').value == "") {
                document.getElementById("edit_signal_time_error").innerHTML = "Please select Signal Time";
                edit_error++
            }

            // if (document.getElementById('edit_valid_till').value == "") {
            //     document.getElementById("edit_valid_time_error").innerHTML = "Please select Valid Time";
            //     error++
            // }

            if (document.getElementById('edit_price').value == "") {
                document.getElementById("edit_price_error").innerHTML = "Please Write Your Price";
                edit_error++
            }

            if (document.getElementById('edit_take_profit').value == "") {
                document.getElementById("edit_take_profit_error").innerHTML = "Please Write Your Take Profit";
                edit_error++
            }

            if (document.getElementById('edit_stop_loss').value == "") {
                document.getElementById("edit_stop_loss_error").innerHTML = "Please Write Your Stop loss";
                edit_error++
            }
        }

        function edit_reset_error() {
            edit_error = 0
            document.getElementById("edit_category_error").innerHTML = "";
            document.getElementById("edit_currency_error").innerHTML = "";
            document.getElementById("edit_type_error").innerHTML = "";
            document.getElementById("edit_signal_time_error").innerHTML = "";
            document.getElementById("edit_valid_time_error").innerHTML = "";
            document.getElementById("edit_price_error").innerHTML = "";
            document.getElementById("edit_stop_loss_error").innerHTML = "";
        }

        document.getElementById('updateSignal').addEventListener('click', function(){
            //console.log();
            edit_reset_error();
            edit_validate_error();

            let data = new FormData()
            if (document.getElementById("edit_attachment").files[0] !== undefined) {
                let attachment = document.getElementById("edit_attachment").files[0]
                data.append('attachment', attachment, attachment.name)
            }
            data.append('category_id', document.getElementById('edit_category_id').value)
            data.append('currency_id', document.getElementById('edit_currency_id').value)
            data.append('type', document.querySelector('input[name="etype"]:checked').value)
            
            data.append('signal_time', new Date(document.getElementById('edit_signal_time').value).toUTCString())
            data.append('price', document.getElementById('edit_price').value)
            data.append('take_profit', document.getElementById('edit_take_profit').value)
            data.append('stop_loss', document.getElementById('edit_stop_loss').value)
            
            if (document.getElementById('edit_valid_till').value !== "") {
                data.append('valid_till', new Date(document.getElementById('edit_valid_till').value).toUTCString())
            } else {
                data.append('valid_till', '')
            }
            
            data.append('notes', document.getElementById('edit_notes').value)
            data.append('free', document.getElementById('edit_free').value)
            data.append('premium', document.getElementById('edit_premium').value)
            
            data.append('package_id', $('#edit_package_id').val())

            let settings = { headers: { 'content-type': 'multipart/form-data' } }

            if (edit_error === 0) {
                // initialize loading effect
                var height = parseInt(document.getElementById('editSignal').offsetHeight)

                var padding = (height - 40) / 2

                var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                document.getElementById('edit-signal-loading').setAttribute('style', loadingStyle)
                
                axios.post('/admin/signal/'+document.getElementById('signalId').value+'/update', data, settings)
                    .then(function (response) {
                        console.log(response)
                        document.getElementById('edit-signal-loading').setAttribute('style', 'display: none')
                        if(response.status === 200){
                            //alert('Signal Update Succesfully Done');
                            $('.editSignalModal').modal('hide');
                            window.location.reload()

                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-success")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)
                        }
                    })

                    .catch(function (error) {
                        console.log(error);
                        document.getElementById('edit-signal-loading').setAttribute('style', 'display: none')
                        if (response.status === 422) {
                            let div = document.createElement("div")
                            div.setAttribute("class", "alert alert-danger")
                            div.setAttribute("role", "alert")
                            let txt = document.createTextNode(response.data.message)
                            div.appendChild(txt)

                            document.getElementById('success_message').innerHTML = ''
                            document.getElementById('error_message').innerHTML = ''
                            document.getElementById("success_message").appendChild(div)
                        }
                    });
            }
        })


        /*Display specific signal*/
        function printTd(text){
            var td = document.createElement("td")
            var textNode = document.createTextNode(text)
            td.appendChild(textNode)
            return td
        }

        function signalDetails(el)
        {
            axios.get('/admin/signal/detail/'+el.getAttribute('data-id'))
            .then(function (response) {
                var tr = document.createElement("tr")

                let td = printTd(response.data.currency.name)
                let splited = response.data.currency.icon.split('-')
                splited.forEach(el => {
                    let span = document.createElement('span')
                    span.setAttribute('class', `flag-icon flag-icon-${el}`)

                    td.appendChild(span)
                })
                tr.appendChild(td);

                tr.appendChild(printTd(response.data.type))
                tr.appendChild(printTd(response.data.signal_time))
                tr.appendChild(printTd(response.data.valid_till))
                tr.appendChild(printTd(response.data.price))
                tr.appendChild(printTd(response.data.stop_loss))
                tr.appendChild(printTd(response.data.take_profit))

                var tb = document.getElementById('tableBody')
                tb.innerHTML = ''
                tb.appendChild(tr)
            })
        }

        /*Fill Sgnal*/
        var fill_error = 0;
        function fill_validate_error() {

            if (document.getElementById('pips').value == "") {
                document.getElementById("pips_error").innerHTML = "Please write pips amount";
                fill_error++
            }

        }

        function fill_reset_error() {
            fill_error = 0
            document.getElementById("pips_error").innerHTML = "";
        }

        function openFillModal(el) {
            document.getElementById('signalFillId').value = el.getAttribute('data-id')
            document.getElementById('fill_notes').value = el.getAttribute('data-note')
        }

        function fillSignal(){
            fill_reset_error()
            fill_validate_error()

            var data = {
                pips:         document.getElementById('pips').value,
                profit:       document.querySelector('input[name="profit"]:checked').value,
                notes:       document.getElementById('fill_notes').value,
            }

            console.log(data)
            if (fill_error === 0) {
                axios.post('/admin/signal/fill/'+document.getElementById('signalFillId').value, data)
                    .then(function (response) {
                        if(response.status === 204) {
                            $('.fillSignalModal').modal('hide');
                            window.location.reload()
                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                        // if(error.reponse.data && error.response.data.category_id[0]){
                        //     document.getElementById("categoryValidation").innerHTML = "Please select a category...";
                        // }
                    });
            }

        }
        $(document).ready(function(){
            /*Date time picker*/
            $("#dt").DateTimePicker({
                dateTimeFormat: 'yyyy-MM-dd HH:mm:ss'
            })

            /*Clock for add signal form*/
            // $("#signal_time_dt").DateTimePicker({
            //     dateTimeFormat: 'yyyy-MM-dd HH:mm:ss'
            // })
            //
            // $("#valid_till_dt").DateTimePicker({
            //     dateTimeFormat: 'yyyy-MM-dd HH:mm:ss'
            // })
            //
            // /*Clock for edit signal form*/
            // $("#edit_signal_time_dt").DateTimePicker({
            //     dateTimeFormat: 'yyyy-MM-dd HH:mm:ss'
            // })
            //
            // $("#edit_valid_till_dt").DateTimePicker({
            //     dateTimeFormat: 'yyyy-MM-dd HH:mm:ss'
            // })

            /*Data table*/
            $('.data_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'print'
                ]
            });
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
    <!--Date picker-->
    <script src="{{ asset('admin/vendors/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/j_timepicker/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/lib/flatpickr.min.js') }}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script src="{{ asset('admin/js/pages/datatable.js') }}"></script>
    <script src="{{ asset('admin/vendors/tooltipster/js/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/tipso/js/tipso.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/tooltips.js') }}"></script>
    
    <script src="{{ asset('admin/js/pages/form_elements.js') }}"></script>
   
    <!--End of plugin scripts-->

    
    <!--Page level scripts-->
    <script src="{{ asset('admin/js/form.js') }}"></script>

    <!-- <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script> -->

    <script>
        // add signal DateTimePicker
        flatpickr(document.getElementById('signal_time'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        flatpickr(document.getElementById('valid_till'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        // edit signal DateTimePicker
        flatpickr(document.getElementById('edit_signal_time'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        flatpickr(document.getElementById('edit_valid_till'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    
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
                            Signal
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div id="dt"></div>
    <div class="card m-t-35 real_charts">
        <div class="row">
            <div class="col-md-12 text-center" id="success_message"></div>
            <div class="col-md-12 text-center" id="error_message"></div>
        </div>
        <div class="card-header bg-white">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-center" href="#active_signal" role="tab" data-toggle="tab">Active Signal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#cancel_signal" role="tab" data-toggle="tab">Cancelled Signal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#expired_signal" role="tab" data-toggle="tab">Expired Signal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#fill_signal" role="tab" data-toggle="tab">Filled Signal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-center" href="#trash_signal" role="tab" data-toggle="tab">Trashed Signal</a>
                </li>
            </ul>
        </div>
        <div class="card-body">


            <!-- Tab panes -->
            <div class="tab-content m-t-20">
                <div role="tabpanel" class="tab-pane fade show active" id="active_signal">
                    @include('admin.signal.partial.signal_list')
                </div>
                <div role="tabpanel" class="tab-pane fade show" id="cancel_signal">
                    @include('admin.signal.partial.cancel_signal')
                </div>
                <div role="tabpanel" class="tab-pane fade show" id="expired_signal">
                    @include('admin.signal.partial.expired_signal')
                </div>
                <div role="tabpanel" class="tab-pane fade show" id="fill_signal">
                    @include('admin.signal.partial.fill_signal')
                </div>
                <div role="tabpanel" class="tab-pane fade show" id="trash_signal">
                    @include('admin.signal.partial.trash_list')
                </div>
            </div>
        </div>
    </div>

    {{--    Add signal Modal--}}
        @include('admin.signal.partial.add_signal')
    {{--    End signal Modal--}}

    {{--    Edit signal Modal--}}
        @include('admin.signal.partial.edit_signal')
    {{--    End edit signal Modal--}}

    {{--    Detail signal Modal--}}
        @include('admin.signal.partial.signal_detail')
    {{--    End detail signal Modal--}}

    {{--    Fill signal Modal--}}
        @include('admin.signal.partial.fill')
    {{--    End fill signal Modal--}}
@endsection
