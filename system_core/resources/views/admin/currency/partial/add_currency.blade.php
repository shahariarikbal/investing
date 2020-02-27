<div class="modal fade addCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="position: relative;" id="currencyForm">
        <div id="currency-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Currency</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                {{-- @if(isset($currency)) --}}
                <form method="post" name="currency" class="form-horizontal login_validator" id="form_inline_validator saveCurrency">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Currency Name *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="name" name="name" placeholder="Enter Your Currency Name...." class="form-control">
                            <div class="text-danger" id="currencyValidation"></div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Icon </label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter Your Icon Name....">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Currency Logo </label>
                        </div>
                        <div class="col-xl-9">
                            <img src="{{ asset('/assets/default.jpg') }}" id="prev" style="height: 100px;" width="100px" />
                            <input type="file" id="logo" name="logo" onchange="preview_logo(event)" accept="image/*" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="saveCurrency">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

