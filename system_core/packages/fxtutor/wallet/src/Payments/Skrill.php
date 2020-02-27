<?php

namespace Fxtutor\Wallet\Payments;

use Exception;
use Fxtutor\Wallet\Deposit;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Transaction as TransactionModel;

class Skrill extends Payments
{
    /**
     * genarate form data
     *
     * @return Array [form]
     */
    public function depositRequest(Deposit $deposit)
    {
        $member = $deposit->member;
        
        $meta = [
            "payment_method" => "neteller"
        ];
        // pending transaction credit
        $member->creditTransaction(TransactionModel::PENDING, 'deposit_payment_skrill', $deposit->total, $meta, $deposit);

        return ['notify'=> "payment submited for admin approval."];
    }

    public function success(Request $request)
    {
        // $rmember = $request->member();
        // if (!$member->hasRole('Administrator')) {
        //     throw new Exception("You have not permission.");
        // }

        $id = $request->input('deposit_id');
        $deposit = Deposit::find($id);

        if (!$deposit) {
            throw new Exception("Deposit not found");
        }

        if ($deposit->status !== "unapproved") {
            throw new Exception("Deposit already $deposit->status");
        }

        $data = $request->all();
        $data['status'] = 2;

        $deposit->fill($data)->save();


        $member = $deposit->member;


        $meta = [
            'payment_method' => 'skrill',
            'payment_id' => $deposit->payment_id,
            'account' => $member->email,
        ];
        
        // pending transaction debit
        $member->debitTransaction(TransactionModel::PENDING, 'approve_deposit_payment_skrill', $deposit->total, $meta, $deposit);

        // balance transaction credit
        $member->creditTransaction(TransactionModel::BALANCE, 'deposit_payment_skrill', $deposit->total, $meta, $deposit, $deposit->currency);

        return true;
    }

    public function fail(Request $request)
    {
        // $member = $request->member();
        // if (!$member->hasRole('Administrator')) {
        //     throw new Exception("You have not permission.");
        // }

        $id = $request->input('deposit_id');
        $deposit = Deposit::find($id);

        if (!$deposit) {
            throw new Exception("Deposit not found");
        }

        if ($deposit->status !== "unapproved") {
            throw new Exception("Deposit already $deposit->status");
        }

        $data = $request->all();
        $data['status'] = 3;

        $deposit->fill($data)->save();
        
        $member = $deposit->member;

        $meta = [
            'payment_method' => 'neteller',
            'payment_id' => $deposit->payment_id,
            'account' => $member->email,
            'reason' => $request->meta['reason']
        ];
        
        // pending transaction debit
        $member->debitTransaction(TransactionModel::PENDING, 'cancel_deposit_payment_skrill', $deposit->total, $meta, $deposit);

        return true;
    }
}
