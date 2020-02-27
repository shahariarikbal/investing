<?php

namespace App\Http\Controllers\API\V1;

use Exception;
use App\Member;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\MemberVarification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberEmailVerification;
use App\Profile;
use Illuminate\Support\Facades\Validator;

class MemberController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return response()->json(\App\Country::select(['code', 'name'])->get(), 200);
    }

    public function uploadAvater(Request $request)
    {
        $validator = Validator::make($request->all(), ['avater' => 'mimes:jpeg,png,pdf']);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profile = $request->user()->profile;

        if ($profile) {
            \FileUpload::remove('user', $profile->avater, ['avater sm', 'avater xs']);
        }

        $avater = \FileUpload::upload('user', $request->file('avater'), ['avater sm', 'avater xs']);

        is_null($profile) ? 
            $request->user()->profile()->create(['avater' => $avater]) : 
            $request->user()->profile()->update(['avater' => $avater]);
        
        return response()->json(['message' => 'Avater upload successful', 'type' => 'success', 'avater' => $avater], 200);
    }

    public function updateProfile(Request $request)
    {
        // validation
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string'
        ];
        if ($request->has('avater')) { // add avater validation if present
            $rules['avater'] = 'mimes:jpeg,png,pdf';
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $member = Member::find($request->user()->id);

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->save();

        if(is_null($member->profile)) {

            $avater = $request->has('avater') ? \FileUpload::upload('user', $request->file('avater'), ['avater sm', 'avater xs']) : NULL;

            Profile::create([
                'member_id' => $request->user()->id,
                'avater' => $avater,
                'sex' => $request->sex,
                'country_code' => $request->country_code,
                'city_code' => $request->city_code,
                'zip' => $request->zip,
                'address' => $request->address,
                'contact' => $request->contact
            ]);

            return Member::find($request->user()->id);
        }

        $avater = $member->profile->avater;
        if ($request->has('avater') && $member->profile->avater) {
            \FileUpload::remove('user', $member->profile->avater, ['avater sm', 'avater xs']);
            $avater = \FileUpload::upload('user', $request->file('avater'), ['avater sm', 'avater xs']);
        }

        $member->profile->update([
            'avater' => $avater,
            'sex' => $request->sex,
            'country_code' => $request->country_code,
            'city_code' => $request->city_code,
            'zip' => $request->zip,
            'address' => $request->address,
            'contact' => $request->contact
        ]);

        return $member;

    }

    public function changePassword(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
            'retype_password' => 'same:new_password'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->current_password === $request->new_password) {
            return response()->json(['new_password' => [ 'New password and current password can not be matched' ]], 422);
        }

        // check current password is valid
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return response()->json(['current_password' => ['Current password is not correct.']], 422);
        }

        $member = $request->user();
        $member->password = Hash::make($request->new_password);
        if ($member->save()) {
            return response([], 204);
        }

        return response(['others' => ['Something went wrong while changing password. Please contact with support team']], 422);
    }

    public function authCheck(Request $request)
    {
        return auth('api')->user();
    }

    public function memberRegister(Request $request)
    {
        // return request()->all();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:members,email',
            'password' => 'required|confirmed|string|min:8',
        ]);

        $member = new Member();
        $token = Str::random(100);
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->password = bcrypt($request->password);
        $member->remember_token = $token;
        $member->save();

        Mail::to($member->email)->send(new MemberVarification($member, $token));
        
        
        return $member;
    }

    public function memberVerify($token)
    {
       $member = Member::where('remember_token', $token)->first();
       if ($member){
           $member->update([
               'email_verified_at' => Carbon::now(),
               'remember_token' => '',
           ]);
           
           Mail::to($member->email)->send(new MemberEmailVerification($member));
           
           
       }

    }

    public function memberLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|email|exists:members,email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $http = new \GuzzleHttp\Client;

        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password
                ]
            ]);

            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json(['message' => 'Invalid Request. Please enter a username or a password.'], $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json(['message' => 'Your credentials are incorrect. Please try again'], $e->getCode());
            }

            return response()->json(['message' => 'Something went wrong on the server.'], $e->getCode());
        }
    }

    public function memberLogout (Request $request)
    {
        if (is_null(auth('api')->user())) {
            return response()->json(['error' => 'Bad Request'], 400);
        }

        auth('api')->user()->token()->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Logged out successfully'], 200);

    }
}
