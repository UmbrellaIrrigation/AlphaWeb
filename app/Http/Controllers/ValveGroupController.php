<?php

namespace App\Http\Controllers;

use App\ValveGroup;
use Illuminate\Http\Request;

class ValveGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valveGroups = Valve::getValveGroupWithValves()->get();
        return view('valve_groups')->with(compact('valveGroups'));
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
            'name' => 'unique:valvegroups,name|required|string|max:255',
            'parent_id' => 'nullable|string|max:255'

        ]);

        Valve::create([
            'name' => request('name'),
            'parent_id' => request('parent_id')
        ]);

        return redirect('valvegroups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ValveGroup $valvegroup)
    {
        $rootGroups = ValveGroup::getRootGroups();
        return view('valves.group.show', compact('valvegroup'), compact('rootGroups'));
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
        $group = ValveGroup::find($id);
        if($group == null)
            return redirect('/valves/index');
        $parentId = $group->parent_id;
        $parentGroup = ValveGroup::find($parentId);
        $childGroups = $group->getChildGroups()->get();
        $childValves = $group->getChildValves()->get();

        while($childGroups->first() != null)
        {
            $currChild = $childGroups->shift();
            $currChild->parent_id = $parentId;
            $currChild->save();
        }

        while($childValves->first() != null)
        {
            $currChild = $childValves->shift();
            $currChild->valvegroups()->detach($group);
            if($parentGroup != null)
                $currChild->valvegroups()->attach($parentGroup);
            $currChild->save();
        }

        $group->delete();
        return redirect('/valves/index');
    }

    public function destroyWithChildren($id)
    {
        $model = null;
        if(ValveGroup::find($id)!=null)
        {
            $group = ValveGroup::find($id);
            $parentId = $group->parent_id;
            $parentGroup = ValveGroup::find($parentId);
            $childGroups = $group->getChildGroups()->get();
            $childValves = $group->getChildValves()->get();
            while($childValves->first()!=null)
            {
                $currChild = $childValves->pop();
                $currChild->delete();
            }
            while($childGroups->first()!=null)
            {
                $currChild = $childGroups->pop();
                $this->destroyWithChildren($currChild->id);
            }
            $group->delete();
        }
        else
            $model = Valve::find($id);
        if($model!=null)
            $model->delete();
        return redirect('/valves/index');
    }
}
