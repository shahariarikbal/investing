@component('mail::table')
Thank you,<br>
{{ config('app.name') }} Team<br>
[www.investingpartner.net]({{ url(config('app.url')) }})
@endcomponent
