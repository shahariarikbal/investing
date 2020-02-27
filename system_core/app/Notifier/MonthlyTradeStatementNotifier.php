<?php

namespace App\Notifiers;

use App\Events\FundManagementMonthlyTradeStatementCreatedEvent;
use App\MonthlyTradeStatement;
use Fxtutor\Wallet\Subscription;
use Illuminate\Support\Facades\DB;
use App\Mail\MonthlyTradeStatementNotificationEmail;
use App\Events\MonthlyTradeStatementNotificationEvent;

class MonthlyTradeStatementNotifier
{
    protected $recipients = [];

    private function createRecipientQueue(MonthlyTradeStatement $statement)
    {
        if ($statement->member_id) {
            $members = DB::select("SELECT `members`.`id`, `members`.`email`, `members`.`first_name`, `members`.`last_name`
                                    FROM `members`
                                    WHERE `members`.`id` = ". $statement->member_id);    
  
  
            foreach ($members as $member) {
                if (!array_key_exists($member->id, $this->recipients)) {
                    $this->recipients[$member->id] = $member;
                }
            }
        }

        // if (is_null($graph->member_id) && $graph->package_id) { // in case of copytrady
        //     $this->createPackageSubscriberRecipientQueue($graph->package_id);
        // }

        
    }

    // private function createPackageSubscriberRecipientQueue($packageId)
    // {
    //     $members = DB::select("SELECT `members`.`id`, `members`.`email`, `members`.`first_name`, `members`.`last_name`
    //                             FROM `subscriptions`
    //                             JOIN `members` ON `members`.`id` = `subscriptions`.`member_id`
    //                             WHERE `subscriptions`.`plan_id`=".$packageId."
    //                             AND `subscriptions`.`status`=".Subscription::STATUS_ACTIVE);    
  
  
    //     foreach ($members as $member) {
    //         if (!array_key_exists($member->id, $this->recipients)) {
    //             $this->recipients[$member->id] = $member;
    //         }
    //     }
    // }

    public function sentMail(MonthlyTradeStatement $statement, $subject, $isReportable = false)
    {
        $this->createRecipientQueue($statement);

        if(count($this->recipients) > 0) {
            foreach($this->recipients as $recipient) {
                // creating email log
                $statement->emailLogs()->create([
                    'member_id' => $recipient->id,
                    'receiving_contact' => $recipient->email,
                    'mailable' => MonthlyTradeStatementNotificationEmail::class,
                    'is_reportable' => $isReportable,
                    'subject' => $subject,
                    'meta' => $statement
                ]);
                event(new MonthlyTradeStatementNotificationEvent($recipient, $statement, $subject));
            }
        }
    }

    protected function sentSMS()
    {
        //
    }

    protected function sentPush()
    {
        //
    }
}