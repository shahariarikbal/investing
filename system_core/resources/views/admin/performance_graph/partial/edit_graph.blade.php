<div class="modal fade editGraphModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="performance-graph">
        <div id="graph-loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
         </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Performance Graph</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form method="post" class="form-horizontal login_validator" id="signal_form_validator">
                    <input type="hidden" name="id" id="graphId" value="">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="service" class="col-form-label">Service *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control" name="service" id="edit_service" tabindex="2">
                                <option value="" disabled>Select</option>
                                <option value="App\FundManagement">Fund - Management</option>
                                <option value="App\Copytrade">Copy - Trade</option>
                                <option value="App\ForexConsultancy">Forex - Consultancy</option>
                                <option value="App\Signal">Forex - Signal - Package</option>
                            </select>
                            <small class="help-block" id="edit_service_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="date" class="col-form-label">Date *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control dp2" name="date" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" id="edit_date">
                            <small class="help-block" id="edit_date_error" autocomplete="off"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            {{-- <label for="profit" class="col-form-label">Profit</label> --}}
                        </div>
                        <div class="col-xl-9">
                            <input type="checkbox" id="edit_profit" name="profit" value="1"> Profit
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="date" class="col-form-label">Value *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control" name="value" id="edit_value">
                            <small class="help-block" id="edit_value_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">Select Member</div>
                        <div class="col-xl-9">
                            <select class="form-control" name="member_id" id="edit_member_id" tabindex="2">
                                <option value="" selected>Select</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->first_name.'  '.$member->last_name.'  '.($member->email) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">Select Status</div>
                        <div class="col-xl-9">
                            <select class="form-control" name="status" id="estatus" tabindex="2">
                                <option value="" selected>Select one</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="updateGraph">Update Graph</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
