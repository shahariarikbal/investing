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
                            @foreach ($trash_signals as $k => $signal)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>
                                        {{ $signal->currency->name }}
                                        <?php
                                            $icon = explode('-',$signal->currency->icon);
                                            foreach($icon as $key=>$single_icon){
                                        ?>
                                            <span @if ($key == 1) style="margin-left: -3px;" @endif class="flag-icon flag-icon-<?= $single_icon ?>"></span>
                                        <?php
                                            }
                                            //var_dump($icon);
                                        ?>
                                    </td>
                                    <td>{{ $signal->signal_time }}</td>
                                    <td>{{ $signal->valid_till }}</td>
                                    <td>
{{--                                        <a href="{{ url('/admin/signal/'.$trash_signal->id.'/destroy') }}" class="btn btn-danger btn-sm"--}}
{{--                                            onclick="event.preventDefault();--}}
{{--                                                if (confirm('Are you sure to permanently delete this signal ?')) {--}}
{{--                                                    document.getElementById('trash-form-{{ $trash_signal->id }}').submit();--}}
{{--                                                }">--}}
{{--                                            Delete--}}
{{--                                        </a>--}}
{{--                                        <form id="trash-form-{{ $trash_signal->id }}" action="{{ url('/admin/signal/'.$trash_signal->id.'/destroy') }}" method="post" style="display: none;">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}

                                        <a href="{{ url('/admin/signal/'.$signal->id.'/restore') }}" class="btn btn-info btn-sm"
                                            onclick="event.preventDefault();
                                                if (confirm('Are you sure to restore this signal ?')) {
                                                    document.getElementById('restore-form-{{ $signal->id }}').submit();
                                                }">
                                            Restore
                                        </a>
                                        <form id="restore-form-{{ $signal->id }}" action="{{ url('/admin/signal/'.$signal->id.'/restore') }}" method="POST" style="display: none;">
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
