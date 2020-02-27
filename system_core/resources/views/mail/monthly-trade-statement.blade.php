@component('mail::message')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    [class*="col-"] {
        float: left;
        padding: 0;
    }

    .text-center {
        text-align: center;
    }

    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    .lhsize4 {
        color: #fff;
        background-color: #5a5a5d;
        line-height: 36px;
    }

    .activetexts {
        color: #fff;
        background-color: #2a9e2e;
        line-height: 36px;
    }

    .filltexts {
        color: #fff;
        background-color: #010047;
        line-height: 36px;
    }

    .expiretexts {
        color: #fff;
        background-color: #ff9800;
        line-height: 36px;
    }

    .deletetexts {
        color: #fff;
        background-color: #f44336;
        line-height: 36px;
    }

    .bangla1img {
        width: 50px;
        height: 15px;
        vertical-align: -1px;
    }

    .lhsize4 strong {
        font-size: 20px;
    }

    .bg-red {
        background: #dca5a9;
        padding: 4px 7px;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        height: 30px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }

    .bg-gray {
        background: #ccc;
        padding: 4px 7px;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        height: 30px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }
    
    .bg-green {
        background: #a0c5a8;
        padding: 4px 7px;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        height: 30px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }

    .bg-lhsize4 {
        background: #5a5a5d;
        padding: 4px 7px;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        height: 35px;
        border-bottom: 1px solid rgba(230, 230, 230, 0.45);
    }

    .bg-lhsize4 strong {
        font-size: 15px;
        vertical-align: text-bottom;
    }
    .bg-lhsize4 img {
        max-width: 30%!important;
        margin-top: 5px;
        
    }

    .badge {
        float: right;
        background: #545354;
        color: #fff;
        font-size: 12px;
        padding: 3px 5px;
        border-radius: 2px;
    }

    .float-right {
        float: right;
    }

    .badge-warning {
        background-color: #e8a403 !important;
        color: #fff !important;
    }

    .drop-shadow {
        box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
        padding: 15px 10px;
    }

    .badge-success {
        padding: .25rem .5rem;
        font-size: 12px;
        line-height: 2.5;
        border-radius: .2rem;
        color: #fff;
        background-color: #1e7e34;
        border-color: #1c7430;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .badge-light {
        padding: 0.5rem 1rem;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 0.1rem;
        color: #fff;
        background-color: #1e7e34;
        border-color: #1c7430;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        font-weight: 500;
    }

    .social-ions {
        background-color: #075f1b;
        border-bottom: 1px solid #ddd;
    }

    .social-ions ul {
        margin: 1rem 0;
        padding: 0;
        text-align: center;
    }

    .social-ions ul li {
        list-style-type: none;
        display: inline-block;
        margin-right: 5px !important;
    }

    .social-ions ul li img {
        max-width: inherit;
    }

    .disclaimer {
        background-color: lightgray;
    }

    .disclaimer p {
        margin-top: 0;
        font-size: 12px;
        text-align: justify;
        padding: 10px 10px 0 10px;
        line-height: 20px;
        color: #000;
    }

    .disclaimer p span {
        color: #70bf44;
    }
</style>

<div style="margin:0.1rem 0 0 0;">
    <p>Hi, {{ ucfirst($recepient->first_name) }} {{ ucfirst($recepient->last_name) }}</p>
    @if ($statement->profit)
    <p>We gained {{ $statement->growth }}% having profit {{ $statement->amount }} USD for {{ $statement->package->name }} of {{ str_replace("App\\", "", $statement->service) }} plan in {{ $statement->month }}, {{ $statement->year }} </p>
    <p>As this plan is under {{ $statement->package->settings['company_share'] }}% company share, please make sure you have {{ $statement->meta['company_share'] }} USD available in your balance. We will charge these amount in next 10 days.</p>
    @else
    <p>We are sorry to say you than you lose {{ $statement->value }}% having lose amount {{ $statement->amount }} USD for {{ $statement->package->name }} of {{ str_replace("App\\", "", $statement->service) }} plan in {{ $statement->month }}, {{ $statement->year }} </p>
    @endif
    <p>You can find your trade statement by clicking <a href="{{ url('/storage/monthly-trade-statement/' . $statement->attachment) }}">Here</a></p>
    <div class="row">
        <div class="col-12 text-center social-ions">
            <ul>
                <li>
                    @if ($statement->service === "App\\Copytrade")
                    <a href="{{ url('/member/dashboard/copytrade') }}" class="text-uppercase badge-light">Go To Dashboard</a>
                    @elseif ($statement->service === "App\\FundManagement")
                    <a href="{{ url('/member/dashboard/fund-management') }}" class="text-uppercase badge-light">Go To Dashboard</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center disclaimer">
            <p>
                <span style="color: red;font-weight:bold;">Risk Warning : </span>Forex, Futures, and Options trading, Crypto Trading has large potential rewards, but also large potential risks. The high degree of leverage can work against you as well as for you. You must be aware of the risks of investing in forex, futures, and options, Crypto and be willing to accept them in order to trade in these markets. Forex trading involves substantial risk of loss and is not suitable for all investors. Please do not trade with borrowed money or money you cannot afford to lose.
            </p>
        </div>
    </div>

</div>

@endcomponent