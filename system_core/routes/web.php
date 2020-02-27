<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Route::get('mailable', function () {
//     $token = '7wrOf323GNa906OBGrEHBPGYfuq0Bae7hSWBBiWL2O8wVwOFK5IjZ70hbtjjBk4EPRBiR5cqY1L6ap04lcHDsqTeNALBQ0Lg12QG';
//     $member = \App\Member::find(1);
//     \Illuminate\Support\Facades\Mail::to('sazzadshakhbd@gmail.com')->send(new \App\Mail\MemberVarification($member, $token));
//     return (new \App\Mail\MemberVarification($member, $token))->render();
// });

// Route::get('mailable', function () {
//     // $token = '7wrOf323GNa906OBGrEHBPGYfuq0Bae7hSWBBiWL2O8wVwOFK5IjZ70hbtjjBk4EPRBiR5cqY1L6ap04lcHDsqTeNALBQ0Lg12QG';
//     $member = \App\Member::find(1);
//     \Illuminate\Support\Facades\Mail::to('sazzadshakhbd@gmail.com')->send(new \App\Mail\MemberEmailVerification($member));
//     return (new \App\Mail\MemberEmailVerification($member))->render();
// });

// Route::get('mailable', function () {
//     $signal = \App\Signal::find(132);
//     \Illuminate\Support\Facades\Mail::to('sazzadshakhbd@gmail.com')->send(new \App\Mail\SignalNotificationEmail($signal, 'lorem ipsome dolor sit amet'));
//     return (new \App\Mail\SignalNotificationEmail($signal, 'lorem ipsome dolor sit amet'))->render();
// });

Route::get('/', 'Frontend\HomeController@index');

// Sitemap Route
Route::get('/sitemap', function () {
    return view('frontend.sitemap.sitemap');
});

// Regulation Route
Route::get('/regulation', function () {
    return view('frontend.regulation.regulation');
});

// News-Release Route
Route::get('/newsrelease', function () {
    return view('frontend.newsrelease.newsrelease');
});

// Career Route
Route::get('/career', function () {
    return view('frontend.career.career');
});

// Affiliate Route
Route::get('/affiliate', function () {
    return view('frontend.affiliate.affiliate');
});

// Review Testimonials Route
Route::get('/testimonial', function () {
    return view('frontend.testimonial.testimonial');
});

// Knowledgebase Route
Route::get('/knowledgebase', 'Frontend\KnowledgebaseController@index');
Route::get('/knowledgebase-details/{slug}', 'Frontend\KnowledgebaseController@details');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//MultiAuthentication System

Route::get('/admin/login', function () {
    return redirect('/login/admin', 301);
});

Route::get('/member/login', function () {
    return redirect('/login/member', 301);
});

Route::get('/login/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login/admin', 'Auth\AdminLoginController@login');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout');
Route::get('/dashboard', 'Admin\DashboardController@index');

Route::get('/register/member', 'Auth\RegisterController@showMemberRegisterForm');
Route::get('/register/member/verify', 'Auth\RegisterController@memberVerify');
Route::post('/register/member', 'Auth\RegisterController@createMember');

Route::get('/register/username-is-available', 'Auth\RegisterController@isUsernameAvailable');
Route::get('/register/email-is-available', 'Auth\RegisterController@isEmailAvailable');

Route::get('/login/member', 'Auth\MemberLoginController@showLoginForm')->name('member.login');
Route::post('/login/member', 'Auth\MemberLoginController@login');
Route::post('/member/logout', 'Auth\MemberLoginController@logout');

Route::get('/forgot/password', 'Auth\ForgotPasswordController@forgotPassword');
Route::get('/forgot/password-email-check', 'Auth\ForgotPasswordController@isEmailAvailable');
Route::post('/forgot/password-reset-link', 'Auth\ForgotPasswordController@resetLink');
Route::get('/password-reset', 'Auth\ForgotPasswordController@resetPasswordForm');
Route::post('/password-update', 'Auth\ForgotPasswordController@passwordUpdate');

Route::get('/memberx', 'Member\MemberController@index');
Route::get('/member/dashboard', 'Member\DashboardController@index');
Route::get('/member/dashboard/{any?}', 'Member\DashboardController@index')->name('dashboard')->where('any', '.*');
Route::get('/member/financial/invoices/{id}/download', 'Member\DashboardController@download');

// Route::view('/home', 'home')->middleware('auth');
//Route::View('/member', 'member');

//BlogController

Route::get('/blog/{category?}', 'Frontend\BlogController@index');
Route::get('/blog/{category}/{blog}', 'Frontend\BlogController@show');
Route::delete('/blog/unlike/{blog}/{key}', 'Frontend\BlogController@dislike');
Route::post('/blog/like/{blog}', 'Frontend\BlogController@like');
Route::post('/blog/{blog}/rating', 'Frontend\BlogController@rating');
Route::post('/blog/{blog}/comment', 'Frontend\BlogController@commentStore');
Route::post('/blog/{blog}/comment/{comment}', 'Frontend\BlogController@commentUpdate');
Route::delete('/blog/{blog}/comment/{comment}', 'Frontend\BlogController@commentDestroy');

Route::get('/blog/rating/{blog}/{key}', 'Frontend\BlogController@showRating'); // rating
Route::post('/blog/rating/{blog}/{key?}', 'Frontend\BlogController@rating');  // rating


//AnalysisController

// Route::get('/analyses', 'Frontend\AnalysisController@index');
Route::get('/analysis/{category?}', 'Frontend\AnalysisController@index');
Route::get('/analysis/{category}/{analysis}', 'Frontend\AnalysisController@show');
Route::delete('/analysis/unlike/{analysis}/{key}', 'Frontend\AnalysisController@dislike');
Route::post('/analysis/like/{analysis}', 'Frontend\AnalysisController@like');
Route::post('/analysis/{slug}/rating', 'Frontend\AnalysisController@rating');
Route::post('/analysis/{slug}/comment', 'Frontend\AnalysisController@commentStore');
Route::post('/analysis/{slug}/comment/{comment}', 'Frontend\AnalysisController@commentUpdate');
Route::delete('/analysis/{slug}/comment/{comment}', 'Frontend\AnalysisController@commentDestroy');

Route::get('/analysis/rating/{analysis}/{key}', 'Frontend\AnalysisController@showRating'); // rating
Route::post('/analysis/rating/{analysis}/{key?}', 'Frontend\AnalysisController@rating');  // rating



//AboutUsController

Route::get('/aboutus', 'Frontend\AboutUsController@index');


//CopyTradeController

Route::get('/copytrade', 'Frontend\CopyTradeController@index');



//ForexConsultancyController
Route::get('/forex-consultancy', 'Frontend\ForexConsultancyController@index');

//ForexSignalController
Route::get('/forex-signal/todays-signal', 'Frontend\ForexSignalController@todaysSignal');
Route::get('/forex-signal', 'Frontend\ForexSignalController@index');
Route::get('/forex-signal/{category}', 'Frontend\ForexSignalController@catwisesignal');



//ForexSignalPackageController
Route::get('/forex-signal-package', 'Frontend\ForexSignalPackageController@index');

//ForexSignalReportController
Route::get('/forex-signal-report', 'Frontend\ForexSignalReportController@index');
Route::get('/forex-signal-report/details', 'Frontend\ForexSignalReportController@detailReport');
Route::get('/forex-signal-report/detailsForGraph', 'Frontend\ForexSignalReportController@detailsForGraph');
Route::get('/forex-signal/{currency}/{year}/{month}/{day}/{signal}', 'Frontend\ForexSignalReportController@signalDetails');


Route::get('/subscription/{service}/{plan}', 'Frontend\SubscriptionController@subscription');

//ForexSignalReportController
Route::get('/faq', 'Frontend\FAQController@index');

//ForexBrokerController
Route::get('/forex-brokers', 'Frontend\ForexBrokerController@index');
Route::get('/forex-broker/compare', 'Frontend\ForexBrokerController@compare');

Route::get('/forex-broker/category-parameters', 'Frontend\ForexBrokerController@categoryParameters');
Route::get('/forex-broker/regulation-parameters', 'Frontend\ForexBrokerController@regulationParameters');
Route::get('/forex-broker/countries', 'Frontend\ForexBrokerController@countries');
Route::get('/forex-broker/payment-method-parameters', 'Frontend\ForexBrokerController@paymentMethodParameters');
Route::get('/forex-broker/trading-platform-parameters', 'Frontend\ForexBrokerController@tradingPlatformParameters');
Route::get('/forex-broker/selection-guide', 'Frontend\ForexBrokerController@brokerSelectionGuide');
Route::get('/forex-broker/{broker}', 'Frontend\ForexBrokerController@show');

//ContactUsController
Route::get('/contact-us', 'Frontend\ContactUsController@index');

Route::post('/customer/contact/mail', 'Frontend\ContactUsController@customerContactMail');

//FundManagementController
Route::get('/fund-management', 'Frontend\FundManagementController@index');

//SignalFaqController
Route::get('/signal-faq', 'Frontend\SignalFaqController@index');

//ForexVpxReviewController
Route::get('/forex-vpx-review', 'Frontend\ForexVpxreviewController@index');

//File display
Route::get('/storage/{disk}/{file}', 'Frontend\FileDisplayingController@index');


/**
 * Deposite Routers
 */
Route::match(['get', 'post'], '/deposits/{method}/success', "API\V1\Wallet\DepositController@success")->name('wallet.deposit.success');
Route::match(['get', 'post'], '/deposits/{method}/fail', "API\V1\Wallet\DepositController@fail")->name('wallet.deposit.fail');
Route::match(['get', 'post'], '/deposits/{method}/status', "API\V1\Wallet\DepositController@status")->name('wallet.deposit.status');

// Start AdminDashboard Work

//BlogController

Route::group(['middleware' => ['auth:admin']], function () {

    // blog
    Route::get('/admin/blogs', 'Admin\BlogController@index');
    Route::post('/admin/blog/store', 'Admin\BlogController@store');
    Route::post('ckeditor/upload', 'Admin\BlogController@editorImageUpload')->name('ckeditor.upload');
    Route::post('admin/blog/{blog}/inactive', 'Admin\BlogController@inactive');
    Route::post('admin/blog/{blog}/active', 'Admin\BlogController@active');
    Route::post('admin/blog/{blog}/publish', 'Admin\BlogController@publish');
    Route::get('admin/blog/edit', 'Admin\BlogController@edit');
    Route::post('admin/blog/{blog}/update', 'Admin\BlogController@update');
    Route::post('admin/blog/{blog}/delete', 'Admin\BlogController@delete');
    Route::post('admin/blog/{blog}/restore', 'Admin\BlogController@restore');
    Route::get('admin/blog/trash', 'Admin\BlogController@trashBloglList'); // Display trash list
    Route::delete('admin/blog/{id}/destroy', 'Admin\BlogController@destroy'); // Hard delete
    Route::get('admin/blog/{blog}/restore', 'Admin\BlogController@restore'); // restore


    Route::get('admin/sub-category/{category}', 'Admin\CategoryController@childrens');


    //Analysis
    Route::get('/admin/analyses', 'Admin\AnalysisController@index');
    Route::post('admin/analysis/save', 'Admin\AnalysisController@store');
    Route::post('admin/analysis/{analysis}/inactive', 'Admin\AnalysisController@inactive');
    Route::post('admin/analysis/{analysis}/active', 'Admin\AnalysisController@active');
    Route::post('admin/analysis/{analysis}/publish', 'Admin\AnalysisController@publish');
    Route::get('admin/analysis/edit', 'Admin\AnalysisController@edit');
    Route::post('admin/analysis/{analysis}/update', 'Admin\AnalysisController@update');
    Route::get('admin/analysis/trash', 'Admin\AnalysisController@trashAnalysislList'); // Display trash list
    Route::post('admin/analysis/{analysis}/delete', 'Admin\AnalysisController@delete'); // soft delete
    Route::delete('admin/analysis/{id}/destroy', 'Admin\AnalysisController@destroy'); // Hard delete
    Route::get('admin/analysis/{analysis}/restore', 'Admin\AnalysisController@restore'); // restore

    // Knowledgebase
    Route::get('/admin/knowledgebase', 'Admin\KnowledgebaseController@index');
    Route::post('/admin/knowledgebase/store', 'Admin\KnowledgebaseController@store');
    Route::get('admin/knowledgebase/edit/{knowledgebase}', 'Admin\KnowledgebaseController@edit');
    Route::post('admin/knowledgebase/{knowledgebase}/update', 'Admin\KnowledgebaseController@update');
    Route::post('admin/knowledgebase/{knowledgebase}/active', 'Admin\KnowledgebaseController@active');
    Route::post('admin/knowledgebase/{knowledgebase}/inactive', 'Admin\KnowledgebaseController@inactive');
    Route::post('admin/knowledgebase/{knowledgebase}/publish', 'Admin\KnowledgebaseController@publish');
    Route::post('admin/knowledgebase/{knowledgebase}/delete', 'Admin\KnowledgebaseController@delete');
    Route::get('admin/knowledgebase/trash', 'Admin\KnowledgebaseController@trashKnowledgebaseList'); // Display trash list
    Route::delete('admin/knowledgebase/{id}/destroy', 'Admin\KnowledgebaseController@destroy'); // Hard delete
    Route::get('admin/knowledgebase/{knowledgebase}/restore', 'Admin\KnowledgebaseController@restore'); // restore

    //CommentController
    Route::get('admin/comments', 'Admin\CommentController@index');
    Route::post('admin/comment/{id}/approved', 'Admin\CommentController@approved');
    Route::post('admin/comment/{id}/revoke', 'Admin\CommentController@revoke');
    Route::get('admin/{service}/comments', 'Admin\CommentController@comments'); // Analysis and Blog service

    //PackagesController
    Route::get('admin/packages', 'Admin\PackageController@index');
    Route::get('admin/show/packages/{package}', 'Admin\PackageController@show');
    Route::post('admin/packages/{id}/active', 'Admin\PackageController@active');
    Route::post('admin/packages/{id}/inactive', 'Admin\PackageController@inactive');
    Route::post('admin/package/save', 'Admin\PackageController@store');
    Route::get('admin/package/edit/{id}', 'Admin\PackageController@edit');
    Route::post('admin/package/update/{package}', 'Admin\PackageController@update');
    Route::post('admin/packages/{id}/delete', 'Admin\PackageController@delete');
    Route::get('admin/package/permissions', 'Admin\PackageController@permission');



    //FaqController
    Route::get('admin/faq/{faq}/trash-list', 'Admin\FaqController@trashList'); //Trash List
    Route::post('admin/faq/{faq}/restore', 'Admin\FaqController@restore'); // Restore
    Route::delete('admin/faq/{faq}/destroy', 'Admin\FaqController@destroy'); // Hard delete
    Route::get('admin/faq', 'Admin\FaqController@index');
    Route::get('admin/faq/{faq}', 'Admin\FaqController@show'); //Genarel and ForexSignalFaq
    Route::post('admin/faq/save', 'Admin\FaqController@store');
    Route::get('admin/faq/edit/{faq}', 'Admin\FaqController@edit');
    Route::post('admin/faq/{faq}/update', 'Admin\FaqController@update');
    Route::post('admin/faq/{faq}/active', 'Admin\FaqController@active');
    Route::post('admin/faq/{faq}/inactive', 'Admin\FaqController@inactive');
    Route::post('admin/faq/{id}/delete', 'Admin\FaqController@delete');

    //Currency route
    Route::get('admin/currencies', 'Admin\CurrencyController@index');
    Route::post('admin/currency', 'Admin\CurrencyController@store');
    Route::get('admin/currency/edit/{currency}', 'Admin\CurrencyController@edit');
    Route::post('admin/currency/{currency}/update', 'Admin\CurrencyController@update'); //??
    Route::post('admin/currency/{currency}/delete', 'Admin\CurrencyController@delete'); // Soft delete
    Route::get('admin/trash/currency', 'Admin\CurrencyController@trashCurrencyList'); // Display trash list
    Route::get('admin/currency/{currency}/restore', 'Admin\CurrencyController@restore'); // Data restore
    Route::delete('admin/currency/{id}/destroy', 'Admin\CurrencyController@destroy'); // Hard delete

    //BrokerController
    Route::get('admin/manage/brokers', 'Admin\BrokerController@index');
    Route::get('admin/broker/create', 'Admin\BrokerController@create');
    Route::post('admin/broker/save', 'Admin\BrokerController@store');
    Route::get('admin/broker/{broker}/edit', 'Admin\BrokerController@edit');
    Route::post('admin/broker/{broker}/update', 'Admin\BrokerController@update');
    Route::post('admin/broker/{broker}/delete', 'Admin\BrokerController@delete'); // soft delete
    Route::delete('admin/broker/{broker}/delete', 'Admin\BrokerController@destroy'); // hard delete
    Route::get('admin/broker/{broker}/restore', 'Admin\BrokerController@restore'); // restore
    Route::post('admin/broker/{broker}/active', 'Admin\BrokerController@active'); // activate
    Route::post('admin/broker/{broker}/inactive', 'Admin\BrokerController@inactive'); // inactivate
    Route::get('admin/broker/trash', 'Admin\BrokerController@trash');
    Route::get('admin/brokers/Parametars', 'Admin\BrokerController@parametars');
    Route::get('admin/brokers/reviews', 'Admin\BrokerReviewController@show');
    Route::get('xhr/admin/brokers/reviews', 'Admin\BrokerReviewController@index');
    Route::put('xhr/admin/brokers/reviews/{rating}', 'Admin\BrokerReviewController@update');
    Route::delete('xhr/admin/brokers/reviews/{rating}', 'Admin\BrokerReviewController@destroy');

    Route::get('admin/broker/{broker}/video', 'Admin\BrokerController@video'); // broker video
    Route::post('admin/broker/{broker}/video', 'Admin\BrokerController@videoStore'); // broker video

    Route::post('admin/broker/{broker}/video/{video}/active', 'Admin\BrokerController@videoActive'); // broker active
    Route::post('admin/broker/{broker}/video/{video}/inactive', 'Admin\BrokerController@videoInactive'); // broker inactive

    Route::delete('admin/broker/{broker}/video/{video}/delete', 'Admin\BrokerController@videoDelete'); // broker video delete
    Route::get('admin/broker/{broker}/video/edit/{video}', 'Admin\BrokerController@videoEdit'); // broker video edit
    Route::post('admin/broker/{broker}/video/{video}/update', 'Admin\BrokerController@videoUpdate'); // broker video update

    Route::get('admin/broker/{broker}/pros-cons', 'Admin\BrokerController@prosCons'); // broker prosCons
    Route::post('admin/broker/{broker}/pros-cons', 'Admin\BrokerController@prosConsStore'); // broker prosCons Store

    Route::get('admin/broker/{broker}/seo', 'Admin\BrokerController@seo'); // broker seo
    Route::post('admin/broker/{broker}/seo', 'Admin\BrokerController@seoStore'); // broker seo store

    Route::get('admin/broker/{broker}/press-release', 'Admin\BrokerController@pressReleases'); // broker pressReleases
    Route::post('admin/broker/{broker}/press-release', 'Admin\BrokerController@pressReleasesStore'); // broker pressReleasesStore

    Route::get('admin/broker/{broker}/press-release/edit/{pressRelease}', 'Admin\BrokerController@pressReleaseEdit'); // broker press release edit
    Route::post('admin/broker/{broker}/press-release/{pressRelease}/update', 'Admin\BrokerController@pressReleaseUpdate'); // broker press release update

    Route::post('admin/broker/{broker}/press-release/{pressRelease}/active', 'Admin\BrokerController@pressReleaseActive'); // activate
    Route::post('admin/broker/{broker}/press-release/{pressRelease}/inactive', 'Admin\BrokerController@pressReleaseInactive'); // inactivate

    Route::delete('admin/broker/{broker}/press-release/{pressRelease}/delete', 'Admin\BrokerController@pressDelete'); // broker pressRelease delete

    Route::post('admin/broker/parameter/broker-type', 'Admin\BrokerController@brokerTypeStore');
    Route::post('admin/broker/parameter/broker-type/{parameter}', 'Admin\BrokerController@brokerTypeUpdate');
    Route::delete('admin/broker/parameter/broker-type/{parameter}', 'Admin\BrokerController@brokerTypeDestroy');

    Route::post('admin/broker/parameter/payment-option', 'Admin\BrokerController@paymentOptionStore');
    Route::post('admin/broker/parameter/payment-option/{parameter}', 'Admin\BrokerController@paymentOptionUpdate');
    Route::delete('admin/broker/parameter/payment-option/{parameter}', 'Admin\BrokerController@paymentOptionDestroy');

    Route::post('admin/broker/parameter/regulatory-authority', 'Admin\BrokerController@regulatoryAuthorityStore');
    Route::post('admin/broker/parameter/regulatory-authority/{parameter}', 'Admin\BrokerController@regulatoryAuthorityUpdate');
    Route::delete('admin/broker/parameter/regulatory-authority/{parameter}', 'Admin\BrokerController@regulatoryAuthorityDestroy');

    Route::post('admin/broker/parameter/spread-type', 'Admin\BrokerController@spreadTypeStore');
    Route::post('admin/broker/parameter/spread-type/{parameter}', 'Admin\BrokerController@spreadTypeUpdate');
    Route::delete('admin/broker/parameter/spread-type/{parameter}', 'Admin\BrokerController@spreadTypeDestroy');

    Route::post('admin/broker/parameter/trading-instrument', 'Admin\BrokerController@tradingInstrumentStore');
    Route::post('admin/broker/parameter/trading-instrument/{parameter}', 'Admin\BrokerController@tradingInstrumentUpdate');
    Route::delete('admin/broker/parameter/trading-instrument/{parameter}', 'Admin\BrokerController@tradingInstrumentDestroy');

    Route::post('admin/broker/parameter/trading-platform', 'Admin\BrokerController@tradingPlatformStore');
    Route::post('admin/broker/parameter/trading-platform/{parameter}', 'Admin\BrokerController@tradingPlatformUpdate');
    Route::delete('admin/broker/parameter/trading-platform/{parameter}', 'Admin\BrokerController@tradingPlatformDestroy');
    Route::post('admin/broker/parameter/country', 'Admin\BrokerController@countryParameterUpdate');

    //Signal route
    Route::post('admin/signal/{signal}/restore', 'Admin\SignalController@restore'); // Restore
    Route::get('admin/signals', 'Admin\SignalController@index');
    Route::post('admin/signal', 'Admin\SignalController@store');
    Route::get('admin/signal/edit/{signal}', 'Admin\SignalController@edit');
    Route::post('admin/signal/{signal}/update', 'Admin\SignalController@update');
    Route::get('admin/signal/detail/{signal}', 'Admin\SignalController@show');
    Route::post('admin/signal/fill/{signal}', 'Admin\SignalController@fill');
    Route::post('admin/signal/{signal}/cancel', 'Admin\SignalController@cancel');
    Route::post('admin/signal/{signal}/expire', 'Admin\SignalController@expire');
    Route::post('admin/signal/{signal}/active', 'Admin\SignalController@active');
    Route::post('admin/signal/{id}/delete', 'Admin\SignalController@delete'); // Soft delete
    Route::delete('admin/signal/{id}/destroy', 'Admin\SignalController@destroy'); // Hard delete
    Route::get('admin/signal/{signal}/trash', 'Admin\SignalController@trashSignalList'); // Display trash list

    /*Support route*/
    Route::get('admin/tickets', 'Admin\SupportController@index');
    Route::get('admin/tickets/{id}/detail', 'Admin\SupportController@show');
    Route::post('admin/ticket/{ticket}/reply/', 'Admin\SupportController@createReply');

    /*Performance graph route*/
    Route::get('admin/graphs/{any?}', 'Admin\PerformanceGraphController@index')->where('any', '.*');
    Route::get('xhr/admin/graph/{service}', 'Admin\PerformanceGraphController@show');
    Route::post('xhr/admin/graph', 'Admin\PerformanceGraphController@store');
    Route::get('admin/graph/edit/{graph}', 'Admin\PerformanceGraphController@edit');
    Route::post('admin/graph/{graph}/update', 'Admin\PerformanceGraphController@update');
    Route::post('admin/graph/{graph}/active', 'Admin\PerformanceGraphController@active');
    Route::post('admin/graph/{graph}/inactive', 'Admin\PerformanceGraphController@inactive');

    Route::post('/admin/graph/{graph}/notify', 'Admin\PerformanceGraphController@notify');

    Route::get('xhr/admin/graph/package/{service}', 'Admin\PerformanceGraphController@package');
    Route::get('xhr/admin/graph/member/{service}', 'Admin\PerformanceGraphController@member');
    Route::get('xhr/admin/graph/package/{package}/subscription/{service}', 'Admin\PerformanceGraphController@subscribedMember');

    /**Market Sentiments */
    Route::get('/admin/market-sentiments', 'Admin\MarketSentimentController@index');
    Route::post('/admin/market-sentiments', 'Admin\MarketSentimentController@store');
    Route::get('/admin/market-sentiment/edit/{sentiment}', 'Admin\MarketSentimentController@edit');
    Route::post('admin/market-sentiment/{sentiment}/update', 'Admin\MarketSentimentController@update');
    Route::post('admin/market-sentiment/{sentiment}/active', 'Admin\MarketSentimentController@active');
    Route::post('admin/market-sentiment/{sentiment}/pending', 'Admin\MarketSentimentController@pending');
    Route::delete('admin/market-sentiment/{sentiment}/delete', 'Admin\MarketSentimentController@delete');


    /*Shout route*/
    Route::get('admin/shouts', 'Admin\ShoutController@index');
    Route::post('admin/shout', 'Admin\ShoutController@store');
    Route::get('admin/shout/edit/{shout}', 'Admin\ShoutController@edit');
    Route::post('admin/shout/{shout}/update', 'Admin\ShoutController@update');
    Route::post('admin/shout/{id}/delete', 'Admin\ShoutController@delete'); //Soft delete
    Route::post('admin/shout/{id}/restore', 'Admin\ShoutController@restore'); // Restore
    Route::delete('admin/shout/{id}/destroy', 'Admin\ShoutController@destroy'); // Hard delete
    Route::post('admin/shout/{shout}/active', 'Admin\ShoutController@active');
    Route::post('admin/shout/{shout}/inactive', 'Admin\ShoutController@inactive');
    Route::get('admin/shout/trash', 'Admin\ShoutController@trashShoutList');

    /*Categtory route*/
    Route::get('admin/category/service', 'Admin\CategoryController@serviceSpecificCategory'); // service Category
    Route::get('admin/categories', 'Admin\CategoryController@index');
    Route::get('admin/category/{service}/trash', 'Admin\CategoryController@trashCategoryList'); // Trash list
    Route::get('admin/category/{service}', 'Admin\CategoryController@show');
    Route::post('admin/category', 'Admin\CategoryController@store');
    Route::get('admin/category/edit/{category}', 'Admin\CategoryController@edit');
    Route::post('admin/category/{category}/update', 'Admin\CategoryController@update');
    Route::post('admin/category/{category}/delete', 'Admin\CategoryController@delete'); //Soft delete
    Route::post('admin/category/{id}/restore', 'Admin\CategoryController@restore'); // Restore
    Route::delete('admin/category/{id}/destroy', 'Admin\CategoryController@destroy'); // Hard delete

    Route::get('admin/subscriptions/{any?}', 'Admin\SubscriptionController@index')->name('admin.subscription.index')->where('any', '.*');

    Route::get('xhr/admin/subscriptions/signal/all-subscription', 'Admin\SubscriptionController@allSignalSubscription');
    Route::get('/xhr/admin/subscriptions/signal/member/{package}/{service}', 'Admin\SubscriptionController@subscribedMember');
    Route::get('xhr/admin/subscriptions/signal/member/{service}', 'Admin\SubscriptionController@member');
    Route::get('xhr/admin/subscriptions/package/{service}', 'Admin\SubscriptionController@package');

    Route::get('xhr/admin/subscriptions/copytrade/all-subscripton', 'Admin\SubscriptionController@allCopytradeSubscription');

    Route::get('xhr/admin/subscriptions/fund-management/all-subscripton', 'Admin\SubscriptionController@allFundManagementSubscription');

    Route::get('xhr/admin/subscriptions/{subscription}/deposit', 'Admin\SubscriptionController@deposit');
    Route::get('xhr/admin/subscriptions/{subscription}/balance', 'Admin\SubscriptionController@balance');
    Route::post('xhr/admin/subscriptions/{subscription}/approve', 'Admin\SubscriptionController@approve');
    Route::post('xhr/admin/subscriptions/{subscription}/cancel', 'Admin\SubscriptionController@cancel');
    Route::get('admin/subscription/{service}', 'Admin\SubscriptionController@show')->name('admin.subscription.show');

    Route::get('admin/wallets', 'Admin\Wallet\WalletController@index')->name('admin.wallet.index');
    Route::get('admin/wallet/{member}/transaction', 'Admin\Wallet\WalletController@member')->name('admin.wallet.member.transaction');

    Route::get('admin/wallet/deposit/{any?}', 'Admin\Wallet\DepositController@index')->name('admin.wallet.deposit');
    Route::get('xhr/admin/wallet/deposit/pending', 'Admin\Wallet\DepositController@pending')->name('admin.wallet.deposit.pending');
    Route::get('xhr/admin/wallet/member/deposit/pending', 'Admin\Wallet\DepositController@pendingDepositMember');
    Route::get('xhr/admin/wallet/pending/deposit/transaction', 'Admin\Wallet\DepositController@pendingDepositMemberTransaction');
    Route::post('xhr/admin/wallet/deposit/approve', 'Admin\Wallet\DepositController@postApprove'); // to approve pending deposit
    Route::post('xhr/admin/wallet/deposit/cancel', 'Admin\Wallet\DepositController@postCancel'); // to cancel deposit
    Route::get('xhr/admin/wallet/deposit/approved', 'Admin\Wallet\DepositController@getApprove'); // to get approved deposits
    Route::get('xhr/admin/wallet/deposit/canceled', 'Admin\Wallet\DepositController@getCancel');
    Route::get('/xhr/admin/wallet/member/deposit/canceled', 'Admin\Wallet\DepositController@cancelMemberDeposit');
    Route::get('admin/wallet/{member}/deposit', 'Admin\Wallet\DepositController@member')->name('admin.wallet.member.deposit');
    Route::get('xhr/admin/wallet/deposit/transaction', 'Admin\Wallet\DepositController@transaction'); // transaction deposits
    Route::get('xhr/admin/wallet/cancel/deposit/transaction', 'Admin\Wallet\DepositController@cancelDepositTransaction'); // Cancel transaction deposits


    Route::get('admin/wallet/withdraw/{any?}', 'Admin\Wallet\WithdrawController@index')->name('admin.wallet.withdraw')->where('any', '.*');
    Route::get('xhr/admin/wallet/withdraw/pending', 'Admin\Wallet\WithdrawController@pending')->name('admin.wallet.withdraw.pending');
    Route::post('xhr/admin/wallet/withdraw/approve', 'Admin\Wallet\WithdrawController@postApprove');
    Route::get('xhr/admin/wallet/withdraw/canceled', 'Admin\Wallet\WithdrawController@getCancel');
    Route::post('xhr/admin/wallet/withdraw/cancel', 'Admin\Wallet\WithdrawController@postCancel');
    Route::get('xhr/admin/wallet/withdraw/approved', 'Admin\Wallet\WithdrawController@getApprove'); 

    Route::get('admin/wallet/balance', 'Admin\Wallet\BalanceController@index')->name('admin.wallet.balance');
    Route::get('xhr/admin/wallet/balance', 'Admin\Wallet\BalanceController@getBalance');
    //Route::get('xhr/admin/wallet/member/balance', 'Admin\Wallet\BalanceController@getMemberBalance');

    Route::get('/admin/member-management/{any?}', 'Admin\MemberController@index')->where('any', '.*')->name('admin.member-management');
    Route::get('/xhr/admin/member-management/members', 'Admin\MemberController@members');
    Route::get('/xhr/admin/member-management/members/{member}/balance', 'Admin\MemberController@balance');
    Route::get('/xhr/admin/member-management/members/{member}/deposit', 'Admin\MemberController@deposit');
    Route::get('/xhr/admin/member-management/members/{member}/subscriptions', 'Admin\MemberController@subscriptions');

    Route::get('/admin/monthly-trade-statement/{any?}', 'Admin\MonthlyTradeStatementController@index')->where('any', '.*');
    Route::post('/xhr/admin/monthly-trade-statement', 'Admin\MonthlyTradeStatementController@store');
    Route::get('/xhr/admin/monthly-trade-statement/{service}', 'Admin\MonthlyTradeStatementController@show');
    Route::get('/admin/monthly-trade-statement-edit/{statement}', 'Admin\MonthlyTradeStatementController@edit');
    Route::post('/admin/monthly-trade-statement/{statement}/active', 'Admin\MonthlyTradeStatementController@active');
    Route::post('/admin/monthly-trade-statement/{statement}/inactive', 'Admin\MonthlyTradeStatementController@inactive');
    Route::post('/admin/monthly-trade-statement/{statement}/notify', 'Admin\MonthlyTradeStatementController@notify');
    Route::post('/admin/monthly-trade-statement/{statement}/update', 'Admin\MonthlyTradeStatementController@update');
    Route::get('/admin/monthly-trade-statement-attachment/{statement}', 'Admin\MonthlyTradeStatementController@attachment');

    Route::get('xhr/admin/monthly-trade-statement/package/{service}', 'Admin\MonthlyTradeStatementController@package');
    Route::get('xhr/admin/monthly-trade-statement/member/{service}', 'Admin\MonthlyTradeStatementController@member');

    //Admin Permission Management
    Route::get('/admin/settings/permission-management/{any?}', 'Admin\Settings\PermissionController@index')->where('any', '.*')->name('admin.permission.management');
    Route::post('/xhr/admin/settings/permission-management/create', 'Admin\Settings\PermissionController@store');
    Route::get('/xhr/admin/settings/permission-management/permissions', 'Admin\Settings\PermissionController@permissions');
    Route::get('/xhr/admin/settings/permission-management/edit/{permission}', 'Admin\Settings\PermissionController@edit');
    Route::post('/xhr/admin/settings/permission-management/{permission}/update', 'Admin\Settings\PermissionController@update');

    //Admin Role Management
    Route::get('/admin/settings/role-management/{any?}', 'Admin\Settings\RoleManagementController@index')->where('any', '.*')->name('admin.role.management');
    Route::get('/xhr/admin/settings/role-management/roles', 'Admin\Settings\RoleManagementController@show');
    Route::get('xhr/admin/settings/role-management/permissions', 'Admin\Settings\RoleManagementController@permission');
    Route::post('xhr/admin/settings/role-management', 'Admin\Settings\RoleManagementController@store');
});
