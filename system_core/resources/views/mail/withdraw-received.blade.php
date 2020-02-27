@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($withdraw->member->first_name) }} {{ ucfirst($withdraw->member->last_name) }},</p>
<strong>Your withdraw request has been successfully received</strong>

<p>We are getting a withdraw request from your account to "{{ $withdraw->method }}" having account number "{{ $withdraw->meta['account'] }}" with amount {{ $withdraw->amount }}</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent