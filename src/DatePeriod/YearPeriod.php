<?php

namespace DatePeriod;

class YearPeriod extends DatePeriodBase
{
    protected function getStartModifier()
    {
        return 'first day of January';
    }

    protected function getEndModifier()
    {
        return 'last day of December';
    }
}
