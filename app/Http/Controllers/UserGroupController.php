<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserGroup;
class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required|string',
            'parent_id' => 'string',
        ]);

        if (request('parent_id') == 'null') {
            UserGroup::create([
                'name' => request('name')
            ]);
        }
        else {
            UserGroup::create([
                'name' => request('name'),
                'parent_id' => request('parent_id'),
            ]);
        }

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $usergroup)
    {
        $rootGroups = UserGroup::getRootGroups();
        return view('users.group.show', compact('usergroup'), compact('rootGroups'));
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
     * Additionally, moves all child groups/users up one level in the heirarchy
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = UserGroup::find($id);
        $parent_id = $group->parent_id;
        $parentGroup = UserGroup::find($parent_id);
        $children = $group->getChildGroups()->get();
        while($children->first()!=null)
        {
            $currChild = $children->shift();//gets the first element, removes from collection
            $currChild->parent_id = $parent_id;
            $currChild->save();
        }
        $children = $group->getChildUsers()->get();
        while($children->first()!=null)
        {
            $currChild = $children->shift();
            $currChild->user_groups()->detach($group);
            if($parentGroup!=null)
                $currChild->user_groups()->attach($parentGroup);
            $currChild->save();
        }
        $group->delete();
        return redirect('/users/index');
    }

    public function destroyWithChildren($id)
    {
        $group = UserGroup::find($id);
        $parent_id = $group->parent_id;
        $parentGroup = UserGroup::find($parent_id);
        $childUsers = $group->getChildUsers()->get();
        $childGroups = $group->getChildGroups()->get();
        while($childGroups->first()!=null)
        {
            $currChild = $childGroups->shift();
            $childUsers = $childUsers->merge($currChild->getChildUsers()->get());
            $currChild->delete();
        }
        while($childUsers->first()!=null)
        {
            $currChild = $childUsers->shift();//gets the first element, removes from collection
            if($currChild->id != Auth::user()->id)
                $currChild->delete();
        }
        $group->delete();
        return redirect('/users/index');
    }

    public function destroyWithChildrenRec($id) //infinite recursion! Not sure why
    {
        $model = null;
        if(UserGroup::find($id) != null)
        {
            $model = UserGroup::find($id);
            $children = $model->getChildUsers()->get();
            while($children->first()!=null)
            {
                $currChild = $children->pop();
                if($currChild->id == Auth::User()->id)
                    continue;
                $currChild->delete();
            }
            $children = $model->getChildGroups()->get();
            while($children->first()!=null)
            {
                $currChild = $children->pop();
                $this->destroyWithChildrenRec($currChild->id);
            }
        }
        else
        {
            $model = User::find($id);
        }
        if($model!=null)
            $model->delete();
        return redirect('/users/index');
    }
}
