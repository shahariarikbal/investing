<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/member', function () {
    return auth()->user();
});

Route::post('member/auth/check', 'API\V1\MemberController@authCheck');
Route::get('/verify/{token}', 'API\V1\MemberController@memberVerify');
Route::post('member/register', 'API\V1\MemberController@memberRegister');
Route::post('member/login', 'API\V1\MemberController@memberLogin');
Route::post('member/logout', 'API\V1\MemberController@memberLogout');

Route::post('/member/change-password', 'API\V1\MemberController@changePassword');
Route::post('/member/update-profile', 'API\V1\MemberController@updateProfile');
Route::post('/member/avater-upload', 'API\V1\MemberController@uploadAvater');
// Route::post('/member/country', 'API\V1\MemberController@index');
Route::post('/countries', 'API\V1\CountryController@index');
Route::post('/cities', 'API\V1\CityController@index');

Route::post('/member/support-tickets', 'API\V1\TicketController@index');
Route::post('/member/support-ticket/create', 'API\V1\TicketController@store');
Route::post('/member/support-ticket/{ticket}/details', 'API\V1\TicketController@details');
Route::post('/member/support-ticket/{ticket}/replies', 'API\V1\TicketController@replies');
Route::post('/member/support-ticket/{ticket}/reply', 'API\V1\TicketController@createReply');
Route::post('/member/support-ticket/{ticket}/resolve', 'API\V1\TicketController@resolve');
Route::post('/support-departments', 'API\V1\SupportDepartmentController@index');

Route::post('/member/subscriptions', 'API\V1\SubscriptionController@subscription');

Route::post('/member/premium-signal/subscription', 'API\V1\PremiumSignalController@subscription');
Route::post('/member/premium-signal/performance-graph', 'API\V1\PremiumSignalController@performanceGraph');
Route::post('/member/premium-signal/distribution-per-instrument', 'API\V1\PremiumSignalController@distributionPerInstrument');
Route::post('/member/premium-signal/last-month-signals', 'API\V1\PremiumSignalController@lastMonthSignal');
Route::post('/member/premium-signals', 'API\V1\PremiumSignalController@index');

Route::post('/member/copy-trade/subscription', 'API\V1\CopytradeController@subscription');
Route::post('/member/copy-trade/performance-graph', 'API\V1\CopytradeController@performanceGraph');
Route::post('/member/copy-trade/faq', 'API\V1\CopytradeController@faq');

Route::post('/member/fund-management/subscription', 'API\V1\FundManagementController@subscription');
Route::post('/member/fund-management/performance-graph', 'API\V1\FundManagementController@performanceGraph');
Route::post('/member/fund-management/shouts', 'API\V1\FundManagementController@shouts');
Route::post('/member/fund-management/monthly-trade-statement', 'API\V1\FundManagementController@monthlyTradeStatement');

Route::post('/member/financial/wallet/balance', 'API\V1\Wallet\WalletController@balance');

Route::post('/member/financial/deposits', 'API\V1\Wallet\DepositController@index');
Route::post('/member/financial/deposit', 'API\V1\Wallet\DepositController@deposit');
Route::post('/member/financial/deposit/{deposit}', 'API\V1\Wallet\DepositController@show');

Route::get('/member/financial/withdraws', 'API\V1\Wallet\WithdrawController@index');
Route::post('/member/financial/withdraws', 'API\V1\Wallet\WithdrawController@store');
Route::post('/member/financial/withdraws/{withdraw}/cancel', 'API\V1\Wallet\WithdrawController@cancel');

Route::post('/member/financial/transactions', 'API\V1\Wallet\TransactionController@index');
Route::get('/member/financial/invoices', 'API\V1\Wallet\InvoiceController@index');
Route::get('/member/affiliate/transections', 'API\V1\Wallet\AffiliateController@dashboard');
Route::get('/member/affiliate/user-graph', 'API\V1\Wallet\AffiliateController@userGraph');
Route::get('/member/affiliate/templates', 'API\V1\Wallet\AffiliateController@template');

Route::post('/packages/{service}', 'API\V1\PackageController@index');

Route::post('/wallet/has-balance/{plan}', 'API\V1\Wallet\WalletController@hasBalance');
Route::post('/wallet/available-balance', 'API\V1\Wallet\WalletController@availableBalance');

Route::post('/brokers', 'API\V1\BrokerController@index');
Route::post('/brokers/{broker}/reviews', 'API\V1\BrokerController@reviewStore');

Route::post('/subscription/verify-email', 'API\V1\SubscriptionController@emailVerification');

Route::post('/subscriprion/{subscription}/payment', 'API\V1\SubscriptionController@payment');
Route::post('/subscriprion/{subscription}/request-cancel', 'API\V1\SubscriptionController@requestCancel');

Route::post('/subscribe', 'API\V1\SubscriptionController@subscribe');
