@component('mail::message')
<table cellpadding="10">
<tr>
<td>
<strong>Thank you {{ $member->full_name }}.  Your email is successfully verifyed, your can login now.</strong>
@component('mail::button', ['url' => config('app.url')."/login/member"])
Login Now
@endcomponent
@component('mail.signature')
@endcomponent
</td>
</tr>
</table>
@endcomponent