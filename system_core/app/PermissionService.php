<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionService extends Model
{
    public function permissions()
    {
        return $this->hasMany(\Spatie\Permission\Models\Permission::class, 'id', 'permission_id');
    }
}
