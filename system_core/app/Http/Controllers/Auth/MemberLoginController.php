<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Cookie;

class MemberLoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/member/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:member')->except('logout');
    }

    public function showLoginForm()
    {
        return view('member.auth.login-member', ['url' => 'member']);
    }

    protected function guard()
    {
        return Auth::guard('member');
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($request->ajax()) {
            $token = $user->createToken('Investing Partner Personal Access Client')->accessToken;
            Cookie::queue(Cookie::make('access_token', $token, 24 * 60));

            return response()->json([
                                        'redirect_to' => $this->redirectPath(),
                                        'auth' => auth()->guard('member')->user(),
                                        'access_token' => $token
                                    ], 200);
        }
    }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'   => 'required|email|exists:members,email',
    //         'password' => 'required|min:8'
    //     ]);

    //     if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended('/member');
    //     }
    //     return redirect()->back()->with('error', 'Email or Password is Incorrect Please try again');
    // }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        if (is_null(auth('api')->user())) {
            return response()->json(['error' => 'Bad Request'], 400);
        }

        auth('api')->user()->token()->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Logged out successfully'], 200);

        // return redirect('/')->with('messages', 'You are successfully logged out.');
    }

}
