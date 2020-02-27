@component('mail::message')
<div style="margin: 1.5rem 1rem;">
    <p>
        Dear {{ $member->first_name }} {{ $member->last_name }}, </p>
    <p>
    <strong>Welcome to FxSuccessBD! Please review this email in its entirety as it contains important information.</strong>
    </p>

    <p>
        <strong>{{ config('app.name') }} key Services: </strong>
        These are our key services that can lead your trading career in the proper direction. 
    </p>

    <ul style="color: #4e5052;">
        <li><a href="{{ url('/') }}">Free Forex Education</a></li>
        <li><a href="{{ url('/forex-signal') }}">Forex Signal</a></li>
        <li><a href="{{ url('/forex-analyses') }}">Market Analysis</a></li>
        <li><a href="{{ url('/forex-article') }}">Forex Educational Article</a></li>
        <li><a href="{{ url('/forex-brokers') }}">Forex Broker Reviews</a></li>
    </ul>

    <p>
        <strong>FxSuccessBD Support System: </strong>
        We have a strong Support system so just take a look.
    </p>

    <ul style="color: #4e5052;">
        <li><a href="/knowledge-base">Knowledge Base</a></li>
        <li><a href="/fxquestion">FAQ Section</a></li>
        <li><a href="/contact">Contact Support</a></li>
    </ul>

    <p style="text-align:center;font-weight:bold;font-size:14px;">STAY CONNECTED</p>

    <ul style="color: #4e5052;text-align:center;">
        <li style="display: inline-block;margin-left:10px;"><a href="https://www.facebook.com/groups/Fxsuccessbd/"><img style="max-width:100%;" src="http://www.fxsuccessbd.com/social-image/facebook-page.png" alt="facebook-page"></a></li>
        <li style="display: inline-block;margin-left:10px;"><a href="https://www.youtube.com/channel/UCSmPA8UqA0yBR2HTRaZL8wQ"><img style="max-width:100%;" src="http://www.fxsuccessbd.com/social-image/youtube-pic.png" alt="youtube-channel"></a></li>
    </ul>

</div>
@endcomponent