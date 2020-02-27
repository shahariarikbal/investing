<?php

namespace App\Http\Controllers\Auth;

use App\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\MemberForgotPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetSuccessMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgotPassword()
    {
        return view('member.auth.forgot-password');
    }

    public function isEmailAvailable (Request $request)
    {
        return response()->json(['available' => Member::where('email', $request->email)->count() != 0], 200);
    }

    public function resetLink(Request $request)
    {
        $member = Member::select('email')->where('email', $request->email)->first();
        $token = Str::random(100);

        if ($member) {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token'  => $token
            ]);
            Mail::to($member->email)->send(new MemberForgotPassword($token));
            if ($request->wantsJson()) {
                return response()->json(['success' => 'Your password reset link sent your mail.']);
            } else {
                return redirect()->back()->with('success', 'Your password reset link sent your mail.');
            } 
        }else {
            return redirect()->back()->with('warning', 'This email is not registered in our system');
        }
    }

    public function resetPasswordForm()
    {
        return view('member.auth.password-reset');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token'    => ['required', 'exists:password_resets,token']
        ]);
    }

    public function passwordUpdate(Request $request)
    {
        $this->validator($request->all())->validate();

        $email = DB::table('password_resets')->select('email')->where('token', $request->token)->first()->email;

        $member = Member::where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);
        Mail::to($email)->send(new PasswordResetSuccessMail($member));

        return redirect()->back()->with('success', 'Your password has been changed');
    }
}
