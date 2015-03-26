<?php

namespace DateTools;

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