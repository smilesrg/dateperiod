<?php

namespace DatePeriod;

/**
 * Class that can return start and end date of a various period.
 */
class DatePeriod implements DatePeriodInterface
{
    /** @var  \DateTime */
    protected $startDate;

    /** @var  \DateTime */
    protected $endDate;

    /**
     * Default constructor.
     *
     * @param \DateTime $startDate Start date.
     * @param \DateTime $endDate End date.
     */
    public function __construct(\DateTime $startDate, \DateTime $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Returns cloned object of start date.
     *
     * @return \DateTime Start date.
     */
    public function getStartDate()
    {
        return clone($this->startDate);
    }

    /**
     * Returns cloned object of end date.
     *
     * @return \DateTime End date.
     */
    public function getEndDate()
    {
        return clone($this->endDate);
    }
}