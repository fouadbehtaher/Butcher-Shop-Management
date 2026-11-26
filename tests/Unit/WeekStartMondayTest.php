<?php

namespace Tests\Unit;

use App\Traits\WeekStartMonday;
use PHPUnit\Framework\TestCase;

class WeekStartMondayTest extends TestCase
{
    use WeekStartMonday;

    public function test_week_starts_on_monday_and_has_seven_days(): void
    {
        $start = $this->getWeekStartDate('2024-03-14'); // a Thursday
        $this->assertSame('2024-03-11', $start->format('Y-m-d'));
        $this->assertCount(7, $this->getWeekDates('2024-03-14'));
    }
}
