<?php
// routes/web.php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// إدارة الموظفين
Route::resource('employees', EmployeeController::class);

// الحضور والانصراف
Route::get('attendance/weekly', [AttendanceController::class, 'weekly'])->name('attendance.weekly');
Route::post('attendance/record', [AttendanceController::class, 'record'])->name('attendance.record');

// التقارير
Route::prefix('reports')->group(function () {
    Route::get('employees', [ReportController::class, 'employees'])->name('reports.employees');
    Route::get('attendance', [ReportController::class, 'attendance'])->name('reports.attendance');
    Route::get('sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
});
