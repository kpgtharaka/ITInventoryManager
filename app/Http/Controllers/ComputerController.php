<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Monitor;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $computers = Computer::query();
        if (!empty($q)) {
            $computers = $computers->orWhere('serial', 'LIKE', '%' . $q . '%');
            $computers = $computers->orWhere('make', 'LIKE', '%' . $q . '%');
            $computers = $computers->orWhere('model', 'LIKE', '%' . $q . '%');
        }
        $computers = $computers->orderBy("id", "desc")
            ->paginate();

        return view("computer.index", ['computers' => $computers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'serial' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string'],
            'purchased_date' => ['required', 'string'],
            'price' => ['required', 'string']
        ]);
        //$data['user_id'] = $request->user()->id;
        $computer = Computer::create($data);
        

        return to_route('computer.show', $computer)->with('message', 'Computer was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        $monitors = Monitor::all();
        $attachedMonitorIds = $computer->monitors->pluck('id')->toArray();
        $availableMonitors = $monitors->filter(function ($monitor) use ($attachedMonitorIds) {
            return !in_array($monitor->id, $attachedMonitorIds);
        });

        return view('computer.show', ['computer' => $computer,'monitors' => $availableMonitors]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {
        return view('computer.edit', ['computer' => $computer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $computer)
    {
        $data = $request->validate([
            'serial' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string'],
            'purchased_date' => ['required', 'string'],
            'price' => ['required', 'string']
        ]);

        $computer->update($data);

        return to_route('computer.show', $computer)->with('message', 'Computer was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return to_route('computer.index')->with('message', 'Computer was deleted');
    }

    public function bind(Computer $computer){
        $monitor = request('monitor');
        $computer->monitors()->attach($monitor);
        return to_route('computer.show', $computer)->with('message', 'Monitor was attached');

    }

    public function unbind(Computer $computer)
    {
        $monitor = request('monitor');
        if(! $computer->monitors()->detach($monitor)){
            dd($computer);
        }
        return to_route('computer.show', $computer)->with('message', 'Monitor was deattached');

    }

}
