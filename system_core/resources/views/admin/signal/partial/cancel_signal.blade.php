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
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr style="text-align:center">
                            <th>Serial</th>
                            <th>Currency Pair</th>
                            {{-- <th>Signal Type</th> --}}
                            <th>From</th>
                            <th>Till</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancel_signals as $k => $cancel_signal)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>
                                    {{ $cancel_signal->currency->name }}
                                    <?php
                                        $icon = explode('-',$cancel_signal->currency->icon);
                                        foreach($icon as $key=>$single_icon){
                                    ?>
                                        <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-<?= $single_icon ?>"></span>
                                    <?php
                                        }
                                        //var_dump($icon);
                                    ?>
                                </td>
                                <td>{{ $cancel_signal->signal_time }}</td>
                                <td>{{ $cancel_signal->valid_till }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target=".detailSignalModal" class="btn btn-primary btn-sm" title="Signal Details" onclick="event.preventDefault(); signalDetails(this)" data-id="{{ $cancel_signal->id }}">
                                        Detail
                                    </button>

                                    <a href="{{ url('/admin/signal/'.$cancel_signal->id.'/delete') }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                            if (confirm('Are you sure move to trash this signal ?')) {
                                                document.getElementById('trash-form-{{ $cancel_signal->id }}').submit();
                                            }">
                                        Trash
                                    </a>
                                    <form id="trash-form-{{ $cancel_signal->id }}" action="{{ url('/admin/signal/'.$cancel_signal->id.'/delete') }}" method="POST" style="display: none;">
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

