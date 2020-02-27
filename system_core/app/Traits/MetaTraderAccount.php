<?php

namespace App\Traits;

trait MetaTraderAccount
{
    public function metaTraderAccount() {
        return $this->hasOne(\App\MetaTraderAccount::class, 'subscription_id', 'id');
    }
}
