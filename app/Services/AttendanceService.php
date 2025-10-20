<?php
// app/Services/AttendanceService.php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;

class AttendanceService
{
    public function getWeeklyReport($weekStartDate)
    {
        $weekEndDate = Carbon::parse($weekStartDate)->addDays(6);
        
        return Employee::with(['attendances' => function($query) use ($weekStartDate, $weekEndDate) {
            $query->whereBetween('date', [$weekStartDate, $weekEndDate]);
        }])->get()->map(function($employee) use ($weekStartDate) {
            return [
                'employee' => $employee,
                'attendance' => $this->formatWeeklyAttendance($employee, $weekStartDate)
            ];
        });
    }

    protected function formatWeeklyAttendance($employee, $weekStart)
    {
        $weekDays = [];
        $currentDate = Carbon::parse($weekStart);
        
        for ($i = 0; $i < 7; $i++) {
            $day = $currentDate->copy()->addDays($i);
            $attendance = $employee->attendances->where('date', $day->format('Y-m-d'))->first();
            
            $weekDays[] = [
                'date' => $day->format('Y-m-d'),
                'day_name' => $day->locale('ar')->dayName,
                'status' => $attendance ? $attendance->status : 'absent',
                'check_in' => $attendance ? $attendance->check_in : null,
                'check_out' => $attendance ? $attendance->check_out : null,
            ];
        }
        
        return $weekDays;
    }
}
