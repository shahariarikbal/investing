<?php

use Illuminate\Support\Facades\Route;

Route::put("/deposits/{deposit_id}/admin-success", 'DepositController@adminSuccess');
Route::put("/deposits/{deposit_id}/admin-fail", 'DepositController@adminFail');
Route::post("/deposits/{method}", 'DepositController@store');
Route::apiResource("/deposits", 'DepositController');


// Router for all reportes
Route::get('reportes/transaction-history', 'ReportsController@transactionHistory');
Route::get('reportes/deposit-history', 'ReportsController@depositHistory');
Route::apiResource('plans', 'PlanController');

Route::get('/{any?}', 'WalletController@index')->where('any', '.*')->name('index');

/**
 * Withdraw controller
 * */
// Route::get('/withdraw', 'WithdrawController@index')->name('withdraw.index');
