<?php

namespace App\Http\Controllers\API\V1\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\ApiController;
use Fxtutor\Wallet\Affiliate;

// use Exception;

class AffiliateController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function dashboard(Request $request)
    {
        $user = $request->user();
        
        $transections = Affiliate::transections($user);
        $totalEarn = $transections->sum('amount');

        return response()->json([
            'transections' => $transections,
            'total_singup' => Affiliate::childQuery($user, 10)->count(),
            'total_earn' => $totalEarn,
        ]);
        
    }

    public function userGraph(Request $request)
    {
        $user = $request->user();

        return response()->json(Affiliate::getAffiliateTree($user, 5));
    }

    public function template(Request $request)
    {
        return response()->json([
            'basic' => [
                'file' => 'https://www.fxsuccessbd.com/addimage/1548832027.gif',
                'type' => 'image',
                'width' =>728,
                'height' => 90, 
            ],
            'ac12d6' => [
                'file' => 'http://banner.nanothemes.co/c43/728x90/gwd_preview_728x90/index.html',
                'type' => 'iframe',
                'width' =>728,
                'height' => 90, 
            ]
        ]);
    }
}
