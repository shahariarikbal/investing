<?php

namespace App\Http\Controllers\Frontend;

use App\Signal;
use Fxtutor\Wallet\Plan;
use Butschster\Head\Facades\Meta;

class ForexSignalPackageController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('Forex Signal Packages');

        $forexSignalPackage = Plan::where('service', Signal::class)->active()->orderBy('orders', 'ASC')->get();

        return view('frontend.signal.forex-signal-package', compact('forexSignalPackage'));
    }
}
