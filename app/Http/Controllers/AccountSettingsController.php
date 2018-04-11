<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserGroup;
use Auth;

class AccountSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account_settings/account_settings');
    }
    
    public function getIndex()
    {
        return Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => 'required|string|min:6',
            'permission' => 'integer|between:1,3'
        ]);

        User::create([
            'name' => request('name'),
            'description' => request('description'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'permission' => request('permission')
        ]);

        return redirect('account_settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('account_settings', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editName(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $user=auth::user();
        if( $request->name != $user->name){
            $user->editName($request->name);
            $user->save();
            return [ 'message' => 'Name successfully updated' ];
        } else {
            return [ 'errors' => 'You entered the same name' ];
        }
    }

    public function editDescription(Request $request)
    {
        $this->validate(request(), [
            'description' => 'required'
        ]);

        $user=auth::user();
        if( $request->description != $user->description){
            $user->editDescription($request->description);
            $user->save();
            return [ 'message' => 'Description successfully updated' ];
        } else {
            return [ 'errors' => 'You entered the same description' ];
        }
    }

    public function editEmail(Request $request)
    {
        $this->validate(request(), [
            'email' => ['required','string','email','max:255','unique:users'],
        ]);

        $user=auth::user();
        if( $request->email != $user->email ){
            $user->editEmail($request->email);
            $user->save();
            return [ 'message' => 'Email successfully updated' ];
        } else {
            return [ 'errors' => 'You entered the same email' ];
        }
    }
    public function editPassword(Request $request)
    {
        $this->validate(request(), [
            'oldpassword' => ['required'],
            'newpassword' => ['required', 'min:6', 'max:255'],
        ]);

        $user=Auth::user();
        $credentials = [ 'email' => $user->email, 'password' => $request->oldpassword ];
        if( Auth::attempt($credentials) ){
            $user->editPassword($request->newpassword);
            $user->save();
            return [ 'message' => 'Password successfully updated', 'oldpassword' => bcrypt($request->oldpassword), 'dbpassword' => $user->password ];
        } else {
            return [ 'errors' => 'Password was incorrect', 'oldpassword' => bcrypt($request->oldpassword), 'dbpassword' => $user->password ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
