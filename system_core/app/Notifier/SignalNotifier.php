<?php

namespace App\Notifiers;

use App\Events\PremiumSignalNotificationEvent;
use App\Member;
use App\Signal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignalNotificationEmail;

class SignalNotifier
{
    protected $recipients = [];

    public function __construct()
    {
        // $premiumMembers = Member::select(['receiving_email'])
        //         ->whereStatus('active')->get();

        // foreach($premiumMembers as $member) {
        //     $this->recipients[] = $member->receiving_email;
        // }
    }

    private function createRecipientQueue(Signal $signal)
    {
        if ($signal->free) {
            $this->createFreeRecipientQueue();
        }

        if ($signal->premium) {
            $this->createPremiumRecipientQueue();
        }

        if ($signal->package_id) {
            $this->createPackageSubscriberRecipientQueue($signal->package_id);
        }
    }

    private function createPackageSubscriberRecipientQueue($packageIds)
    {
        $members = DB::select("SELECT `signal_destinations`.`email`, `members`.`id` FROM `subscriptions` 
                                                                                    JOIN `signal_destinations` ON `signal_destinations`.`subscription_id`=`subscriptions`.id 
                                                                                    JOIN `members` ON `members`.`id` = `subscriptions`.`member_id`
                                                                                    WHERE `subscriptions`.`status` = 1 AND `subscriptions`.`plan_id` IN($packageIds)");    
  
        foreach ($members as $member) {
            if (!array_key_exists($member->id, $this->recipients)) {
                $this->recipients[$member->id] = $member;
            }
        }
    }

    private function createPremiumRecipientQueue()
    {
        $members = DB::select("SELECT `signal_destinations`.`email`, `members`.`id` FROM `subscriptions` 
                                                                                    JOIN `signal_destinations` ON `signal_destinations`.`subscription_id`=`subscriptions`.id 
                                                                                    JOIN `members` ON `members`.`id` = `subscriptions`.`member_id`
                                                                                    WHERE `subscriptions`.`status` = 1 AND `subscriptions`.`service` = 'App\\\Signal'");
      
        foreach ($members as $member) {
            $this->recipients[$member->id] = $member;
        }
    }

    private function createFreeRecipientQueue()
    {
        // member whose don't have any subscribed signal packages
        $members = DB::select("SELECT `id`, `email` FROM `members` WHERE `id` NOT IN ( SELECT `members`.`id` FROM `subscriptions` JOIN `members` ON `members`.`id` = `subscriptions`.`member_id` WHERE `subscriptions`.`status` = 1 AND `subscriptions`.`service` = 'App\\\Signal')");
     
        foreach ($members as $member) {
            $this->recipients[$member->id] = $member;
        }
    }

    public function sentMail($signal, $subject, $isReportable = false)
    {
        $this->createRecipientQueue($signal);
  
        // \Log::debug($this->recipients);
        // \Log::debug($signal);
        if(count($this->recipients) > 0) {
            foreach($this->recipients as $recipient) {
                // creating email log
                $signal->emailLogs()->create([
                    'member_id' => $recipient->id,
                    'receiving_contact' => $recipient->email,
                    'mailable' => SignalNotificationEmail::class,
                    'is_reportable' => $isReportable,
                    'subject' => $subject,
                    'meta' => $signal
                ]);
                event(new PremiumSignalNotificationEvent($recipient->email, $signal, $subject));
                
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