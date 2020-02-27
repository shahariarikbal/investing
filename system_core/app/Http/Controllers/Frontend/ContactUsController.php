<?php

namespace App\Http\Controllers\Frontend;

use App\Contact;
use App\CustomerEmail;
use App\Mail\CustomerContactEmail;
use App\Mail\MemberVarification;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;
use App\Mail\CustomerEmailForAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends FrontendController
{

    public function index()
    {
        Meta::prependTitle('Contact Us');
        return view('frontend.contact.contact-us');
    }

    public function customerContactMail(Request $request)
    {
       $contact = new Contact();
       $contact->department   = $request->department;
       $contact->priority     = $request->priority;
       $contact->name         = $request->name;
       $contact->email        = $request->email;
       $contact->phone        = $request->phone;
    //    $contact->address      = $request->address;
       $contact->subject      = $request->subject;
       $contact->message      = $request->message;
       $contact->save();

        Mail::to($contact->email)->send(new CustomerContactEmail($contact));
        Mail::to(env('DEFAULT_ADMIN_EMAIL'))->send(new CustomerEmailForAdmin($contact));
        return response()->json(['message' => 'Thank you for contact us. we will get back to you soon'], 200);
    }


}
