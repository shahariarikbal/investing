<div class="row">
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
                </a>
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
                            {{-- <th>Signal Type</th> --}}
                            <th>From</th>
                            <th>Till</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expire_signals as $k => $expire_signal)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>
                                    {{ $expire_signal->currency->name }}
                                    <?php
                                        $icon = explode('-',$expire_signal->currency->icon);
                                        foreach($icon as $key => $single_icon){
                                    ?>
                                        <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-<?= $single_icon ?>"></span>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>{{ $expire_signal->signal_time }}</td>
                                <td>{{ $expire_signal->valid_till }}</td>
                                <td>
                                    <a href="{{ url('/admin/signal/'.$expire_signal->id.'/destroy') }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                            if (confirm('Are you sure to permanently delete this signal ?')) {
                                                document.getElementById('trash-form-{{ $expire_signal->id }}').submit();
                                            }">
                                        Delete
                                    </a>
                                    <form id="trash-form-{{ $expire_signal->id }}" action="{{ url('/admin/signal/'.$expire_signal->id.'/destroy') }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
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
