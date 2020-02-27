<div class="modal fade editMarketSentimentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="editMarketSentimentsForm">
        <div id="edit-market-loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
         </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Update Market Sentiments</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
            <form method="post" class="form-horizontal login_validator" id="market_sentiments">
                    @csrf
                    <input type="hidden" id="marketSentimentId" name="id">
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="currency" class="col-form-label">Currency *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control chzn-select" name="currency_id" id="edit_currency_id" tabindex="2">
                                <option value=""> Select a Currency </option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ ucfirst($currency->name) }}</option>
                                @endforeach
                            </select>
                            <small class="help-block error" style="color:red" id="edit_currency_id_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="buy" class="col-form-label">Buy *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control" name="buy" placeholder="Market sentiments buy" id="edit_buy" autocomplete="off">
                            <small class="help-block error" style="color:red" id="edit_buy_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="sell" class="col-form-label">Sell *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control" name="sell" placeholder="Market sentiments sell" id="edit_sell" autocomplete="off">
                            <small class="help-block error" style="color:red" id="edit_sell_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">Select Status</div>
                        <div class="col-xl-9">
                            <select class="form-control" name="status" id="edit_status" tabindex="2">
                                <option value="" selected>Select a status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                            <small class="help-block error" id="status_error"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateMarketSentiments">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
