<div id="content" class="bg-container">
    <div class="col-12 data_tables">
        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
        @if(Session::get('message'))
            <p class="alert alert-success">{{Session::get('message')}}</p>
        @endif
        <div class="card">
            <div class="card-header bg-white">
                <i class="fa fa-table"></i>  Answer Tickets List
            </div>
            <div class="card-body p-t-25">
                <div class="">
                    <div class="pull-sm-right">
                        <div class="tools pull-sm-right"></div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover data_table" id="answer-ticket-data-table">
                    <thead>
                        <tr style="text-align:center">
                            <th>Serial</th>
                            <th>Department</th>
                            <th>Member</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answer_tickets as $k=>$answer_ticket)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $answer_ticket->supportDepartment->name }}</td>
                                <td>
                                    {{ ucfirst($answer_ticket->member->first_name).' '.ucfirst($answer_ticket->member->last_name) }}
                                </td>
                                <td>{{ $answer_ticket->subject }}</td>
                                <td><a href="{{ url('admin/tickets/'.$answer_ticket->id.'/detail') }}" class="btn btn-info btn-md">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
