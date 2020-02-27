@component('mail::message')
<div style="margin: 1.5rem 1rem;">
    <p>
        You have received this email because of a password recovery for the user account "InvestingPartner" was instigated by you on InvestingPartner.
    </p>
    @component('mail::button', ['url' => config('app.url')."/password-reset?token=".$token])
        CLICK HERE TO RESET PASSWORD
    @endcomponent
    <p><strong style="color: red">IMPORTANT NOTICE</strong></p>
    <p>
    If you did not request this password change, please IGNORE and DELETE this email immediately. Only continue if you wish your password to be reset!
    </p>

    <p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.name') }}</a></p>
</div>


@endcomponent