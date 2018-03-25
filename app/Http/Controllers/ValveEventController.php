<?php

namespace App\Http\Controllers;

use App\ValveEvent;
use Illuminate\Http\Request;

class ValveEventController extends Controller
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
        $valveEvent = new ValveEvent;
        $valveEvent->id = $request->id;
        $valveEvent->valve_id = $request->valve_id;
        $valveEvent->status = $request->status;
        $valveEvent->description = $request->description;
        $valveEvent->valve_group_id = $request->valve_group_id;
        $valveEvent->user_id = $request->user_id;

        $valveEvent->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ValveEvent  $valveEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ValveEvent $valveEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ValveEvent  $valveEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ValveEvent $valveEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ValveEvent  $valveEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValveEvent $valveEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ValveEvent  $valveEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValveEvent $valveEvent)
    {
        //
    }
}
