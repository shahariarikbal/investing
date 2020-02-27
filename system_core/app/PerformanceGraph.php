<?php

namespace App;

use Fxtutor\Wallet\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Traits\EmailLog;

class PerformanceGraph extends Model
{
    use EmailLog;

    protected $guarded = [];

    protected $appends = ['month', 'year'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public static function serviceWiseCount()
    {
        $graphs_count = DB::table('performance_graphs')
                ->select(DB::raw("count(`id`) as `count`, `service`"))
                ->groupBy('service')
                ->get();

        $counts = [];
        foreach ($graphs_count as $count) {
            $counts[str_replace("App/", '', $count->service)] = $count->count;
        }
        return $counts;
    }

    public function package()
    {
        return $this->belongsTo(Plan::class);
    }

    public function getMonthAttribute()
    {
        return $this->date ? $this->date->format('F') : null;
    }

    public function getYearAttribute()
    {
        return $this->date ? $this->date->format('Y') : null;
    }
}
