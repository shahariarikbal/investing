<?php

namespace App\Http\Controllers\Frontend;

use App\FAQ;
use App\FundManagement;
use Fxtutor\Wallet\Plan;

class FundManagementController extends FrontendController
{
    public function index()
    {
        $fundManagementPackages = Plan::where('service', FundManagement::class)->active()->orderBy('orders', 'ASC')->get();
        $fundmanagement_faqs = FAQ::where('service', FundManagement::class)->active()->get();

        return view('frontend.fund-management.fund-management', compact('fundManagementPackages', 'fundmanagement_faqs'));
    }
}
