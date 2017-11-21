<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view('users')->with(compact('users'));
    }
}
