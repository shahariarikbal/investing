<?php

namespace Fxtutor\Wallet;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance',
        'restricted',
        'inreview',
        'pending',
        'security',
        'currency',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
