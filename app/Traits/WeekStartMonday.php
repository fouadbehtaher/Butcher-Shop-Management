<?php
// app/Traits/WeekStartMonday.php

namespace App\Traits;

use Carbon\Carbon;

trait WeekStartMonday
{
    public function getWeekStartDate($date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::now();
        return $date->startOfWeek(Carbon::MONDAY);
    }

    public function getWeekDates($date = null)
    {
        $startDate = $this->getWeekStartDate($date);
        $weekDates = [];
        
        for ($i = 0; $i < 7; $i++) {
            $weekDates[] = $startDate->copy()->addDays($i);
        }
        
        return $weekDates;
    }
}
