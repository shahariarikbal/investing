@component('mail::message')
<div style="margin: 1.5rem 1rem;">
<p>
        Dear {{ $member->first_name }} {{ $member->last_name }},  
</p>
<p>
Your FxSuccessBD account has been successfully verified. In order to login to your account just check on the login button.
</p>

@component('mail::button', ['url' => config('app.url')."/member/login"])
LOGIN ACCOUNT
@endcomponent

<p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.url') }}</a></p>
</div>


@endcomponent