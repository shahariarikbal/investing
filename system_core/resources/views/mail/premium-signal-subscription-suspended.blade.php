@component('mail::message')
<div style="margin: 1.5rem 1rem;">
    <p>
        Dear {{ $member->first_name }} {{ $member->last_name }},
    </p>
    <p>
    <strong style="color: red">Your Premium Signal Package Suspended now!</strong>
    </p>
    <p>
    You won’t get any signal service email from FxSucessBD. If you think this is a technical issue then please contact us immediately.    
    </p>
    <p>
        We have a 24/5 support team to help and guide you. So don’t hesitate to contact us if you need any assistance.
    </p>
    <p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.url') }}</a></p>
</div>

@endcomponent