<?php

namespace App\Traits;

use App\Admin;

trait Acted
{
    /******************** */
    /*** RELATIONSHIP *** */
    /******************** */

    public function createBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function updateBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function deleteBy()
    {
        return $this->belongsTo(Admin::class, 'deleted_by', 'id');
    }


    /******************** */
    /****** MUTATOR ***** */
    /******************** */
    public function getCreatedAttribute()
    {
        return $this->createBy->full_name;
    }

    public function getUpdatedAttribute()
    {
        return !is_null($this->updateBy) ? $this->updateBy->full_name : NULL;
    }

    public function getDeletedAttribute()
    {
        return !is_null($this->deleteBy) ? $this->deleteBy->full_name : null;
    }
}
