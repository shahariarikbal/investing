@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($deposit->member->first_name) }} {{ ucfirst($deposit->member->last_name) }},</p>
<strong>Your deposit request has been canceled</strong>

<p>Your deopsit request via "{{ $method }}"  with transaction id "{{ $deposit->payment_id }}" with amount {{ $deposit->amount }} canceled</p>

<p><b>Reason: </b>{{ $deposit->meta['reason'] }}</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent