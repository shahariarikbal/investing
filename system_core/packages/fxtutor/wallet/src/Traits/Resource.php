<?php

namespace Fxtutor\Wallet\Traits;

use Fxtutor\Wallet\Transaction;

trait Resource 
{
    /**
     * Transections
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany;
     */
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'resource');
    }
}