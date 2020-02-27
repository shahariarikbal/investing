<?php

namespace App\Http\View\Composer;


use App\Broker;
use Illuminate\View\View;


class TopForexBroker
{
    protected $top_broker;

    public function compose(View $view)
    {
        $view->with('top_broker', $this->top_broker);
    }

    public function __construct()
    {
        $countOfBrokerToBeFetched = intval(env('TOP_BROKER_COUNT', 7));
        $this->top_broker = Broker::select(['name','slug','logo','premium'])
                                ->where('premium', 1)
                                ->where('status', 1)
                                ->orderBy('order', 'ASC')->limit($countOfBrokerToBeFetched)->get()->toArray();

        if(count($this->top_broker) < $countOfBrokerToBeFetched) {
            $additional_brokers = Broker::select(['name','slug','logo','premium'])
                                ->where('premium', 0)
                                ->where('status', 1)
                                ->orderBy('order', 'ASC')->limit($countOfBrokerToBeFetched - count($this->top_broker))->get()->toArray();
        
            foreach($additional_brokers as $additional_broker) {
                array_push($this->top_broker, $additional_broker);
            }
        }
    }
}