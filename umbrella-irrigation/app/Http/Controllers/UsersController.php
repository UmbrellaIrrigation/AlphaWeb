<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::getUsers();
        return view('users')->with(compact('users'));
    }
}
