<?php

namespace DateTools;

/**
 * Class that can return start and end date of a various period.
 */
class DatePeriod implements DatePeriodInterface
{
    /** @var  \DateTime */
    protected $start;

    /** @var  \DateTime */
    protected $end;

    /**
     * Default constructor.
     *
     * @param \DateTime $start Start date.
     * @param \DateTime $end End date.
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Returns cloned object of start date.
     *
     * @return \DateTime Start date.
     */
    public function getStart()
    {
        return clone($this->start);
    }

    /**
     * Returns cloned object of end date.
     *
     * @return \DateTime End date.
     */
    public function getEnd()
    {
        return clone($this->end);
    }
}