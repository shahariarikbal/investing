<?php

namespace App;

use App\Traits\EmailLog;
use Illuminate\Database\Eloquent\Model;

class EmailLogs extends Model
{
    use EmailLog;

    protected $fillable = ['member_id', 'mailable', 'receiving_contact', 'is_reportable', 'subject', 'meta'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function resource()
    {
        return $this->morphTo();
    }

    public function scopeReportable($query)
    {
        return $query->where('is_reportable', true);
    }
}
