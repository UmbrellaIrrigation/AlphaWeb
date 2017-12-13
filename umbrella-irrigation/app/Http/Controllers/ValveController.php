<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valve;

class ValveController extends Controller
{

    public function main() 
    {
        return view('valves.main');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$valves = Valve::getValveWithValveGroups()->get();
        
        return view('valves.index');
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
        $valve = new Valve;
        $valve->id = $request->id;
        $valve->parent_id = $request->parent_id;
        $valve->name = $request->name;
        $valve->description = $request->description;
        $valve->latitude = $request->latitude;
        $valve->longitude = $request->longitude;
        $valve->min_flow = $request->min_flow;
        $valve->max_flow = $request->max_flow;
        $valve->current_flow = $request->current_flow;
        $valve->min_voltage = $request->min_voltage;
        $valve->max_voltage = $request->max_voltage;
        $valve->current_voltage = $request->current_voltage;
        $valve->normally_open = $request->normally_open;
        $valve->is_parent = $request->is_parent;
        $valve->suppressed = $request->supressed;
        $valve->postponed = $request->postponed;
        $valve->shutdown = $request->shutdown;
        $valve->alert = $request->alert;
        $valve->overriden = $request->overriden;

        $valve->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
