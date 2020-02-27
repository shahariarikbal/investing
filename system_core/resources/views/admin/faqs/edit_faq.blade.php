<div class="modal fade editFaqModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="editFaqForm">
        <div id="edit-faq-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Faq</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form name="faq" method="post" class="form-horizontal login_validator" id="form_inline_validator">
                    <input type="hidden" id="faqId" name="id">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="service" class="col-form-label">Service *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control chzn-select" name="service" id="edit_service" tabindex="2">
                                <option selected>Choose Your Service</option>
                                <option value="App\General">General - Faq</option>
                                <option value="App\Signal">Forex - SignalFaq</option>
                                <option value="App\Copytrade">Copy - Trade</option>
                                <option value="App\FundManagement">Fund - Management</option>
                            </select>
                            <small class="help-block error" style="color: red" id="edit_service_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="question" class="col-form-label">Question *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="edit_question" name="question" placeholder="Enter Your Faq Question...." class="form-control">
                            <small class="help-block error" style="color: red" id="edit_question_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="answer" class="col-form-label">Answer *</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea type="text" id="edit_answer" row="5" name="answer" placeholder="Enter Your Faq Answer...." class="form-control faqEditor"></textarea>
                            <small class="help-block error" style="color: red" id="edit_answer_error"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateFaq">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>