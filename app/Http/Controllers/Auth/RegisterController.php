<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Rules\ValidateEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\VerifyUser;
use App\Mail\VerifyMail;

use Mail;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255','unique:users', new ValidateEmail()],
            'password' => 'required|string|min:6|confirmed',
            'permission' => 'integer|between:1,3'
            //maybe add notification_preference here
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token',$token)->first();
        if(isset($verifyUser))
        {
            $user = $verifyUser->user;
            if(!$user->verified)
            {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your email is verified. You can now log in.";
            }
            else
            {
                $status = "Your email is already verified. You can log in.";
            }
        }
        else
        {
            return redirect('/login')->with('warning',"Sorry, your email cannot be identified");
        }
        return redirect('/login')->with('status',$status);
    }
}
