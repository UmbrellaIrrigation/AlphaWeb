<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserGroup;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function main() {
        $rootUsers = User::getRootUsers();
        $rootGroups = UserGroup::getRootGroups();
        $allGroups = UserGroup::getAllGroups();
        $admins = User::getAdmins();
        $employees = User::getEmployees();
        $guests = User::getGuests();
        return view('users.main', compact('rootUsers'), compact('rootGroups'))
            ->with(compact('allGroups'))->with(compact('admins'))->with(compact('employees'))
            ->with(compact('guests'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
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

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
