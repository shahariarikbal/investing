<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PammMam extends Model
{
    public function brokers ()
    {
        return $this->belongsToMany(PammMam::class, 'broker_mam_pamm', 'pamm_mam_id', 'broker_id');
    }
}
