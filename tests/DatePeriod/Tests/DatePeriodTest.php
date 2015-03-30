<?php

namespace DatePeriod\Tests;

use DatePeriod\DatePeriod;

class DatePeriodTest extends DatePeriodTestCase
{
    public function testDatePeriod()
    {
        $startDate = new \DateTime('06-06-2000');
        $endDate = new \DateTime('06-07-2001');
        $datePeriod = new DatePeriod($startDate, $endDate);
        $this->assertValidPeriod($datePeriod);
        $this->assertExpectedPeriod($startDate, $endDate, $datePeriod);
    }

    public function testDatePeriodImmutable()
    {
        $datePeriod = new DatePeriod(new \DateTime('06-06-2000'), new \DateTime('06-07-2001'));
        $this->assertValidPeriod($datePeriod);

        $startDate = $datePeriod->getStartDate();
        $startDate->modify('+1 day');

        $endDate = $datePeriod->getEndDate();
        $endDate->modify('+1 day');

        $this->assertNotEquals($startDate->getTimestamp(), $datePeriod->getStartDate()->getTimestamp());
        $this->assertNotEquals($endDate->getTimestamp(), $datePeriod->getEndDate()->getTimestamp());
    }
}
