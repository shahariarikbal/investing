<?php

namespace App\Traits;

trait SignalDestination
{
    public function signalDestination() {
        return $this->hasOne(\App\SignalDestination::class, 'subscription_id', 'id');
    }
}
