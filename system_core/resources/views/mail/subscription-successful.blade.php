@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($subscription->member->first_name) }} {{ ucfirst($subscription->member->last_name) }},</p>
<strong>{{ $service }} Subscription Successful</strong>

<p>Subscription of "{{ $subscription->plan->name }}" "{{ $service }}" plan successful and started at {{ $subscription->start_at }} and will be valid till {{ $subscription->ends_at }}</p>

<table>
<tr>
<th>Id</th>
<th>Description</th>
<th>Price</th>
</tr>
<tr>
<td>{{ $invoice->items[0]->id }}</td>
<td>{{ $invoice->items[0]->name }} <br /> {{ $subscription->plan->note }}</td>
<td>{{ $invoice->items[0]->price }}</td>
</tr>
</table>

<table class="total-table">
<tbody>
<tr>
<td>
<div>Remarks / Payment Instructions</div>
</td>
<td>
<div class="subtototal">Subtotal<span class="border">_____________________</span><span>{{ $invoice->sub_total_price }}</span>
</div>
</td>
</tr>
<tr>
<td colspan="2">
<div class="subtototal">Discount<span class="border">_____________________</span><span>{{ $invoice->discount_price }}</span>
</div>
</td>
</tr>
<tr>
<td colspan="2">
<div class="subtototal">Subtotal less discount<span class="border">_____________________</span><span>{{ $invoice->after_discount_price }}</span></div>
</td>
</tr>
<tr>
<td colspan="2">
<div class="subtototal">Total Tax<span class="border">_____________________</span><span>{{ $invoice->tax_price }}</span>
</div>
</td>
</tr>
<tr>
<td colspan="2">
<div class="last-total">
<span class="name">Total Price</span>
<span>{{ $invoice->total_price }}</span>
</div>
</td>
</tr>
</tbody>
</table>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent
