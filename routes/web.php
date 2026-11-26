<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// إدارة الموظفين
Route::resource('employees', EmployeeController::class);

// Attendance, report, inventory and sales routes are not enabled yet:
// their controllers are empty in this repository. See README.
