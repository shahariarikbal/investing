<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $guarded = [];

    /****************** */
    /**** Accessor **** */
    /****************** */
    public function getUserTypeAttribute($value)
    {
        if (array_key_exists($value, self::$user_type)) {
            return self::$user_type[$value];
        }
    }

    /****************** */
    /***** Mutator **** */
    /****************** */
    public function setUserTypeAttribute($value)
    {
        $this->attributes['user_type'] = array_search($value, self::$user_type);
    }

    /****************** */
    /** RELATIONSHIP ** */
    /****************** */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(member::class, 'member_id', 'id');
    }
}
