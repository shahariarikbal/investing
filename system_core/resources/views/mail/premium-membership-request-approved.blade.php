@component('mail::message')
<div style="margin: 1.5rem 1rem;">
    <p>
        Dear {{ $member->first_name }} {{ $member->last_name }},
    </p>
    <p><strong>Congratulations! Your Premium Signal Package now Active.</strong></p>
    <p>
    Please take some time and understand properly about the premium signal system. You can get all the information from our knowledge & FAQ base section. We have an automated Signal Report page where you can track our daily signal performance.
    </p>
    <p>
        We have a 24/5 support team to help and guide you. So don’t hesitate to contact us if you need any assistance.
    </p>
    <p>
        <ul style="color: #4e5052;">
            <li><a href="{{ url('/premium-forex-signal') }}">Premium Signal</a></li>
            <li><a href="{{ url('/forex-signal-report') }}">Signal Report</a></li>
            <li><a href="{{ url('/forex-signal-faq') }}">Signal FAQ</a></li>
            <li><a href="{{ url('/knowledge-base') }}">Knowledge Base </a></li>
        </ul>
    </p>
    <p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.url') }}</a></p>

    <p style="text-align:center;font-weight:bold;font-size:14px;">STAY CONNECTED</p>

    <ul style="color: #4e5052;text-align:center;">
        <li style="display: inline-block;margin-left:10px;"><a href="https://www.facebook.com/groups/Fxsuccessbd/"><img style="max-width:100%;" src="http://www.fxsuccessbd.com/social-image/facebook-page.png" alt="facebook-page"></a></li>
        <li style="display: inline-block;margin-left:10px;"><a href="https://www.youtube.com/channel/UCSmPA8UqA0yBR2HTRaZL8wQ"><img style="max-width:100%;" src="http://www.fxsuccessbd.com/social-image/youtube-pic.png" alt="youtube-channel"></a></li>
    </ul>
</div>

@endcomponent