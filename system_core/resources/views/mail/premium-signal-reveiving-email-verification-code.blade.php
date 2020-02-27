@component('mail::message')
<div style="margin: 1.5rem 1rem;">
<p>
<strong>Please use the following code in order to verify your premium signal receiving email</strong>
</p>
<p>
<code>
{{ $verificationCode }}
<code>
</p>
</div>
@endcomponent