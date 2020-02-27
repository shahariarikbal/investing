<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;" charset=utf-8" />
    <title>Invoice</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
            background-color: #4B4B4B;
            font-family: sans-serif;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        /* For desktop: */

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

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        [class*="col-"] {
            float: left;
            padding: 15px;
        }

        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            [class*="col-"] {
                width: 100%;
            }
        }

        /* Extra small devices "mobile phones" */
        @media only screen and (max-width: 768px) {}

        /* Extra small devices "Tabs" */
        @media only screen and (max-width: 992px) {}

        /* Extra small devices "Tabs" */
        @media only screen and (max-width: 1200px) {}

        @media only screen and (max-width: 1920px) {}

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }

        /* Custom CSS */
        .details-wrapper {
            background-color: #fff;
            padding: 2rem 5rem;
        }

        .bg-gray {
            background: #DCDDDF;
        }

        .text-center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 1rem;
        }

        .mb-5 {
            margin-bottom: 5rem;
        }

        .p-1 {
            padding: 1rem;
        }

        .ml-1 {
            margin-left: 1rem;
        }

        .text-right {
            text-align: right;
        }

        .invoice-table thead tr th {
            font-size: 5rem;
            text-transform: uppercase;
            font-family: sans-serif;
            font-weight: 100;
            color: #097a07;
        }

        .invoice-table tbody tr td .number,
        .invoice-table tbody tr td .date {
            text-transform: uppercase;
            font-family: sans-serif;
            color: #5a5a5a;
            font-weight: 500;
            margin: 15px 7px 7px 7px;
            font-size: 18px;
        }

        .invoice-table tbody tr td .number-details,
        .invoice-table tbody tr td .date-details {
            margin-left: 7px;
            color: #5a5a5a;
        }

        .info-table {
            float: right;
            text-align: right;
        }

        .info-table .to,
        .info-table .title-name {
            text-transform: uppercase;
            margin-bottom: 15px;
            font-family: sans-serif;
            font-weight: 600;
            color: #5a5a5a;
            letter-spacing: 1px;
            font-size: 20px;
        }

        .info-table .title-name {
            margin-bottom: 8px;
        }

        .info-table .address {
            text-transform: capitalize;
            color: #777;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .info-table .address span {
            font-weight: bold;
            color: #5a5a5a;
        }

        .accounts-table {
            width: 100%;
        }

        .accounts-table thead tr {
            border-top: 1px solid #02016594;
            border-bottom: 1px solid #02016594;
        }

        .accounts-table thead tr th {
            text-transform: uppercase;
            color: #5a5a5a;
            font-size: 20px;
            vertical-align: middle;
            padding: 10px 0;
            text-align: left;
            font-weight: bold;
        }

        .accounts-table tbody tr td {
            color: #5a5a5a;
            vertical-align: middle;
            padding: 1.5rem 0;
        }

        .accounts-table tbody tr {
            border-bottom: 2px solid #C9C9C9;
        }

        .accounts-table tbody tr td .title {
            text-transform: capitalize;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .accounts-table tbody tr td .title-details {
            line-height: 1.2rem;
            font-size: 15px;
            color: #777;
        }

        .total-table {
            width: 100%;
            color: #5a5a5a;
        }

        .total-table tbody tr td {
            color: #5a5a5a;
            vertical-align: middle;
            padding: 0.5rem 0;
        }

        .total-table .subtototal {
            text-align: right;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 11px;
        }

        .total-table .subtototal span.border {
            color: #c1bdbd;
        }

        .total-table .subtototal span {
            font-weight: normal;
            color: #000;
        }

        .total-table .last-total {
            text-align: right;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 11px;
            position: relative;
        }

        .total-table .last-total .name {
            text-transform: uppercase;
            font-weight: 800;
            font-size: 11px;
            color: #5a5a5a;
            position: absolute;
            right: 144px;
            top: 0;
        }

        .total-table .last-total span {
            font-weight: normal;
            color: #000;
        }

        .total-amount {
            text-align: right;
            border-top: 1px solid #000;
            width: 30%;
            padding: 1rem 0;
            float: right;
        }

        .total-amount ul {
            margin: 0;
            padding: 0;
        }

        .total-amount ul li {
            display: inline-block;
            list-style-type: none;
            text-transform: capitalize;
            font-weight: bold;
            color: #5a5a5a;
        }

        .total-amount ul li.balance {
            background: #0000009e;
            padding: 0.5rem;
            text-align: right;
            color: #fff;
            border-radius: 2px;
        }

        .signature {
            float: right;
            text-align: center;
        }

        .signature h2 {
            text-transform: uppercase;
            margin-bottom: 5px;
            font-family: sans-serif;
            font-weight: 600;
            color: #5a5a5a;
            letter-spacing: 1px;
            font-size: 20px;
        }

        .signature span {
            text-transform: capitalize;
            color: #777;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .footer {
            text-align: center;
            border-top: 2px solid #C9C9C9;
            padding-top: 1rem;
        }

        .footer span {
            font-weight: bold;
            color: #4B4B4B;
        }

        .footer p {
            color: #777;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="container mt-1">
        <div class="row">
            <div class="col-12 bg-gray">
                <div class="text-center">
                    <img src="https://www.investingpartner.net/assets/images/logo.png" alt="logo of investing partner" class="p-1">
                </div>
            </div>
        </div>
        <div class="details-wrapper">
            <div class="row mb-5">
                <div class="col-6">
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th colspan="2">invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="number">number:</div>
                                    <div class="number-details">#{{$id}}</div>
                                </td>
                                <td>
                                    <div class="date">date:</div>
                                    <div class="date-details">{{ \Carbon\Carbon::parse($due_date)->format('l jS \\of F Y h:i:s A') }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <table class="info-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="to">to</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="title-name">{{ $member['full_name'] }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="address">{{ $member['profile'] ? $member['profile']['address'] : '[ No Billing Address Found ]' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="address">{{ $member['profile'] && $member['profile']['city'] ? $member['profile']['city']['name'] : '' }} - {{ $member['profile'] && $member['profile']['zip'] ? $member['profile']['zip'] : '' }}, {{ $member['profile'] && $member['profile']['country'] ? $member['profile']['country']['name'] : '' }}</div>
                                </td>
                            </tr>
                            @if ($member['profile']['contact'])
                            <tr>
                                <td>
                                    <div class="address"><span>P:</span> {{ $member['profile']['contact'] }}</div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="accounts-table">
                        <thead>
                            <tr>
                                <th style="width: 20%;">id</th>
                                <th style="width: 50%;">discription</th>
                                <th style="width:30%;text-align: right;">price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td style="width: 20%;">
                                    <div class="title">{{$item->id}}</div>
                                </td>
                                <td style="width: 50%;">
                                    <div class="title">
                                        {{$item->name}}
                                    </div>
                                    <div class="title-details">
                                        {{ $subscription_details['plan']['note'] }}
                                    </div>
                                </td>
                                <td style="width:30%;text-align: right;">
                                    <div class="title">{{$item->price}}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="padding-top: 1px;padding-bottom: 0;">
                    <table class="total-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div>Remarks / Payment Instructions</div>
                                </td>
                                <td>
                                    <div class="subtototal">Subtotal<span class="border">_____________________</span><span>{{$sub_total_price}}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="subtototal">Discount<span class="border">_____________________</span><span>{{$discount_price}}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="subtototal">Subtotal less discount<span class="border">_____________________</span><span>{{$after_discount_price}}</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="subtototal">Total Tax<span class="border">_____________________</span><span>{{$tax_price}}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="last-total">
                                        <span class="name">Total Price</span>
                                        <span>{{$total_price}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="signature">
                        <div>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/25/Sulli%27s_signature.png" alt="signature" width="100">
                        </div>
                        <div>
                            <h2>john miller</h2>
                            <span>accounting manager</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="footer">
                        <p>
                            <span>Notes:</span>
                            {{$note}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>