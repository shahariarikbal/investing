@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($deposit->member->first_name) }} {{ ucfirst($deposit->member->last_name) }},</p>
<strong>Your deposit request has been successfully received</strong>

<p>We are getting a deposit request from your account via "{{ $method }}" with transaction id "{{ $deposit->payment_id }}" with amount {{ $deposit->amount }}</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent