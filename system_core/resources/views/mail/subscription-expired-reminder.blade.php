@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<p>Hi, {{ ucfirst($invoice->member->first_name) }} {{ ucfirst($invoice->member->last_name) }},</p>
<strong>Your {{ $invoice->subscriptionDetails->plan->name }} {{ $service }} plan is valid till {{ $invoice->subscriptionDetails->ends_at }}</strong>

<p>Your  {{ $invoice->subscriptionDetails->plan->name }} {{ $service }} plan will expire in {{ $invoice->subscriptionDetails->ends_at }}. Please make sure you have minimum balance of {{ $invoice->subscriptionDetails->plan->price }} available in your wallet for auto renewal process</p>

<h4>Invoice</h4>
<table>
<tr>
<th>Id</th>
<th>Description</th>
<th>Price</th>
</tr>
<tr>
<td>{{ $invoice->items[0]->id }}</td>
<td>{{ $invoice->items[0]->name }} <br /> {{ $invoice->subscriptionDetails->plan->note }}</td>
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