<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\SubscriptionExpiredEvent;
use App\Events\SubscriptionCanceledEvent;
use App\Events\DepositRequestApprovedEvent;
use App\Events\DepositRequestCanceledEvent;
use App\Events\DepositRequestReceivedEvent;
use App\Events\FundManagementMonthlyTradeStatementInvoiceEvent;
use App\Events\WithdrawRequestApprovedEvent;
use App\Events\WithdrawRequestCanceledEvent;
use App\Events\WithdrawRequestReceivedEvent;
use App\Events\PremiumSignalNotificationEvent;
use App\Listeners\SubscriptionExpiredListener;
use App\Listeners\SubscriptionCanceledListener;
use App\Events\SubscriptionExpiredReminderEvent;
use App\Events\SubscriptionRequestReceivedEvent;
use Fxtutor\Wallet\Events\SubscriptionPaidEvent;
use App\Events\PerformanceGraphNotificationEvent;
use App\Listeners\DepositRequestApprovedListener;
use App\Listeners\DepositRequestCanceledListener;
use App\Listeners\DepositRequestReceivedListener;
use App\Listeners\WithdrawRequestApprovedListener;
use App\Listeners\WithdrawRequestCanceledListener;
use App\Listeners\WithdrawRequestReceivedListener;
use App\Listeners\PremiumSignalNotificationListener;
use App\Events\MonthlyTradeStatementNotificationEvent;
use App\Events\SubscriptionCancelRequestReceivedEvent;
use App\Listeners\FundManagementMonthlyTradeStatementInvoice;
use App\Listeners\SubscriptionExpiredReminderListener;
use App\Listeners\SubscriptionRequestReceivedListener;
use App\Listeners\PerformanceGraphNotificationListener;
use Fxtutor\Wallet\Listeners\ApproveSubscriptionListener;
use App\Listeners\MonthlyTradeStatementNotificationListener;
use App\Listeners\SubscriptionCancelRequestReceivedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SubscriptionPaidEvent::class => [
            ApproveSubscriptionListener::class
        ],
        PremiumSignalNotificationEvent::class => [
            PremiumSignalNotificationListener::class
        ],
        PerformanceGraphNotificationEvent::class => [
            PerformanceGraphNotificationListener::class
        ],
        MonthlyTradeStatementNotificationEvent::class => [
            MonthlyTradeStatementNotificationListener::class
        ],

        FundManagementMonthlyTradeStatementInvoiceEvent::class => [
            FundManagementMonthlyTradeStatementInvoice::class
        ],

        // Withdraw Event
        WithdrawRequestReceivedEvent::class => [
            WithdrawRequestReceivedListener::class
        ],
        WithdrawRequestApprovedEvent::class => [
            WithdrawRequestApprovedListener::class
        ],
        WithdrawRequestCanceledEvent::class => [
            WithdrawRequestCanceledListener::class
        ],

        // Deposit Event
        DepositRequestReceivedEvent::class => [
            DepositRequestReceivedListener::class
        ],
        DepositRequestApprovedEvent::class => [
            DepositRequestApprovedListener::class
        ],
        DepositRequestCanceledEvent::class => [
            DepositRequestCanceledListener::class
        ],

        // subscription
        SubscriptionRequestReceivedEvent::class => [
            SubscriptionRequestReceivedListener::class
        ],
        SubscriptionCanceledEvent::class => [
            SubscriptionCanceledListener::class
        ],
        SubscriptionExpiredEvent::class => [
            SubscriptionExpiredListener::class
        ],
        SubscriptionExpiredReminderEvent::class => [
            SubscriptionExpiredReminderListener::class
        ],

        // subscription cancel
        SubscriptionCancelRequestReceivedEvent::class => [
            SubscriptionCancelRequestReceivedListener::class
        ]
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'Fxtutor\Wallet\Listeners\EventsSubscriber',
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
