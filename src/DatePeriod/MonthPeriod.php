<?php

namespace DatePeriod;

class MonthPeriod extends DatePeriodBase
{
    protected function getStartModifier()
    {
        return 'first day of';
    }

    protected function getEndModifier()
    {
        return 'last day of';
    }
}