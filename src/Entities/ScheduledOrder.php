<?php

namespace App\Entities;

use Carbon\Carbon;

class ScheduledOrder
{
    /**
     * The delivery date of this scheduled order.
     *
     * @var \Carbon\Carbon
     */
    protected $deliveryDate;

    /**
     * Is this delivery marked as a holiday that will be skipped.
     *
     * @var bool
     */
    protected $holiday = false;

    /**
     * Is this scheduled order an opt in order that is not part of the normal subscription's plan cycle.
     *
     * @var bool
     */
    protected $optIn = false;

    /**
     * Is this scheduled order part of the subscriptions normal plan cycle.
     *
     * @var bool
     */
    protected $interval = true;

    /**
     * ScheduledOrder constructor.
     *
     * @param \Carbon\Carbon     $deliveryDate
     * @param \App\Entities\bool $isInterval
     */
    public function __construct(Carbon $deliveryDate, bool $isInterval)
    {
        $this->deliveryDate = $deliveryDate;
        $this->interval     = $isInterval;
    }

    /**
     * @return bool|bool
     */
    public function isInterval()
    {
        return $this->interval;
    }

    /**
     * @param $holiday
     */
    public function setHoliday($holiday)
    {
        $this->holiday = $holiday;
    }

    /**
     * @return bool
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * @return bool
     */
    public function isHoliday()
    {
        return $this->holiday && $this->interval;
    }

    /**
     * @return Carbon
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param bool $optIn
     */
    public function setOptIn($optIn)
    {
        $this->optIn = $optIn;
    }

    /**
     * @return bool
     */
    public function isOptIn()
    {
        return $this->optIn && !$this->interval;
    }

}