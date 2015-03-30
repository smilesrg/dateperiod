<?php

namespace DatePeriod\Tests;

use DatePeriod\DatePeriodInterface;

class DatePeriodTestCase extends \PHPUnit_Framework_TestCase
{
    public function assertValidPeriod(DatePeriodInterface $datePeriod)
    {
        $this->assertInstanceOf('\DateTime', $datePeriod->getStartDate());
        $this->assertInstanceOf('\DateTime', $datePeriod->getEndDate());
    }

    public function assertExpectedPeriod(\DateTime $startDate, \DateTime $endDate, DatePeriodInterface $period)
    {
        $this->assertEquals($startDate->getTimestamp(), $period->getStartDate()->getTimestamp());
        $this->assertEquals($endDate->getTimestamp(), $period->getEndDate()->getTimestamp());
    }
}