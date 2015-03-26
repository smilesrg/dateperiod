<?php

namespace DateTools;

/**
 * Returns start and end date of a period.
 */
interface DatePeriodInterface
{
    public function getStart();
    public function getEnd();
}