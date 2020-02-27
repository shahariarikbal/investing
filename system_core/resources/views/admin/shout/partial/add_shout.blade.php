<div class="modal fade addShoutModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="position: relative;" id="shoutForm">
        <div id="shout-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add Shout</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form method="post" class="form-horizontal login_validator" id="signal_form_validator">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="service" class="col-form-label">Service *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control" name="service" id="service" tabindex="2">
                                <option value="" selected disabled>Select</option>
                                <option value="App\FundManagement">Fund - Management</option>
                                <option value="App\Copytrade">Copy - Trade</option>
                                <option value="App\ForexConsultancy">Forex - Consultancy</option>
                                <option value="App\Signal">Forex - Signal - Package</option>
                            </select>
                            <small class="help-block error" id="service_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Title *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="title" name="title" class="form-control">
                            <small class="help-block error" id="title_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="date" class="col-form-label">Description *</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea name="description" id="description" class="form-control"></textarea>
                            <small class="help-block error" id="description_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">Select Member</div>
                        <div class="col-xl-9">
                            <select class="form-control" name="member_id" id="member_id" tabindex="2">
                                <option value="" selected disabled>Select</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->first_name.'  '.$member->last_name.'  '.($member->email) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="saveShout">Save Shout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
