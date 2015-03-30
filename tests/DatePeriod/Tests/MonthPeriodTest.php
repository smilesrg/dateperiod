<?php

namespace DatePeriod\Tests;

use DatePeriod\MonthPeriod;

class MonthPeriodTest extends DatePeriodTestCase
{
    public function testMonthPeriod()
    {
        $date = new \DateTime('06-06-2000');
        $expectedStartDate = new \DateTime('01-06-2000');
        $expectedEndDate = new \DateTime('30-06-2000');
        $expectedEndDate->setTime(23, 59, 59);
        $monthPeriod = new MonthPeriod($date);

        $this->assertValidPeriod($monthPeriod);
        $this->assertExpectedPeriod($expectedStartDate, $expectedEndDate, $monthPeriod);
    }

    public function testMonthPeriodPreserveTime()
    {
        $date = new \DateTime('06-06-2000');
        $date->setTime(11, 05, 24);
        $expectedStartDate = new \DateTime('01-06-2000');
        $expectedStartDate->setTime(11, 05, 24);
        $expectedEndDate = new \DateTime('30-06-2000');
        $expectedEndDate->setTime(11, 05, 24);
        $monthPeriod = new MonthPeriod($date, $preserveTime = true);

        $this->assertValidPeriod($monthPeriod);
        $this->assertExpectedPeriod($expectedStartDate, $expectedEndDate, $monthPeriod);
    }

    public function testMonthPeriodImmutable()
    {
        $datePeriod = new MonthPeriod(new \DateTime('06-06-2000'));
        $this->assertValidPeriod($datePeriod);

        $startDate = $datePeriod->getStartDate();
        $startDate->modify('+1 day');

        $endDate = $datePeriod->getEndDate();
        $endDate->modify('+1 day');

        $this->assertNotEquals($startDate->getTimestamp(), $datePeriod->getStartDate()->getTimestamp());
        $this->assertNotEquals($endDate->getTimestamp(), $datePeriod->getEndDate()->getTimestamp());
    }
}
