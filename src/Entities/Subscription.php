<?php

namespace App\Entities;

class Subscription
{
    /**
     * The statuses a subscription can have.
     *
     * @var int
     */
    const STATUS_ACTIVE    = 1;
    const STATUS_CANCELLED = 2;

    /**
     * The allowed statuses.
     *
     * @var array
     */
    const STATUSES_ALLOWED = [
        self::STATUS_ACTIVE    => 'Active',
        self::STATUS_CANCELLED => 'Cancelled',
    ];

    /**
     * The plans a subscription can have.
     *
     * @var int
     */
    const PLAN_WEEKLY      = 1;
    const PLAN_FORTNIGHTLY = 2;

    /**
     * The allowed plans.
     *
     * @var array
     */
    const PLANS_ALLOWED = [
        self::PLAN_WEEKLY      => 'Weekly',
        self::PLAN_FORTNIGHTLY => 'Fortnightly',
    ];

    /**
     * The subscription status.
     *
     * @var int
     */
    protected $status;

    /**
     * The subscription plan.
     *
     * @var int
     */
    protected $plan;

    /**
     * The next delivery date for this subscription.
     *
     * @var \Carbon\Carbon|null
     */
    protected $nextDeliveryDate;

    /**
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return self::STATUSES_ALLOWED[$this->status];
    }

    /**
     * @param $plan
     *
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlan()
    {
        return self::PLANS_ALLOWED[$this->plan];
    }

    /**
     * @param $nextDeliveryDate
     *
     * @return $this
     */
    public function setNextDeliveryDate($nextDeliveryDate)
    {
        $this->nextDeliveryDate = $nextDeliveryDate;
        return $this;
    }


    /**
     * @return \Carbon\Carbon|null
     */
    public function getNextDeliveryDate()
    {
        return $this->nextDeliveryDate;
    }
}