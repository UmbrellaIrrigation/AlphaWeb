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
        $valveGroup = new ValveGroup;
        $valveGroup->id = $request->id;
        $valveGroup->name = $request->name;
        $valve->parent_valve_group = $request->parent_valve_group;

        $valveGroup->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('valvegroups.show', compact('valvegroup'));
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
        $valveGroup = ValveGroup::find($id);
        $valveGroup->delete();
        return redirect('/valvegroups/index');
    }
}
