@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<strong>Thank you for creating an account with us. Please verify your Email Address to activate your account in 24 hours.</strong>

In order to complete the registration process, you just need to verify your email address. Simply click the button below to verify your account.

@component('mail::button', ['url' => config('app.url')."/register/member/verify?token=".$token])
Verify Registration
@endcomponent

<p>
You are receiving this email because you recently created an account or changed your email address. If you did not do this, please contact us
</p>

@component('mail.signature')
@endcomponent

</td>
</tr>
</table>
@endcomponent
