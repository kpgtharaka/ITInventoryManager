<?php

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PeripheralController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('employee/create', [EmployeeController::class,'create'])->name('employee.create');
    Route::post('employee/store', [EmployeeController::class,'store'])->name('employee.store');
    Route::get('employee/{employee}', [EmployeeController::class,'show'])->name('employee.show');
    Route::get('employee/{employee}/edit', [EmployeeController::class,'edit'])->name('employee.edit');
    Route::post('employee/{employee}/update', [EmployeeController::class,'update'])->name('employee.update');
    Route::get('employee', [EmployeeController::class,'index'])->name('employee.index');
    Route::delete('employee/{employee}', [EmployeeController::class,'destroy'])->name('employee.destroy');
    
    Route::resource('computer', ComputerController::class);
    Route::resource('monitor', MonitorController::class);
    Route::resource('peripheral', PeripheralController::class);

    Route::post('computer/{computer}/bind', [ComputerController::class, 'bind'])->name('computer.bind');
    Route::post('computer/{computer}/unbind', [ComputerController::class, 'unbind'])->name('computer.unbind');
    
    Route::post('computer/{computer}/bindp', [ComputerController::class, 'bindp'])->name('computer.bindp');
    Route::post('computer/{computer}/unbindp', [ComputerController::class, 'unbindp'])->name('computer.unbindp');

    Route::post('monitor/{monitor}/bind', [MonitorController::class, 'bind'])->name('monitor.bind');
    Route::post('monitor/{monitor}/unbind', [MonitorController::class, 'unbind'])->name('monitor.unbind');
    Route::post('peripheral/{peripheral}/bind', [peripheralController::class, 'bind'])->name('peripheral.bind');
    Route::post('peripheral/{peripheral}/unbind', [peripheralController::class, 'unbind'])->name('peripheral.unbind');
});

//Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');