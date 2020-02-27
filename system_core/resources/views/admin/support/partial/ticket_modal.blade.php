
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ticket File</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <h3>Case id : {{ $ticket->id }}</h3>
                <br/>
                @if (isset($ticket->attachment))
                    @if (explode('.', $ticket->attachment)[1] == 'jpg' || explode('.', $ticket->attachment)[1] == 'PNG' || explode('.', $ticket->attachment)[1] == 'png')
                        <img src="{{ url('storage/support-ticket/'.$ticket->attachment) }}" width="100%" style="margin: auto;" />
                    @elseif(explode('.', $ticket->attachment)[1] == 'pdf')
                        <iframe src="{{ url('storage/support-ticket/'.$ticket->attachment) }}" style="height: 800px; width: 1024px; margin-left: 40px;"></iframe>
                    @endif
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
