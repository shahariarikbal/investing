@component('mail::message')
<div style="margin: 1.5rem 1rem;">
        <p><strong>Mr. {{$contact->name}} contact email</strong></p>

        <p><strong>Contact subject : </strong> {{$contact->subject}}</p>

        @if($contact->department == 1)
        <p><strong>Department name : </strong> General Enquiries</p>
        
        @elseif($contact->department == 2)
        <p><strong>Department name : </strong> Signal Service</p>

        @elseif($contact->department == 3)
        <p><strong>Department name : </strong> Copytrade Service</p>

        @elseif($contact->department == 4)
        <p><strong>Department name : </strong> Fund Management Service</p>

        @elseif($contact->department == 5)
        <p><strong>Department name : </strong> FX Consultancy Service</p>

        @else

        <p><strong>Department name : </strong> Broker Review Submission</p>

        @endif

        <p><strong>Phone number : </strong> {{$contact->phone}}</p>

        <p><strong>Email : </strong> {{$contact->email}}</p>

        <!-- <p><strong>Address : </strong> {{$contact->address}}</p> -->

        <p><strong> Important Message : </strong> {{$contact->message}}</p>
</div>

@endcomponent