<?php

namespace App\Http\Controllers\Frontend;

use App\FAQ;
use App\Copytrade;
use Fxtutor\Wallet\Plan;
use Butschster\Head\Facades\Meta;

class CopyTradeController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('Copy Trade');

        $monthly_packages = Plan::where('service', Copytrade::class)->whereDuration(Plan::duration('monthly'))->active()->orderBy('orders', 'ASC')->get();
        
        $yearly_packages = Plan::where('service', Copytrade::class)->whereDuration(Plan::duration('yearly'))->active()->orderBy('orders', 'ASC')->get();
        
        $copyTrade_faqs = FAQ::where('service', Copytrade::class)->active()->get();
        

        return view('frontend.copytrade.copytrade', compact('yearly_packages', 'copyTrade_faqs', 'monthly_packages'));
    }
}
