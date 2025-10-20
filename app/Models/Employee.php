<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'salary',
        'phone',
        'hire_date',
        'status'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function getWeeklyAttendance($weekStart)
    {
        return $this->attendances()
            ->whereBetween('date', [
                $weekStart,
                \Carbon\Carbon::parse($weekStart)->addDays(6)
            ])
            ->get();
    }
}
