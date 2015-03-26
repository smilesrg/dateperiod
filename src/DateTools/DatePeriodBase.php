<?php

namespace DateTools;

abstract class DatePeriodBase implements DatePeriodInterface
{
    /** @var  \DateTime */
    protected $start;

    /** @var  \DateTime */
    protected $end;

    public function __construct(\DateTime $now = null)
    {
        $this->calculateStartAndEnd($now, $this->getStartModifier(), $this->getEndModifier());
    }

    public function getStart()
    {
        return clone($this->start);
    }

    public function getEnd()
    {
        return clone($this->end);
    }

    abstract protected function getStartModifier();
    abstract protected function getEndModifier();

    protected function calculateStartAndEnd(\DateTime $date = null, $modifierStart, $modifierEnd, $preserveTime = false)
    {
        if ($date === null) {
            $date = new \DateTime('now');
        }

        $start = clone($date);
        $start->modify($modifierStart);
        if ($preserveTime) {
            $start->setTime(0,0,0);
        }
        $this->start = $start;

        $end = clone($date);
        $end->modify($modifierEnd);
        if ($preserveTime) {
            $end->setTime(23,59,59);
        }
        $this->end = $end;
    }
}