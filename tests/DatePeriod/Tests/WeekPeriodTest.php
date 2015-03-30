<?php

namespace DatePeriod\Tests;

use DatePeriod\WeekPeriod;

class WeekPeriodTest extends DatePeriodTestCase
{
    public function testWeekPeriodEdgeCaseSunday()
    {
        $date = new \DateTime('08-03-2015');
        $expectedStartDate = new \DateTime('02-03-2015');
        $expectedEndDate = new \DateTime('08-03-2015');
        $expectedEndDate->setTime(23, 59, 59);
        $weekPeriod = new WeekPeriod($date);

        $this->assertValidPeriod($weekPeriod);
        $this->assertExpectedPeriod($expectedStartDate, $expectedEndDate, $weekPeriod);
    }

    public function testWeekPeriodEdgeCaseMonday()
    {
        $date = new \DateTime('02-03-2015');
        $expectedStartDate = new \DateTime('02-03-2015');
        $expectedEndDate = new \DateTime('08-03-2015');
        $expectedEndDate->setTime(23, 59, 59);
        $weekPeriod = new WeekPeriod($date);

        $this->assertValidPeriod($weekPeriod);
        $this->assertExpectedPeriod($expectedStartDate, $expectedEndDate, $weekPeriod);
    }

    public function testWeekPeriodEdgeCaseFirstDayOfMonth()
    {
        $date = new \DateTime('01-03-2015');
        $expectedStartDate = new \DateTime('23-02-2015');
        $expectedEndDate = new \DateTime('01-03-2015');
        $expectedEndDate->setTime(23, 59, 59);
        $weekPeriod = new WeekPeriod($date);

        $this->assertValidPeriod($weekPeriod);
        $this->assertExpectedPeriod($expectedStartDate, $expectedEndDate, $weekPeriod);
    }
}
