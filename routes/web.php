<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',  'HomeController@index');
Route::get('/login',  'AuthController@index');
Route::post('/loggo',  'AuthController@login');
Route::get('/register',  'AuthController@register');
Route::post('/submitreg',  'AuthController@registergo');
Route::get('/logout',  'AuthController@logout');
Route::get('/verify',  'AuthController@verify');
Route::get('/verify/resend',  'AuthController@sendverification');
Route::post('/goverify',  'AuthController@goverify');
Route::get('/verifynow/{email}/{code}',  'AuthController@verifynow');
Route::get('/recovery',  'AuthController@recovery');
Route::post('/recovery/send',  'AuthController@sendrecovery');
Route::post('/recovery/reset',  'AuthController@changepassword');
Route::get('/password/reset/{email}/{token}',  'AuthController@reset');




Route::get('/profile',  'HomeController@profile');
Route::post('/profile/save',  'HomeController@saveprofile');
Route::get('/trades',  'HomeController@trades');
Route::get('/trade',  'HomeController@trade');
Route::get('/trade/join',  'HomeController@jform');
Route::post('/join/go',  'HomeController@join');

Route::get('/trade/new',  'HomeController@newtrade');
Route::post('/trade/save',  'HomeController@savetrade');
Route::get('/trade/{id}',  'HomeController@viewtrade');
Route::post('/proof/update',  'HomeController@updateproof');
Route::post('/trade/accept',  'HomeController@accepttrade');
Route::get('/trade/pay/{trade}',  'HomeController@pay');



Route::get('/market',  'HomeController@market');
Route::get('/transactions',  'HomeController@transactions');
Route::get('/wallet',  'WalletController@index');
Route::get('/deposit',  'WalletController@deposit');
Route::post('/deposit/save',  'WalletController@savedeposit');
Route::post('/deposit/proof',  'WalletController@saveproof');
Route::get('/deposit/cancel/{id}',  'WalletController@destroy');

Route::get('/pay/{id}',  'WalletController@pay');
Route::post('/wallet/withdraw',  'WalletController@withdraw');



Route::get('/offers',  'OfferController@index');
Route::get('/offer',  'OfferController@offer');
Route::get('/newoffer',  'OfferController@new');
Route::post('/saveoffer',  'OfferController@save');
Route::get('/offer/{id}',  'OfferController@view');
Route::get('/offer/delete/{id}',  'OfferController@destroy');




//admin routes
Route::get('/admin',  'AdminController@index');
Route::get('/admin/login',  'AdminController@login');

Route::post('/admin/loggo',  'AdminController@logingo');




Route::get('/admin/assets',  'AssetController@index');
Route::get('/admin/asset/new',  'AssetController@new');
Route::post('/admin/asset/save',  'AssetController@save');
Route::get('/admin/asset/{id}',  'AssetController@view');
Route::get('/admin/asset/delete/{id}',  'AssetController@destroy');


//for trades
Route::get('/admin/trades',  'TradeController@index');
Route::get('/admin/trade/{id}',  'TradeController@view');
Route::post('/admin/trade/status/save',  'TradeController@updatestatus');
Route::get('/admin/trade/delete/{id}',  'TradeController@destroy');


//for user
Route::get('/admin/users',  'UserController@index');
Route::get('/admin/user/delete/{id}',  'UserController@destroy');
Route::get('/admin/user/{username}', 'UserController@view');
Route::post('/admin/user/save',  'UserController@update');
Route::get('/admin/user/',  'UserController@destroy');





Route::get('/admin/profile',  'AdminController@profile');
Route::post('/admin/profile/save',  'AdminController@saveprofile');
Route::get('/admin/logout',  'AdminController@logout');


Route::get('/admin/deposits',  'DepositController@index');
Route::get('/admin/deposit/confirm/{id}',  'DepositController@confirm');
Route::get('/admin/deposit/new/',  'DepositController@new');
Route::post('/admin/deposit/save/',  'DepositController@save');

Route::get('/admin/withdrawals',  'WithdrawalController@index');
Route::get('/admin/withdrawal/confirm/{id}',  'WithdrawalController@confirm');

Route::get('/admin/debits',  'DebitController@index');
Route::get('/admin/debit',  'DebitController@new');
Route::post('/admin/debit/save',  'DebitController@save');


Route::get('/admin/offers',  'AdminController@offers');
Route::get('/admin/offer/delete/{id}',  'AdminController@offerdestroy');







