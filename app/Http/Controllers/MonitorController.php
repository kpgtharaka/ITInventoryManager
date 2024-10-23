<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $monitors = Monitor::query();
        if (!empty($q)) {
            $monitors = $monitors->orWhere('serial', 'LIKE', '%' . $q . '%');
            $monitors = $monitors->orWhere('make', 'LIKE', '%' . $q . '%');
            $monitors = $monitors->orWhere('model', 'LIKE', '%' . $q . '%');
        }
        $monitors = $monitors->orderBy("id", "desc")
            ->paginate();
        return view("monitor.index", ['monitors' => $monitors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monitor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'serial' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string']
        ]);
        //$data['user_id'] = $request->user()->id;
        $monitor = Monitor::create($data);

        return to_route('monitor.show', $monitor)->with('message', 'Monitor was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monitor $monitor)
    {
        $computers = Computer::all();
        $attachedComputerIds = $monitor->computers->pluck('id')->toArray();
        $availableComputers = $computers->filter(function ($computer) use ($attachedComputerIds) {
            return !in_array($computer->id, $attachedComputerIds);
        });

        return view('monitor.show', ['monitor' => $monitor,'computers'=> $availableComputers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitor $monitor)
    {
        return view('monitor.edit', ['monitor' => $monitor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitor $monitor)
    {
        $data = $request->validate([
            'serial' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string']
        ]);
        $monitor->update($data);

        return to_route('monitor.show', $monitor)->with('message', 'Monitor was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitor $monitor)
    {
        $monitor->delete();

        return to_route('monitor.index')->with('message', 'Monitor was deleted');
    }
    public function bind(Monitor $monitor){
        $computer = request('computer');
        $monitor->computers()->attach($computer);
        return to_route('monitor.show', $monitor)->with('message', 'Monitor was attached');

    }

    public function unbind(Monitor $monitor)
    {
        $computer = request('computer');
        if(! $monitor->computers()->detach($monitor)){
            dd($monitor);
        }
        return to_route('monitor.show', $monitor)->with('message', 'Monitor was deattached');

    }


}
