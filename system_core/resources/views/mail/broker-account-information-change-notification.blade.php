@component('mail::message')
<div style="margin: 1.5rem 1rem;">
    <p>
        <strong>Broker Account Information Change Notification</strong>
        <h3>Member Information</h3>
        <ul>
            <li><b>Full Name: </b>{{ $member->first_name }} {{ $member->last_name }}</li>
            <li><b>Email: </b>{{ $member->email }}</li>
        </ul>
    </p>
    <p>
        <h3>Previous Information:</h3>
        <ul>
            @foreach ($keys as $key)
            <li><b>{{ $key }}: </b>{{ $previous[$key] }}</li>
            @endforeach
        </ul>
    </p>
    <p>
        <h3>New Information:</h3>
        <ul>
            @foreach ($keys as $key)
            <li><b>{{ $key }}: </b>{{ $new[$key] }}</li>
            @endforeach
        </ul>
    </p>
</div>

@endcomponent