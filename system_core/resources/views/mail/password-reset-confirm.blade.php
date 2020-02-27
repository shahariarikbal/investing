@component('mail::message')
<div style="margin: 1.5rem 1rem;">
        
        <p><strong>Your password has been successfully changed. You can login now</strong></p>

        @component('mail::button', ['url' => config('app.url')."/login/member"])
            LOGIN ACCOUNT
        @endcomponent

        <p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.url') }}</a></p>
</div>

@endcomponent