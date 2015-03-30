<?php

namespace DatePeriod;

abstract class DatePeriodBase implements DatePeriodInterface
{
    /** @var \DateTime Start date of period. */
    protected $startDate;

    /** @var \DateTime End date of period. */
    protected $endDate;

    /** @var \DateTime Original date that has been passed to constructor. */
    protected $originalDate;

    /** @var bool Preserve time option. */
    protected $preserveTime;

    /**
     * Default constructor.
     *
     * @param \DateTime $date
     * @param bool $preserveTime Should the time be preserved?
     */
    public function __construct(\DateTime $date = null, $preserveTime = false)
    {
        if (null === $date) {
            $date = new \DateTime();
        }
        $this->originalDate = $date;
        $this->preserveTime = $preserveTime;
        $this->calculateStartAndEnd($date, $preserveTime);
    }

    /**
     * Returns cloned object of start date.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return clone($this->startDate);
    }

    /**
     * Returns cloned object of start date.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return clone($this->endDate);
    }

    /**
     * Returns cloned object of original date.
     *
     * @return \DateTime
     */
    public function getOriginalDate()
    {
        return clone($this->originalDate);
    }

    /**
     * @param boolean $preserveTime
     */
    public function setPreserveTime($preserveTime)
    {
        $this->preserveTime = $preserveTime;
    }

    /**
     * @return boolean
     */
    public function getPreserveTime()
    {
        return $this->preserveTime;
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
    protected function calculateStartAndEnd()
    {
        $startDate = clone($this->getOriginalDate());
        $startDate->modify($this->getStartModifier());
        if (!$this->getPreserveTime()) {
            $startDate->setTime(0,0,0);
        }
        $this->startDate = $startDate;

        $endDate = clone($this->getOriginalDate());
        $endDate->modify($this->getEndModifier());
        if (!$this->getPreserveTime()) {
            $endDate->setTime(23,59,59);
        }
        $this->endDate = $endDate;
    }
}