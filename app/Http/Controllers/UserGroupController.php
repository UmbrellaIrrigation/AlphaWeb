<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserTree;
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
        $tree = UserTree::getGroupTree();
        return response($tree, 200);
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

        $usergroup = null;
        if (request('parent_id') == 'null') {
            $usergroup = UserGroup::create([
                'name' => request('name')
            ]);
        }
        else {
            $usergroup = UserGroup::create([
                'name' => request('name'),
                'parent_id' => request('parent_id'),
            ]);
        }

        return response()->json($usergroup, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $usergroup)
    {
        return response()->json($usergroup, 200);
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
    public function destroy(UserGroup $usergroup)
    {
        $parent_id = $usergroup->parent_id;
        $parentGroup = UserGroup::find($parent_id);
        $children = $usergroup->getChildGroups()->get();

        while($children->first()!=null)
        {
            $currChild = $children->shift();//gets the first element, removes from collection
            $currChild->parent_id = $parent_id;
            $currChild->save();
        }
        $children = $usergroup->getChildUsers()->get();

        while($children->first()!=null)
        {
            $currChild = $children->shift();
            $currChild->user_groups()->detach($usergroup);
            if($parentGroup!=null)
                $currChild->user_groups()->attach($parentGroup);
            $currChild->save();
        }
        $usergroup->delete();

        return response(200);
    }

    public function destroyWithChildren(UserGroup $usergroup) //infinite recursion! Not sure why
    {
        $model = null;
        if($usergroup != null)
        {
            $model = $usergroup;
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
                $this->destroyWithChildren($currChild->id);
            }
        }
        else
        {
            $model = $usergroup;
        }
        if($model!=null)
            $model->delete();

        return response(200);
    }
}
