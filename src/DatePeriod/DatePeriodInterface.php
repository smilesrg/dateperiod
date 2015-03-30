<?php

namespace DatePeriod;

/**
 * Returns start and end date of a period.
 */
interface DatePeriodInterface
{
    /**
     * Returns start date of period.
     *
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * Returns end date of period.
     *
     * @return \DateTime
     */
    public function getEndDate();
}