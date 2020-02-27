<?php

namespace App;

use App\Traits\EmailLog;
use App\Traits\LoginAttempt;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\Traits\Account;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
// use Fxtutor\Wallet\Traits\Transaction;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nagy\LaravelRating\Traits\Rate\CanRate;

class Member extends Authenticatable
{
    use LoginAttempt, Notifiable, HasApiTokens, Account, HasPermissions, CanRate, EmailLog;

    protected $guard = 'member';

    protected $appends = [
        'full_name', 'avater', 'avater_path', 'member_since', 'city', 'country'
    ];

    protected $fillable = [
        'first_name', 'last_name', 'last_login_at', 'username', 'email', 'password', 'remember_token', 'email_verified_at', 'token_expire_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'member_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'member_id', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'member_id', 'id');
    }

    // public function ticketReplies()
    // {
    //     return $this->hasMany(TicketReply::class, 'user');
    // }

    public function getAvaterPathAttribute()
    {

        return env('APP_URL') . '/storage/user';
    }

    public function getAvaterAttribute()
    {
        return $this->profile && $this->profile->avater ? $this->profile->avater: 'default.png';
    }

    public function getMemberSinceAttribute()
    {
        return $this->created_at->toFormattedDateString();
    }

    public function getCityAttribute()
    {
        return $this->profile && $this->profile->city ? $this->profile->city->name : null;
    }

    public function getCountryAttribute()
    {
        return $this->profile && $this->profile->country ? $this->profile->country->name : null;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function performanceGraphs()
    {
        return $this->hasMany(PerformanceGraph::class);
    }

    public function shouts()
    {
        return $this->hasMany(Shout::class);
    }

    public function verification()
    {
        return $this->hasMany(ContactVerification::class, 'member_id', 'id');
    }
        
}
