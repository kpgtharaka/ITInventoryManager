<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee', [EmployeeController::class,'index'])->name('employee.index');
Route::get('employee/{employee}', [EmployeeController::class,'show'])->name('employee.show');
Route::get('employee/{employee}/edit', [EmployeeController::class,'edit'])->name('employee.edit');
