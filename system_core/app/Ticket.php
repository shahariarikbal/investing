<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\StatusKeyFinder;

class Ticket extends Model
{
    use StatusKeyFinder;

    protected static $status = [
        1 => 'open', 2 => 'answered', 3 => 'closed', 4 => 'resolved'
    ];

    protected static $severity = [
       1=> 'general', 2=> 'medium', 3=> 'high'
    ];

    protected $guarded = [];

    public static function severity($severity)
    {
        if ($key = array_search($severity, self::$severity)) {
            return $key;
        }
        throw new \Exception('Your given severity is\'t in the array.');
    }

    /****************** */
    /**** Accessor **** */
    /****************** */
    public function getStatusAttribute($value)
    {
        if (array_key_exists($value, self::$status)) {
            return self::$status[$value];
        }
    }

    public function getSeverityAttribute($value)
    {
        if (array_key_exists($value, self::$severity)) {
            return self::$severity[$value];
        }
    }

    /****************** */
    /***** Mutator **** */
    /****************** */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = array_search($value, self::$status);
    }

    public function setSeverityAttribute($value)
    {
        $this->attributes['severity'] = array_search($value, self::$severity);
    }

    /****************** */
    /** RELATIONSHIP ** */
    /****************** */
    public function replies()
    {
        return $this->hasMany(TicketReply::class, 'ticket_id', 'id');
    }

    public function supportDepartment()
    {
        return $this->belongsTo(SupportDepartment::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
