<?php

namespace DateTools;

//TODO: edge cases. What if start of the week is Sunday?
class WeekPeriod extends DatePeriodBase
{
    protected function getStartModifier()
    {
        return 'monday';
    }

    protected function getEndModifier()
    {
        return 'sunday';
    }
}