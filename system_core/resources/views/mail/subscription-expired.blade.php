@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($withdraw->member->first_name) }} {{ ucfirst($withdraw->member->last_name) }},</p>
<strong>Your withdraw request has been approved</strong>

<p>Your withdraw request to "{{ $withdraw->method }}" having account number "{{ $withdraw->meta['account'] }}" with amount {{ $withdraw->amount }} approved</p>

<p><b>Transaction ID: </b>{{ $withdraw->payment_id }}</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent