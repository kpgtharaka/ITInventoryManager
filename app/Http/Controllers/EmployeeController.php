<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        return view("employee.index", ['employees'=> $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'emp_no' => ['required','string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email'=> ['required','email'],
            'phone'=> ['required','string'],
            'address' => ['required', 'string']
        ]);
        
        $employee = Employee::create($data);

        return to_route('employee.show', $employee)->with('message', 'Employee was Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', ['employee'=> $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', ['employee'=> $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'emp_no' => ['required','string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email'=> ['required','email'],
            'phone'=> ['required','string'],
            'address' => ['required', 'string']
        ]);


        $employee->update($data);
        return to_route('employee.show', $employee)->with('message', 'Employee was Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return to_route('employee.index')->with('message', 'Employee was Deleted');
    }
}
