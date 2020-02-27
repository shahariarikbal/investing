@component('mail::message')
<div style="margin: 1.5rem 1rem;">
        <p><strong>Mr. {{$contact->name}} thank you for conatct with us.</strong></p>

        <p><strong>You are receiving this email. we will get back to you soon</strong></p>

        <p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.name') }}</a></p>
</div>

@endcomponent