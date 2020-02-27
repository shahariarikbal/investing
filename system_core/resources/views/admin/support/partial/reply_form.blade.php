
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Give Reply</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form method="post" name="ticket_reply" enctype="multipart/form-data" class="form-horizontal login_validator" id="reply-ticket-data-table">
                    <input type="hidden" id="replyId" name="id" value="{{ $ticket->id }}">
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Attachment </label>
                        </div>
                        <div class="col-xl-9">
                            <input type="file" id="attachment" name="attachment" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="reply" class="col-form-label">Give Reply *</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea name="message" id="message" placeholder="Reply..." class="form-control replyEditor"></textarea>
                            <div class="text-danger" id="replyError" align="center"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveReply">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
