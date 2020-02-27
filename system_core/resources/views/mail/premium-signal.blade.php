@component('mail::message')
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<div class="table">
<table cellpadding="10" cellspacing="0" style="margin: 0;">
<thead bgcolor="#5A5A5D">
<tr>
<th align="left">
<span class="btn-premium">premium</span>
</th>
<th class="text-white">
<img style="vertical-align: text-top;" src="{{ asset('/currency/images/40x15-' . $signal->currency->logo) }}" alt="{{ $signal->currency->name }}" />
{{ $signal->currency->name }}
</th>
<th align="right">
<a style="text-decoration:none;" href="{{ url('/forex-signal/'.$signal->currency_name.'/'.$signal->created_at->format('Y').'/'.$signal->created_at->format('m').'/'.$signal->created_at->format('d').'/'.$signal->id) }}" class="btn-visit">visit</a>
</th>
</tr>
</thead>
<?php
    $bg = '#c3c3c3';
    if ($signal->type === 'buy' && (!isset($signal->status) || (isset($signal->status) && $signal->status === 'active'))) {
        $bg = '#ff7b7b';
    }
    if ($signal->type === 'sell' && (!isset($signal->status) || (isset($signal->status) && $signal->status === 'active'))) {
        $bg = '#A0C5A8';
    }
?>
<tbody>
<tr bgcolor="{{ $bg }}">
<td  class="border-bottom"><span class="text-black font-weight-bold pl-5">Time</span></td>
<td colspan="2" align="right" class="border-bottom"><span class="date-time">{{ date('jS F g:ia', strtotime($signal->signal_time)) }}</span></td>
</tr>
<tr bgcolor="{{ $bg }}">
<td  class="border-bottom"><span class="text-black font-weight-bold pl-5">Valid Till</span></td>
<td colspan="2" align="right" class="border-bottom"><span class="date-time">{{ is_null($signal->valid_till) ? 'Not Specified' : date('jS F g:ia', strtotime($signal->valid_till)) }}</span></td>
</tr>
<tr bgcolor="{{ $bg }}">
<td  class="border-bottom"><span class="text-black font-weight-bold pl-5">{{ ucfirst($signal->signal_type_display) }} at</span></td>
<td colspan="2" align="right" class="border-bottom"><span class="text-black font-weight-bold pr-5">{{ $signal->price }}</span></td>
</tr>
<tr bgcolor="{{ $bg }}">
<td  class="border-bottom"><span class="text-black font-weight-bold pl-5">TP* at</span></td>
<td colspan="2" align="right" class="border-bottom"><span class="text-black font-weight-bold pr-5">{{ $signal->take_profit }}</span></td>
</tr>
<tr bgcolor="{{ $bg }}">
<td  class="border-bottom"><span class="text-black font-weight-bold pl-5">SL* at</span></td>
<td colspan="2" align="right" class="border-bottom"><span class="text-black font-weight-bold pr-5">{{ $signal->stop_loss }}</span></td>
</tr>
<?php
if($signal->status === 'active') {
    $statusColor = '#2A9E2E';
}

if($signal->status === 'filled') {
    $statusColor = '#010047';
}

if($signal->status === 'expired') {
    $statusColor = '#FFC000';
}

if($signal->status === 'cancel') {
    $statusColor = '#f44336';
}

?>
<tr bgcolor="{{ $statusColor }}">
<td align="center" colspan="3"><span class="text-uppercase text-white font-weight-bold">{{ $signal->status }}</span></td>
</tr>
</tbody>
</table>
@if (!is_null($signal->notes))
<table cellpadding="10" cellspacing="0" style="margin: 0;">
<thead bgcolor="#5A5A5D">
<tr>
<th align="center"><span class="text-uppercase font-weight-bold text-white">note</span></th>
</tr>
</thead>
<tbody>
<tr>
<td style="padding: 15px 10px;">
    {{ $signal->notes }}
</td>
</tr>
</tbody>
</table>
@endif
@if (!is_null($signal->attachment))
<table cellpadding="10" cellspacing="0" style="margin: 0;">
<thead bgcolor="#5A5A5D">
<tr>
<th align="center"><span class="text-uppercase font-weight-bold text-white">analysis</span></th>
</tr>
</thead>
<tbody>
<tr>
<td align="center" style="padding: 0;">
<a href="{{ url('/signal/images/'.$signal->attachment) }}">
<img width="100%" style="max-width: 100%;" src="{{ asset('/signal/images/'.$signal->attachment) }}" alt="Signal analysis">
</a>
</td>
</tr>
<tr bgcolor="#075F1B">
<td align="center" style="padding: 15px 10px;"><a style="text-decoration: none;" href="{{url('/forex-signal-report')}}" class="btn-signal-report">view signal report</a></td>
</tr>
</tbody>
</table>
@endif
</div>
<table cellpadding="10" cellspacing="0" style="margin: 0;">
<tbody>
<tr>
<td bgcolor="#D3D3D3" style="font-size: 14px;line-height: 1.7;color: #333;">
<span class="font-weight-bold" style="color: red;">Risk Warning : </span>Forex, Futures, and Options trading, Crypto Trading has large potential rewards, but also large potential risks. The high degree of leverage can work against you as well as for you. You must be aware of the risks of investing in forex, futures, and options, Crypto and be willing to accept them in order to trade in these markets. Forex trading involves substantial risk of loss and is not suitable for all investors. Please do not trade with borrowed money or money you cannot afford to lose.
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
@endcomponent