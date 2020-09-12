<?php

namespace App\Services\Subscription;

use App\Entities\Subscription;
use App\Entities\ScheduledOrder;
use Carbon\Carbon;

class GetScheduledOrders
{
    /**
     * Handle generating the array of scheduled orders for the given number of weeks and subscription.
     *
     * @param \App\Entities\Subscription $subscription
     * @param int $forNumberOfWeeks
     *
     * @return array
     */
    public function handle(Subscription $subscription, $forNumberOfWeeks = 0)
    {
        $scheduledOrders = [];
        $shouldBeInterval = true;
        for ($i = 0; $i < $forNumberOfWeeks; $i++) {
            if ($subscription->getPlan() == 'Weekly') {

                $next_delivery = (new Carbon($subscription->getNextDeliveryDate()))->addWeeks($i);
                array_push($scheduledOrders, new ScheduledOrder($next_delivery, true));

            } else {
                $next_delivery = (new Carbon($subscription->getNextDeliveryDate()))->addWeeks($i);
                array_push($scheduledOrders, new ScheduledOrder($next_delivery, $shouldBeInterval));
                $shouldBeInterval = !$shouldBeInterval;
            }
        }
        return $scheduledOrders;
    }
}