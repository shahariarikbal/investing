<?php

namespace App\Http\View\Composer;

use Illuminate\View\View;
use Carbon\Carbon;

class TradingSessionComposer
{
    protected $tradingSession;


    public function compose(View $view)
    {
        $view->with('tradingSession', $this->tradingSession);
    }

    public function __construct()
    {
        $this->tradingSession = [];

        $timezones['sydney'] = 'Australia/Sydney';
        $timezones['tokyo'] = 'Asia/Tokyo';
        $timezones['london'] = 'Europe/London';
        $timezones['newyork'] = 'America/New_York';

        foreach($timezones as $key => $timezone) {
            $time = Carbon::now(new \DateTimeZone($timezone));
   
            if ($time->isSaturday() || $time->isSunday() ) {
               $this->tradingSession[$key] = '<span class="text-center badge badge-danger w-100 text-uppercase">Closed</span>';
            } else {
               $time = $time->toTimeString();
            
               switch($timezone) {
                  case 'Australia/Sydney':
                     $this->tradingSession['sydney'] = '<span class="text-center badge badge-danger w-100 text-uppercase">Closed</span>';
                     
                     if ($time > '07:00:01' && $time < '08:00:00') {
                        $this->tradingSession['sydney'] = '<span class="text-center badge badge-warning w-100 text-uppercase">Opening</span>';
                     }
                     if ($time > '08:00:01' && $time < '15:00:00') {
                        $this->tradingSession['sydney'] = '<span class="text-center badge badge-success w-100 text-uppercase">Open</span>';
                     }
                     if ($time > '15:00:01' && $time < '16:00:00') {
                        $this->tradingSession['sydney'] = '<span class="text-center badge badge-warning w-100 text-uppercase">Closing</span>';
                     }
                     break;
                  case 'Asia/Tokyo':
                     $this->tradingSession['tokyo'] = '<span class="text-center badge badge-danger w-100 text-uppercase">Closed</span>';
   
                     if ($time > '08:00:01' && $time < '09:00:00') {
                        $this->tradingSession['tokyo'] = '<span class="text-center badge badge-warning w-100 text-uppercase">Opening</span>';
                     }
                     if ($time > '09:00:01' && $time < '15:00:00') {
                        $this->tradingSession['tokyo'] = '<span class="text-center badge badge-success w-100 text-uppercase">Open</span>';
                     }
                     if ($time > '15:00:01' && $time < '16:00:00') {
                        $this->tradingSession['tokyo'] = '<span class="text-center badge badge-warning w-100 text-uppercase">Closing</span>';
                     }
                     break;
                  case 'Europe/London':
                     $this->tradingSession['london'] = '<div class="text-center badge badge-danger w-100 text-uppercase">Closed</div>';
                     
                     if ($time > '08:00:01' && $time < '09:00:00') {
                        $this->tradingSession['london'] = '<div class="text-center badge badge-warning w-100 text-uppercase">Opening</div>';
                     }
                     if ($time > '09:00:01' && $time < '15:00:00') {
                        $this->tradingSession['london'] = '<div class="text-center badge badge-success w-100 text-uppercase">Open</div>';
                     }
                     if ($time > '15:00:01' && $time < '16:00:00') {
                        $this->tradingSession['london'] = '<div class="text-center badge badge-warning w-100 text-uppercase">Closing</div>';
                     }
                     break;
                  case 'America/New_York':
                     $this->tradingSession['newyork'] = '<div class="text-center badge badge-danger w-100 text-uppercase">Closed</div>';
                     
                     if ($time > '08:00:01' && $time < '09:00:00') {
                        $this->tradingSession['newyork'] = '<div class="text-center badge badge-warning w-100 text-uppercase">Opening</div>';
                     }
                     if ($time > '09:00:01' && $time < '16:00:00') {
                        $this->tradingSession['newyork'] = '<div class="text-center badge badge-success w-100 text-uppercase">Open</div>';
                     }
                     if ($time > '16:00:01' && $time < '17:00:00') {
                        $this->tradingSession['newyork'] = '<div class="text-center badge badge-warning w-100 text-uppercase">Closing</div>';
                     }
                     break;
               }
                  
            }
         }
    }
}