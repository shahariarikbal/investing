@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($subscription->member->first_name) }} {{ ucfirst($subscription->member->last_name) }},</p>
<strong>Your subscription cancel request has been received</strong>

<p>Subscription of "{{ $subscription->plan->name }}" "{{ $service }}" plan cancellation request has been received and waiting for admin approval. Once approved you will get notified. Thank you!</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent