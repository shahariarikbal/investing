
<!----New Signal Design---->
<div class="modal fade editSignalModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="editSignal">
        <div id="edit-signal-loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header" style="flex-direction: inherit;">
                <h2>Update Signal</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;right: 10px;top: 10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">

                <form method="post" name="addSignal" onsubmit="return addSignalValidation();" class="form-horizontal login_validator" id="signal_form_validator" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="signalId" id="signalId">
                    <div class="form-group row">
                        <div class="col-xl-3">
                            <label for="category" class="col-form-label">Select Category *</label>
                            <select class="form-control" name="category_id" id="edit_category_id">
                                <option disabled selected> Select a Category </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small class="help-block error text-danger" id="edit_category_error"></small>
                        </div>
                        <div class="col-xl-3">
                            <label for="category" class="col-form-label">Select Currency *</label>
                            <select class="form-control" name="currency_id" id="edit_currency_id">
                                <option disabled selected> Select a Currency </option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                @endforeach
                            </select>
                            <small class="help-block error text-danger" id="edit_currency_error"></small>
                        </div>
                        <div class="col-xl-6" id="edit_type">
                            <label for="select type" class="col-form-label">Select Type *</label>
                            <div class="radio">
                                <label class="text-primary">
                                    <input type="radio" name="etype" id="edit_buy" value="buy" checked>
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Buy
                                </label>
                                <label class="text-primary">
                                    <input type="radio" name="etype" id="edit_sell" value="sell">
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Sell
                                </label>
                                <label class="text-primary">
                                    <input type="radio" name="etype" id="edit_buy_limit" value="buy_limit">
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Buy Limit
                                </label>
                                <label class="text-primary">
                                    <input type="radio" name="etype" id="edit_sell_limit" value="sell_limit">
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Sell Limit
                                </label>
                                <label class="text-primary">
                                    <input type="radio" name="etype" id="edit_buy_stop" value="buy_stop">
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Buy Stop
                                </label>
                                <label class="text-primary">
                                    <input type="radio" name="etype" id="edit_sell_stop" value="sell_stop">
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Sell Stop
                                </label>
                            </div>
                            <small class="help-block error text-danger" id="edit_type_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-6">
                            <label for="category" class="col-form-label">Signal Time *</label>
                            <input type="text" name="signal_time" id="edit_signal_time" class="form-control" target-error="signal_time_error">
                            <small class="help-block error text-danger" id="edit_signal_time_error"></small>
                        </div>
                        <div class="col-xl-6">
                            <label for="category" class="col-form-label">Valid Till </label>
                            <input type="text" name="valid_till" id="edit_valid_till" class="form-control">
                            <small class="help-block error text-danger" id="edit_valid_time_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-4">
                            <label for="category" class="col-form-label">Price *</label>
                            <input type="text" name="price" id="edit_price" class="form-control" target-error="price_error" required="">
                            <small class="help-block text-danger" id="edit_price_error"></small>
                        </div>
                        <div class="col-xl-4">
                            <label for="category" class="col-form-label">Take Profit *</label>
                            <input type="text" name="take_profit" id="edit_take_profit" target-error="take_profit_error" class="form-control" required="">
                            <small class="help-block text-danger" id="edit_take_profit_error"></small>
                        </div>
                        <div class="col-xl-4">
                            <label for="category" class="col-form-label">Stop Loss *</label>
                            <input type="text" name="stop_loss" id="edit_stop_loss" target-error="stop_loss_error" class="form-control">
                            <small class="help-block text-danger" id="edit_stop_loss_error"></small>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-xl-2">
                            <label for="file" class="col-form-label">Attachment</label>
                        </div>
                        <div class="col-xl-10">
                            <img src="{{ asset('/assets/default.jpg') }}" id="edit_prev" style="height: 100px;" width="100px" />
                            <input type="file" id="edit_attachment" onchange="edit_priv_signal(event)" name="attachment" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-2">
                            <label for="body" class="col-form-label">Notes</label>
                        </div>
                        <div class="col-xl-10">
                            <textarea id="edit_notes" name="notes" required class="form-control" cols="50" rows="5" placeholder="Enter Your Description...."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-2 ">
                           
                        </div>
                        <div class="col-xl-10">
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="edit_all_member" name="edit_all_member" value="1" onclick="freeNPremiumChecked()">
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    Send this signal to All Member
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-2">
                           
                        </div>
                        <div class="col-xl-10">
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="edit_free" name="free" value="1">
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    Send this signal to Free Member
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-2">
                        
                        </div>
                        <div class="col-xl-10">
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="edit_premium" name="premium" value="1">
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    Send this signal to Premium Member
                                </label>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-2">
                            <label for="file" class="col-form-label">Package</label>
                        </div>
                        <div class="col-xl-10">
                            <select size="3" multiple class="form-control" name="package_id[]" id="edit_package_id" tabindex="8">
                                <option value="" disabled>Select a Package</option>
                                @foreach($plans as $package)
                                <option value="{{ $package->id }}">{{ ucfirst($package->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <small class="text-danger" id="signalValidationError"></small>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="updateSignal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

