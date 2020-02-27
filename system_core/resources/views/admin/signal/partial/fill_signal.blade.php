
<div id="content" class="bg-container">
    <div class="col-12 data_tables">
        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
        @if(Session::get('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
        @endif
        <div class="card">
            <div class="card-header bg-white">
                <i class="fa fa-table"></i> Signal Table
                <button type="button" data-toggle="modal" data-target=".addSignalModal" class="btn btn-success pull-right" title="Add signal">
                    Add Signal
                </button>
            </div>

            <div class="card-body p-t-25">
                <div class="">
                    <div class="pull-sm-right">
                        <div class="tools pull-sm-right"></div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover data_table">
                    <thead>
                        <tr style="text-align:center">
                            <th>Serial</th>
                            <th>Currency Pair</th>
                            <th>From</th>
                            <th>Till</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fill_signals as $k=>$fill_signal)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>
                                    {{ $fill_signal->currency->name }}
                                    <?php
                                        $icon = explode('-',$fill_signal->currency->icon);
                                        foreach($icon as $key=>$single_icon){
                                    ?>
                                        <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-<?= $single_icon ?>"></span>
                                    <?php
                                        }
                                        //var_dump($icon);
                                    ?>
                                </td>
                                <td>{{ $fill_signal->signal_time }}</td>
                                <td>{{ $fill_signal->valid_till }}</td>
                                <td width="22%" style="text-align: center;">
                                    <button type="button" data-toggle="modal" data-target=".detailSignalModal" class="btn btn-primary btn-sm" title="Signal Details" onclick="event.preventDefault(); signalDetails(this)" data-id="{{ $fill_signal->id }}">
                                        Detail
                                    </button>

                                    <button type="button" data-toggle="modal" data-target=".editSignalModal" class="edit btn btn-dark btn-sm" title="Edit Signal" onclick="signalEdit(this)" data-id="{{ $fill_signal->id }}">
                                        Edit
                                    </button>

                                    <button type="button" data-toggle="modal" data-target=".fillSignalModal" class="btn btn-success btn-sm" title="Fill signal" onclick="event.preventDefault(); openFillModal(this)" data-id="{{ $fill_signal->id }}">
                                        Fill
                                    </button>

                                    <a href="{{ url('/admin/signal/'.$fill_signal->id.'/cancel') }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                            if (confirm('Are you sure to cancel this ?')) {
                                                document.getElementById('cancel-form-{{ $fill_signal->id }}').submit();
                                            }">
                                        Cancel
                                    </a>
                                    <form id="cancel-form-{{ $fill_signal->id }}" action="{{ url('/admin/signal/'.$fill_signal->id.'/cancel') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a href="{{ url('/admin/signal/'.$fill_signal->id.'/expire') }}" class="btn btn-warning btn-sm"
                                        onclick="event.preventDefault();
                                            if (confirm('Are you sure to expire this signal ?')) {
                                                document.getElementById('expire-form-{{ $fill_signal->id }}').submit();
                                            }">
                                        Expire
                                    </a>
                                    <form id="expire-form-{{ $fill_signal->id }}" action="{{ url('/admin/signal/'.$fill_signal->id.'/expire') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a href="{{ url('/admin/signal/'.$fill_signal->id.'/delete') }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                            if (confirm('Are you sure move to trash this signal ?')) {
                                                document.getElementById('trash-form-{{ $fill_signal->id }}').submit();
                                            }">
                                        Trash
                                    </a>
                                    <form id="trash-form-{{ $fill_signal->id }}" action="{{ url('/admin/signal/'.$fill_signal->id.'/delete') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
