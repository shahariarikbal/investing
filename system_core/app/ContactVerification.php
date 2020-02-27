<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactVerification extends Model
{
    protected $guarded = [];

    public function getVerificationTypeAttribute()
    {
        return strpos($this->contact, '@') ? 'email' : 'mobile';
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
