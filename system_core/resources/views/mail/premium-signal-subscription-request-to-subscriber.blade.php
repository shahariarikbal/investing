@component('mail::message')
<div style="margin: 1.5rem 1rem;">
        <p>
            Dear {{ $premiumMember->member->first_name }} {{ $premiumMember->member->last_name }},
        </p>
        <p>
        <strong>Your Premium Signal Request was Successfully Submitted.</strong>
        </p>
        <p>
        Hey, We have received your premium signal activation request. Please note that we may need up to 24 hours to activate your premium signal service. 
        </p>
        <p>
        Please be confirmed that you have successfully followed all the instructions in order to activate the premium signal service. Please check all the essentials link below for further reference. 
        </p>
        <ul style="color: #4e5052;">
            <li><a href="{{ url('/premium-forex-signal') }}">Premium Signal</a></li>
            <li><a href="{{ url('/forex-signal-report') }}">Signal Report</a></li>
            <li><a href="{{ url('/forex-signal-faq') }}">Signal FAQ</a></li>
            <li><a href="{{ url('/knowledge-base') }}">Knowledge Base </a></li>
        </ul>
        
        <p>Thank You, <br />{{ config('app.name') }} Team <br /><a style="text-decoration:none;" href="{{ url(config('app.url')) }}">{{ config('app.url') }}</a></p>

        <p style="text-align:center;font-weight:bold;font-size:14px;">STAY CONNECTED</p>

    <ul style="color: #4e5052;text-align:center;">
        <li style="display: inline-block;margin-left:10px;"><a href="https://www.facebook.com/groups/Fxsuccessbd/"><img style="max-width:100%;" src="http://www.fxsuccessbd.com/social-image/facebook-page.png" alt="facebook-page"></a></li>
        <li style="display: inline-block;margin-left:10px;"><a href="https://www.youtube.com/channel/UCSmPA8UqA0yBR2HTRaZL8wQ"><img style="max-width:100%;" src="http://www.fxsuccessbd.com/social-image/youtube-pic.png" alt="youtube-channel"></a></li>
    </ul>
</div>

@endcomponent