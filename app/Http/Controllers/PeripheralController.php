<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Peripheral;
use Illuminate\Http\Request;

class PeripheralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $peripherals = Peripheral::query();
        if (!empty($q)) {
            $peripherals = $peripherals->orWhere('serial', 'LIKE', '%' . $q . '%');
            $peripherals = $peripherals->orWhere('make', 'LIKE', '%' . $q . '%');
            $peripherals = $peripherals->orWhere('model', 'LIKE', '%' . $q . '%');
        }
        $peripherals = $peripherals->orderBy("id", "desc")
            ->paginate();
        return view("peripheral.index", ['peripherals' => $peripherals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peripheral.create');
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
        $peripheral = peripheral::create($data);

        return to_route('peripheral.show', $peripheral)->with('message', 'peripheral was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(peripheral $peripheral)
    {
        $computers = Computer::all();
        $attachedComputerIds = $peripheral->computers->pluck('id')->toArray();
        $availableComputers = $computers->filter(function ($computer) use ($attachedComputerIds) {
            return !in_array($computer->id, $attachedComputerIds);
        });

        return view('peripheral.show', ['peripheral' => $peripheral,'computers'=> $availableComputers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peripheral $peripheral)
    {
        return view('peripheral.edit', ['peripheral' => $peripheral]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, peripheral $peripheral)
    {
        $data = $request->validate([
            'serial' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string']
        ]);
        $peripheral->update($data);

        return to_route('peripheral.show', $peripheral)->with('message', 'peripheral was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peripheral $peripheral)
    {
        $peripheral->delete();

        return to_route('peripheral.index')->with('message', 'peripheral was deleted');
    }
    public function bind(peripheral $peripheral){
        $computer = request('computer');
        $peripheral->computers()->attach($computer);
        return to_route('peripheral.show', $peripheral)->with('message', 'peripheral was attached');

    }

    public function unbind(peripheral $peripheral)
    {
        $computer = request('computer');
        if(! $peripheral->computers()->detach($peripheral)){
            dd($peripheral);
        }
        return to_route('peripheral.show', $peripheral)->with('message', 'peripheral was deattached');

    }
}
