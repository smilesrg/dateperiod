<?php

namespace DatePeriod;

class DayPeriod extends DatePeriodBase
{
    protected function getStartModifier()
    {
        return '+0 days';
    }

    protected function getEndModifier()
    {
        return '+0 days';
    }
}