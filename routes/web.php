<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/create', [EmployeeController::class, 'create'])->name('employee.new');
Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/delete/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
