<div id="content" class="bg-container">
    <div class="col-12 data_tables">
        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
        @if(Session::get('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
        @endif
        <div class="card">
            <div class="card-header bg-white">
                <i class="fa fa-table"></i> Resolved Ticket List
            </div>
            <div class="card-body p-t-25">
                <div class="">
                    <div class="pull-sm-right">
                        <div class="tools pull-sm-right"></div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover data_table" id="resolve-ticket-data-table">
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
                        @foreach ($resolved_tickets as $k => $resolved_ticket)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $resolved_ticket->supportDepartment->name }}</td>
                                <td>
                                    {{ ucfirst($resolved_ticket->member->first_name).' '.ucfirst($resolved_ticket->member->last_name) }}
                                </td>
                                <td>{{ $resolved_ticket->subject }}</td>
                                <td><a href="{{ url('admin/tickets/'.$resolved_ticket->id.'/detail') }}" class="btn btn-info btn-md">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
