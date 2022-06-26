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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/config/whitelistcard', 'HomeController@whitelistcard')->name('config.whitelistcard')->middleware('auth');
Route::get('/config/blacklistip', 'HomeController@blacklistip')->name('config.blacklistip')->middleware('auth');
Route::get('/config/blacklistemail', 'HomeController@blacklistemail')->name('config.blacklistemail')->middleware('auth');
Route::get('/config/blacklistcard', 'HomeController@blacklistcard')->name('config.blacklistcard')->middleware('auth');
Route::get('/config/blacklistbins', 'HomeController@blacklistbins')->name('config.blacklistbins')->middleware('auth');
Route::get('/config/locksbyip', 'HomeController@locksbyip')->name('config.locksbyip')->middleware('auth');

Route::post('/ajax-whitelistcard-get-all', 'HomeController@ajax_whitelistcard_get_all')->name('ajax_whitelistcard_get_all');
Route::post('/ajax-blacklistip-get-all', 'HomeController@ajax_blacklistip_get_all')->name('ajax_blacklistip_get_all');
Route::post('/ajax-blacklistemail-get-all', 'HomeController@ajax_blacklistemail_get_all')->name('ajax_blacklistemail_get_all');
Route::post('/ajax-blacklistcard-get-all', 'HomeController@ajax_blacklistcard_get_all')->name('ajax_blacklistcard_get_all');
Route::post('/ajax-blacklistbins-get-all', 'HomeController@ajax_blacklistbins_get_all')->name('ajax_blacklistbins_get_all');
Route::post('/ajax-locksbyip-get-all', 'HomeController@ajax_locksbyip_get_all')->name('ajax_locksbyip_get_all');

Route::post('/ajax-resume-transactions', 'HomeController@ajax_resume_transactions')->name('ajax_resume_transactions');
Route::post('/ajax-transactions-by-card-type', 'HomeController@ajax_transactions_by_card_type')->name('ajax_transactions_by_card_type');
Route::post('/ajax-transactions-by-card-brand', 'HomeController@ajax_transactions_by_card_brand')->name('ajax_transactions_by_card_brand');
Route::post('/ajax-count-transactions', 'HomeController@ajax_count_transactions')->name('ajax_count_transactions');
Route::post('/ajax-count-method-sale', 'HomeController@ajax_count_method_sale')->name('ajax_count_method_sale');
Route::post('/ajax-amount-transactions', 'HomeController@ajax_amount_transactions')->name('ajax_amount_transactions');

Route::get('/transactions/list','TransactionsController@index')->name('transactions.list');
Route::get('/transactions/settlements','TransactionsController@settlements_report')->name('transactions.settlements');

Route::Post('/transactions/generate-token','TransactionsController@generate_token')->name('transactions.generate_token');

Route::get('/transactions/settlements','TransactionsController@settlements_report')->name('transactions.settlements');
Route::get('/transactions/daily-closing-detail','TransactionsController@daily_closing_detail')->name('transactions.daily_closing_detail');
Route::get('/transactions/daily-closing-summary','TransactionsController@daily_closing_summary')->name('transactions.daily_closing_summary');

Route::get('/transactions/clientreport','TransactionsController@client_summary_report')->name('transactions.clientreport');
Route::get('/transactions/administrator','TransactionsController@administrator_report')->name('transactions.administrator');

Route::get('/applications/urlpayment','TransactionsController@urlpayment')->name('applications.urlpayment');
Route::get('/PaymentGateway','TransactionsController@paymentgateway')->name('transactions.paymentgateway');
Route::post('/ajax-urlpayments-get-all', 'TransactionsController@ajax_urlpayments_get_all')->name('ajax_urlpayments_get_all');

Route::post('/ajax-transactions-get-all', 'TransactionsController@ajax_transactions_get_all')->name('ajax_transactions_get_all');
Route::post('/ajax-client-summary-get-all', 'TransactionsController@ajax_client_summary_get_all')->name('ajax_client_summary_get_all');
Route::post('/ajax-settlements-get-all', 'TransactionsController@ajax_settlements_get_all')->name('ajax_settlements_get_all');
Route::post('/ajax-daily-closing-detail-get-all', 'TransactionsController@ajax_daily_closing_detail_get_all')->name('ajax_daily_closing_detail_get_all');
Route::post('/ajax-daily-closing-summary-get-all', 'TransactionsController@ajax_daily_closing_summary_get_all')->name('ajax_daily_closing_summary_get_all');

Route::post('/AdditionalData', 'TransactionsController@additional_data')->name('additional_data');
Route::post('/RiskScoreDetailData', 'TransactionsController@risk_score_detail_data')->name('risk_score_detail_data');
Route::post('/JsonEmailRiskScore', 'TransactionsController@json_email_risk_score')->name('json_email_risk_score');
Route::post('/JsonProxyRiskScore', 'TransactionsController@json_proxy_risk_score')->name('json_proxy_risk_score');
Route::post('/JsonIARiskScore', 'TransactionsController@json_ia_risk_score')->name('json_ia_risk_score');

Route::get('/customers/list','CustomersController@index')->name('customers.list');
Route::get('/customers/edit','CustomersController@edit')->name('customers.edit');
Route::get('/customers/create','CustomersController@create')->name('customers.create');
Route::post('/ajax-customers-get-all', 'CustomersController@ajax_customers_get_all')->name('ajax_customers_get_all');
Route::post('/ajax-processors-get-all', 'CustomersController@ajax_processors_get_all')->name('ajax_processors_get_all');

Route::get('/users/list','UsersController@index')->name('users.list');
Route::post('/ajax-users-get-all', 'UsersController@ajax_users_get_all')->name('ajax_users_get_all');


Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});