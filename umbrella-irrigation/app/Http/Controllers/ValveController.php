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
        $this->validate(request(), [
            'parent_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'latitude' => 'required|double',
            'longitude' => 'required|double',
            'min_flow_limit' => 'required|double',
            'max_flow_limit' => 'required|double',
            'nominal_flow_limit' => 'required|double',
            'curr_flow' => 'required|double',
            'max_gpm' => 'required|double',
            'min_voltage' => 'required|double',
            'max_voltage' => 'required|double',
            'curr_voltage' => 'required|double',
            'normally_open' => 'required|boolean',
            'is_parent' => 'required|boolean',
            'surpressed' => 'required|boolean',
            'postponed' => 'required|boolean',
            'shutdown' => 'required|boolean',
            'alert' => 'required|boolean',
            'overriden' => 'required|boolean'
        ]);

        Valve::create([
            'parent_id' => request('parent_id'),
            'name' => request('name'),
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
            'surpressed' => request('surpressed'),
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
        //
    }
}
