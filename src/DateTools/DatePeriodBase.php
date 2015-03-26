<?php

namespace DateTools;

abstract class DatePeriodBase implements DatePeriodInterface
{
    /** @var  \DateTime Start date of period. */
    protected $start;

    /** @var  \DateTime End date of period. */
    protected $end;

    /**
     * Default constructor.
     *
     * @param \DateTime $date
     * @param bool $preserveTime Should the time be preserved?
     */
    public function __construct(\DateTime $date = null, $preserveTime = false)
    {
        $this->calculateStartAndEnd($date, $this->getStartModifier(), $this->getEndModifier(), $preserveTime);
    }

    /**
     * Returns cloned object of start date.
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return clone($this->start);
    }

    /**
     * Returns cloned object of start date.
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return clone($this->end);
    }

    /**
     * Returns modifier for start date.
     *
     * @return string
     */
    abstract protected function getStartModifier();

    /**
     * Returns modifier for end date.
     *
     * @return string
     */
    abstract protected function getEndModifier();

    /**
     * Calculates start and end dates of period.
     *
     * @param \DateTime $date
     * @param $modifierStart Modifier for start date
     * @param $modifierEnd Modifier for end date
     * @param bool $preserveTime Should the time be preserved?
     */
    protected function calculateStartAndEnd(\DateTime $date = null, $modifierStart, $modifierEnd, $preserveTime = false)
    {
        if ($date === null) {
            $date = new \DateTime('now');
        }

        $start = clone($date);
        $start->modify($modifierStart);
        if (!$preserveTime) {
            $start->setTime(0,0,0);
        }
        $this->start = $start;

        $end = clone($date);
        $end->modify($modifierEnd);
        if (!$preserveTime) {
            $end->setTime(23,59,59);
        }
        $this->end = $end;
    }
}