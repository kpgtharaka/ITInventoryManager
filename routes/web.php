<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee', [EmployeeController::class,'index'])->name('employee');
Route::get('employee/{employee}', [EmployeeController::class,'show'])->name('employee.show');
