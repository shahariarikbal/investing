@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($subscription->member->first_name) }} {{ ucfirst($subscription->member->last_name) }},</p>
<strong>Your subscription request has been canceled</strong>

<p>Subscription of "{{ $subscription->plan->name }}" "{{ $service }}" plan has been canceled</p>

<p><b>Reason: </b>{{ $subscription->meta['cancel_reason'] }}</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent