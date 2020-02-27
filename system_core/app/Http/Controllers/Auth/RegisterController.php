<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Member;
use Carbon\Carbon;
use Fxtutor\Wallet\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Affiliate;
use App\Mail\MemberVarification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberEmailVarification;
use App\Mail\MemberEmailVerification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\MemberEmailVerificationSuccessful;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:member');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'unique:members,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    //    public function showAdminRegisterForm()
    //    {
    //        return View('auth.register', ['url' => 'admin']);
    //    }

    public function showMemberRegisterForm()
    {
        return view('member.auth.register', ['url' => 'member']);
    }

    protected function createMember(Request $request)
    {
        //dd($request->all());

        $this->validator($request->all())->validate();
        $token = Str::random(40);
        //dd($token);
        $member = Member::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'remember_token' => $token,
            'token_expire_at' => Carbon::now()->addHours(24),
        ]);

        ///for affiliate table data insert
        $name = $request->cookie('referral');
        if ($name) {
            $ruser = Member::where('username', $name)->first();
            Affiliate::create([
                'member_id'            => $member->id,
                'ref_id'             => $ruser->id
            ]);
        }


        Mail::to($member->email)->send(new MemberEmailVerification($member, $token));
        return response()->json(['message' => 'A verification email has been sent to your email address. Please confirm your registration in 24 hours'], 201);
        // return redirect()->intended('login/member')->with('message', 'Please Verify Your Email Address');
    }

    public function memberVerify(Request $request)
    {
        // if(!$request->has('token')) {
        //     abort(403);
        // }

        // if($request->token == '') {
        //     abort(403);
        // }

        $member = Member::where('remember_token', $request->token)->first();


        if (!$member) {
        	abort(403);
        }

        if ($member->email_verified_at !== NULL) {
            return redirect('login/member')->with('message', 'Your Email is already verified');
        }


        if ($member->token_expire_at < Carbon::now()) {
            $token = Str::random(40);
            Member::where('id', $member->id)->update([
                'remember_token' => $token,
                'token_expire_at' => Carbon::now()->addHours(24)
            ]);

            Mail::to($member->email)->send(new MemberEmailVerification($member, $token));
            return redirect()->back()->with('message', 'Your verification link has been expaired. And a new verification email has been sent to your email address. Please confirm your registration within 24 hours');
        }

        if ($member) {
            $member->update([
                'email_verified_at' => Carbon::now(),
                'remember_token' => null
            ]);

            // create account row
            $member->account()->create();


            Mail::to($member->email)->send(new MemberEmailVerificationSuccessful($member));
            return redirect('login/member')->with('message', 'Your Email is has been Verified Please Check Your Mail. You Can Login Now..');
        }
    }

    public function isUsernameAvailable(Request $request)
    {
        return response()->json(['available' => Member::where('username', $request->username)->count() === 0], 200);
    }

    public function isEmailAvailable(Request $request)
    {
        return response()->json(['available' => Member::where('email', $request->email)->count() === 0], 200);
    }
}
