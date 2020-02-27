<div class="modal fade editCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="position: relative;" id="editCurrencyForm">
        <div id="edit-currency-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Currency</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form method="post" name="currency" class="form-horizontal login_validator" id="form_inline_validator editCurrency" enctype="multipart/form-data">
                    <input type="hidden" id="currencyId" name="id">
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Currency Name *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="edit-name" name="name"  class="form-control">
                            <div class="text-danger" id="editCurrencyValidation"></div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Icon </label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="edit-icon" name="icon" class="form-control">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Currency Logo </label>
                        </div>
                        <div class="col-xl-9">
                            <img src="" id="edit_prev" style="height: 100px;" width="100px" />
{{--                            <span id="edit_prev"></span>--}}
                            <input type="file" id="edit-logo" name="logo" onchange="edit_priv_image(event)" accept="image/*" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="updateCurrency">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
