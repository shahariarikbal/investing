<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoginAttempt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasPermissions;

class Admin extends Authenticatable
{
    use LoginAttempt, Notifiable, HasPermissions;

    protected $guard = 'admin';

    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'first_name', 'last_name', 'last_login_at', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    /******************** */
    /*** RELATIONSHIP *** */
    /******************** */

    public function analysisCreated()
    {
        return $this->hasMany(Analysis::class, 'created_by', 'id');
    }

    public function analysisUpdated()
    {
        return $this->hasMany(Analysis::class, 'updatede_by', 'id');
    }

    public function analysisDeleted()
    {
        return $this->hasMany(Analysis::class, 'deleted_by', 'id');
    }

    public function blogCreated()
    {
        return $this->hasMany(Blog::class, 'created_by', 'id');
    }

    public function blogUpdated()
    {
        return $this->hasMany(Blog::class, 'updatede_by', 'id');
    }

    public function blogDeleted()
    {
        return $this->hasMany(Blog::class, 'deleted_by', 'id');
    }
}
