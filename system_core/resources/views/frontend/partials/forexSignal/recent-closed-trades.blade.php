@if(count($recent_closed_trades) > 0)

<div class="recent-closed-trade">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-content">
                        <div>
                            <span>Recent Closed Trades</span>
                        </div> 
                        <div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" id="customSwitch10" onclick="recentClosedTrade()" class="custom-control-input"> 
                                <label for="customSwitch10" class="custom-control-label"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="recent-closed-trade" class="card-body">
                    <recent-close-trades :signals="{{ $recent_closed_trades }}"></recent-close-trades>
                </div>
            </div>
        </div>
    </div>
</div>
@endif