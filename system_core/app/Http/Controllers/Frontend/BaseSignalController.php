<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Signal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaseSignalController extends Controller
{
    protected function getLast30DaysSignal($signalType, $isPremium = false, $slug = null)
    {   
        $signal =  Signal::with(['currency', 'categories'])->whereStatus($signalType)
                            ->where('created_at', '>=', Carbon::now()->subDays(30))
                            ->orderBy('updated_at', 'desc');

        if($isPremium){
            $signal->wherePremium(true);
        }else {
            $signal->wherePremium(false);
        }

        if(!is_null($slug)) {
            $signal->where('category_id', '=', $slug->id);
        }
        return $signal->get();               
    }

    protected function getSignals($isPremium = false, $slug = null)
    {
        return collect([
            'active' => $this->getLast30DaysSignal(Signal::status('active'), $isPremium, $slug),
            'filled' => $this->getLast30DaysSignal(Signal::status('filled'), $isPremium, $slug),
            'canceled' => $this->getLast30DaysSignal(Signal::status('cancel'), $isPremium, $slug),
            'expired' => $this->getLast30DaysSignal(Signal::status('expired'), $isPremium, $slug),
        ]);
    }

    
}
