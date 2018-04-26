<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Valve;
use App\ValveGroup;
use Auth;

class ValveGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('api')->user();
        if($user){
            return ValveGroup::all();
        }
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$valveGroup = ValveGroup::create($request->all());

        return response()->json($valveGroup, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ValveGroup $valveGroup)
    {
        return $valveGroup;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValveGroup $valveGroup)
    {

        $valveGroup->update($request->all());

        return response()->json($valveGroup, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValveGroup $valveGroup)
    {
        ValveGroup::destroy($valveGroup->id);
        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource recurisvely from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyWithChildren(ValveGroup $valveGroup)
    {
        ValveGroup::destroy($valveGroup->id);
        return response()->json(null, 204);
    }
}
