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
            ->with(compact('allGroups'))
            ->with(compact('admins'))
            ->with(compact('employees'))
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
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'string',
            'permission' => 'required|integer|between:1,3'
        ]);

        $newUser = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'permission' => request('permission')
        ]);
            
        return $newUser;
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
     * Show the form for editing User name.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function editName(User $user)
    {
        return view('users.editName', compact('user'));
    }

    /**
     * Show the form for editing User name.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    /*
    public function editEmail(User $user)
    {
        return view('users.editEmail', compact('user'));
    }
    */
    
    /**
     * Show the form for editing User description.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function editDescription(User $user)
    {
        return view('users.editDescription', compact('user'));
    }

    /**
     * Show the form for editing User permission.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function editPermission(User $user)
    {
        return view('users.editPermission', compact('user'));
    }

    /**
     * Update the specified resource's name in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateName(Request $request, User $user)
    {
        $user->editName($request->name);
        $user->save();

        return redirect('users');
    }

    /**
     * Update the specified resource's description in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDescription(Request $request, User $user)
    {
        $user->editDescription($request->description);
        $user->save();

        return redirect('users');
    }

    /**
     * Update the specified resource's permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePermission(Request $request, User $user)
    {
        $user->editPermission($request->permission);
        $user->save();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->unassignAllValves();
        $user->delete();
        return redirect('/users/index');
    }
}
