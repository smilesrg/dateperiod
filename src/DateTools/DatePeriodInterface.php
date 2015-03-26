<?php

namespace DateTools;

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
    public function getStart();

    /**
     * Returns end date of period.
     *
     * @return \DateTime
     */
    public function getEnd();
}