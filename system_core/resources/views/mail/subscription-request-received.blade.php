@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($subscription->member->first_name) }} {{ ucfirst($subscription->member->last_name) }},</p>
<strong>Your subscription request has been received</strong>

<p>Subscription of "{{ $subscription->plan->name }}" "{{ $service }}" plan successfully received and waiting for payment and/or admin approval</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent