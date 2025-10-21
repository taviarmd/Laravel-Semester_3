<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);