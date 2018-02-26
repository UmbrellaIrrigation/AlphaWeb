<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valve;
use App\ValveGroup;

class ValveController extends Controller
{

    public function main() 
    {
        $rootValves = Valve::getRootValves();
        $rootGroups = ValveGroup::getRootValveGroups();
        $allGroups = ValveGroup::getAllGroups();

        return view('valves.main', 
            compact('rootValves'), compact('rootGroups'))->with(compact('allGroups'));
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
        $this->validate(request(), [
            'parent_id' => 'nullable|string|max:255',
            'name' => 'unique:valves,name|required|string|max:255',
            'description' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'min_flow_limit' => 'required|numeric',
            'max_flow_limit' => 'required|numeric',
            'nominal_flow_limit' => 'required|numeric',
            'curr_flow' => 'required|numeric',
            'max_gpm' => 'required|numeric',
            'min_voltage' => 'required|numeric',
            'max_voltage' => 'required|numeric',
            'curr_voltage' => 'required|numeric',
            'normally_open' => 'boolean',
            'is_parent' => 'boolean',
            'suppressed' => 'boolean',
            'postponed' => 'boolean',
            'shutdown' => 'boolean',
            'alert' => 'boolean',
            'overriden' => 'boolean'
        ]);

        Valve::create([
            'parent_id' => request('parent_id'),
            'name' => request('name'),
            'description' => request('description'),
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
            'min_flow_limit' => request('min_flow_limit'),
            'max_flow_limit' => request('max_flow_limit'),
            'nominal_flow_limit' => request('nominal_flow_limit'),
            'curr_flow' => request('curr_flow'),
            'max_gpm' => request('max_gpm'),
            'min_voltage' => request('min_voltage'),
            'max_voltage' => request('max_voltage'),
            'curr_voltage' => request('curr_voltage'),
            'normally_open' => request('normally_open'),
            'is_parent' => request('is_parent'),
            'suppressed' => request('suppressed'),
            'postponed' => request('postponed'),
            'shutdown' => request('shutdown'),
            'alert' => request('alert'),
            'overriden' => request('overriden')
        ]);

        return redirect('valves');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Valve $valve)
    {
        return view('valves.show', compact('valve'));
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
        $valve = Valve::find($id);
        $valve->unassignAllUsers();
        $valve->delete();
        return redirect('/valves/index');
    }
}
