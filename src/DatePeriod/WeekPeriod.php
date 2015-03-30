<?php

namespace DatePeriod;

//TODO: edge cases. What if start of the week is Sunday?
class WeekPeriod extends DatePeriodBase
{
    protected function getStartModifier()
    {
        list($week, $year) = $this->getWeekAndYear();

        return "{$year}-W{$week}-1";
    }

    protected function getEndModifier()
    {
        list($week, $year) = $this->getWeekAndYear();

        return "{$year}-W{$week}-7";
    }

    /**
     * @return array
     */
    protected function getWeekAndYear()
    {
        $timestamp = $this->getOriginalDate()->getTimestamp();
        $week = date('W', $timestamp);
        $year = date('Y', $timestamp);

        return array($week, $year);
    }
}