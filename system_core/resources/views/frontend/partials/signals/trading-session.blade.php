<div class="position-relative mb-2 d-none d-sm-none d-md-block">
    <h4 class="trading-session-header text-center border-radius-top-3">TRADING
        SESSION</h4>
    <div class="toggleWrapper">
        <input type="checkbox" name="toggle1" data-value="1"
               class="mobileToggle user-toggle" id="toggle1" checked>
        <label for="toggle1"></label>
    </div>
    <div class="hide-1" id="tradingSession">
        <table class="trading-session">
            <tr>
                <td>
                    <i class="flag-icon flag-icon-au"></i> Sydney
                </td>
                <td>
                    {!! $tradingSession['sydney'] !!}
                </td>
                <td class="clocktable text-center p-0"><span id="sydney-time"></span></td>
            </tr>
            <tr>
                <td>
                    <i class="flag-icon flag-icon-jp"></i> Tokyo
                </td>
                <td>
                    {!! $tradingSession['tokyo'] !!}
                </td>
                <td class="clocktable text-center p-0"><span id="tokyo-time"></span></td>
            </tr>
            <tr>
                <td>
                    <i class="flag-icon flag-icon-gb"></i> London
                </td>
                <td>
                    {!! $tradingSession['london'] !!}
                </td>
                <td class="clocktable text-center p-0"><span id="london-time"></span></td>
            </tr>
            <tr>
                <td>
                    <i class="flag-icon flag-icon-us"></i> NewYork
                </td>
                <td>
                    {!! $tradingSession['newyork'] !!}
                </td>
                <td class="clocktable text-center p-0"><span id="newyork-time"></span></td>
            </tr>
            
        </table>
    </div>
</div>