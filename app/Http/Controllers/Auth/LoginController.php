<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function apiLogin(Request $request)
    {
        $this->validateLogin($request);

        if($this->attemptLogin($request)){
            $user = $this->guard()->user();
            if($request->wantsJson()){
                $user->generateToken();
                return response()->json(['data' => $user->toArray(),
                ]);
            }
            else
                return redirect('/login')->with('status',$status);

            
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function apiLogout(Request $request)
    {
        $user = Auth::guard('api')->user();
        if($user){
            $user->api_token = null;
            $user->save();
            return response()->json(['data'=>'user logged out'], 200);
        }
        else
            return response()->json(['data'=>'user does not exist'], 400);
    }
}
