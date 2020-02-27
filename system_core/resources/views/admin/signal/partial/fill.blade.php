<div class="modal fade fillSignalModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="flex-direction: inherit;">
                <h2>Are you sure to fill it ?</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;right: 10px;top: 10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                {{-- @if(isset($currency)) --}}
                <form method="post" name="fillForm" class="form-horizontal login_validator" id="form_inline_validator">
                        <input type="hidden" id="signalFillId" name="id" value="">
                    @csrf
                    <div class="form-group row" id="profit">
                        <div class="col-xl-3 text-xl-right">
                            <label for="profit" class="col-form-label">Fill Type *</label>
                        </div>
                        <div class="radio">
                            <label class="text-primary">
                                <input type="radio" name="profit" id="profit_id" value="1" checked>
                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                Profit Pips
                            </label>
                        </div>
                        <div class="radio">
                            <label class="text-primary">
                                <input type="radio" name="profit" id="loss_id" value="0">
                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                Loss Pips
                            </label>
                        </div>
                        <small class="help-block error text-danger" id="error_profit"></small>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="pips" class="col-form-label">Profit *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" name="pips" id="pips" class="form-control">
                            <small class="help-block error text-danger" id="pips_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="pips" class="col-form-label">Note *</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea class="form-control" name="note" id="fill_notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="saveFill" onclick="event.preventDefault(); fillSignal();">Fill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
