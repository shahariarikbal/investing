@if ($top_broker)
<section class="top-forex-brokers">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-content">
                        <div>
                            <span>Top Forex Brokers</span>
                        </div>
                        <div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="topForexBroker()">
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="topForexBroker">
                    @foreach($top_broker as $broker)
                    <div class="body-content row">
                        <div class="number-icon col-md-1 col   <?php if ($loop->index + 1 == 1) {
                                                                echo " text-success ";
                                                            } elseif ($loop->index + 1 == 2) {
                                                                echo "text-info ";
                                                            } elseif ($loop->index + 1 == 3) {
                                                                echo "text-warning ";
                                                            } else {
                                                                echo "text-secondary ";
                                                            } ?> ">
                            <i class="fas fa-star"></i>
                            <span>{{$loop->index + 1}}</span>
                        </div>
                        <div class="broker-img col-md-4 col text-right">
                            <img src="{{ asset('broker/logo/125x56-'.$broker['logo']) }}" alt="FXCC_FXBNP">
                            @if($broker['premium'] == 1)
                            <!-- <span class="premium-tag">premium</span> -->
                            @endif
                        </div>
                        <div class="review col-md-2 col">
                            <a href="{{ url('forex-broker/'.$broker['slug']) }}" target="_blank" class="btn btn-sm">Review</a>
                        </div>
                        <div class="item-name col-md-5 col">
                            <a class="btn btn-sm btn-success text-white" target="_blank" style="max-width:initial;border-radius: 2px;" href="https://www.icmarkets.com/?camp=1709 ">open account <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                    <div class="row footer-content">
                        <div class="col-md-12">
                            <div class="card-header">
                                <a href="{{url('/forex-brokers')}}">Read More Broker Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

