<?php
namespace Fxtutor\Wallet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Fxtutor\Wallet\Deposit;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    /**
     * Controller fore gettings transeaction history
     */

     public function transactionHistory(Request $request)
     {
         $member = $request->member();
         $count = $request->get('count')?:10;
         
         $transactions = $member->transactions()->paginate($count);
        
         $transactions->map(function($t){
             $t->message = __("wallet::transactions.{$t->action}.message", $t->meta);
             return $t;
         });


        return $transactions;
     }

     public function depositHistory(Request $request)
     {
        $member = $request->member();
        $count = $request->get('count')?:10;
        $status = $request->get('status');
        $deposits = Deposit::where('member_id', $member->id);

        if (isset($status)) {
            $deposits = $deposits->where('status', $status);
        }
        
        $deposits = $deposits->orderBy('id', 'desc')->paginate($count);
        $resorces = JsonResource::collection($deposits);

        return $resorces;
     }
}
