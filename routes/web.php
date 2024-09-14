<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee/create', [EmployeeController::class,'create'])->name('employee.create');
Route::post('employee/store', [EmployeeController::class,'store'])->name('employee.store');
Route::get('employee/{employee}', [EmployeeController::class,'show'])->name('employee.show');
Route::get('employee/{employee}/edit', [EmployeeController::class,'edit'])->name('employee.edit');
Route::post('employee/{employee}/update', [EmployeeController::class,'update'])->name('employee.update');
Route::get('employee', [EmployeeController::class,'index'])->name('employee.index');
Route::delete('employee/{employee}', [EmployeeController::class,'destroy'])->name('employee.destroy');