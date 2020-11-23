
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicatio;;n. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('auth.login');
});

Auth::routes([
    'register' => false
]);

//==================================== Admin Route Here ===================================================
//==========================================================================================================//


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    // Admin Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/logout', 'DashboardController@logout')->name('logout');
    // profile
    Route::get('/profile/edit', 'ProfileController@editProfile')->name('edit.profile');
    Route::put('/profile/update', 'ProfileController@updateProfile')->name('update.profile');

    // password change
    Route::get('/password/change', 'ProfileController@PasswordChange')->name('password.change');
    Route::post('/password/update', 'ProfileController@PasswordUpdate')->name('password.update');
     
    // Site Info Setting
    Route::get('/setting', 'SettingController@settings')->name('settings');
    Route::put('/setting/update/{id}', 'SettingController@settingUpdate')->name('setting.update');

    // Customer Route
    Route::get('customers', 'CustomerController@index')->name('customer.index');
    Route::post('customers/store', 'CustomerController@store')->name('customer.store');
    Route::get('customers/edit/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::put('customers/update/{id}', 'CustomerController@update')->name('customer.update');
    Route::delete('customers/destory/{id}', 'CustomerController@destory')->name('customer.destory');

    // Report Controller ==========
    Route::get('customer/report/{id}', 'CustomerController@customerReport')->name('customer.report');
    Route::get('company/report', 'CompanyCostController@companyReport')->name('company.report');
    
    // Search Report
    Route::get('search/report', 'ReportController@searchReport')->name('search.report');
    Route::post('dealer/report', 'ReportController@searchReportResuit')->name('search.report.resuit');
    Route::post('company/cost/report', 'ReportController@companysearchReport')->name('company.search.report');
    Route::post('company/cashin/report', 'ReportController@companyCashin')->name('company.cashin.report');
    Route::post('company/totalamount/report', 'ReportController@companyTotalAmount')->name('company.totalamount.report');

    // Invoice Route
    Route::get('invoices', 'InvoiceController@index')->name('invoice.index');
    Route::get('invoices/create', 'InvoiceController@create')->name('invoice.create');
    Route::post('invoice/store', 'InvoiceController@store')->name('invoice.store');
    Route::get('invoice/edit/{id}', 'InvoiceController@edit')->name('invoice.edit');
    Route::put('invoice/update/{id}', 'InvoiceController@update')->name('invoice.update');
    Route::delete('invoice/destory/{id}', 'InvoiceController@destory')->name('invoice.destory');

    // Compoany Costs Route
    Route::get('company/costs', 'CompanyCostController@index')->name('company.cost.index');
    Route::post('company/costs/store', 'CompanyCostController@store')->name('company.cost.store');
    Route::get('company/costs/edit/{id}', 'CompanyCostController@edit')->name('company.cost.edit');
    Route::put('company/costs/update/{id}', 'CompanyCostController@update')->name('company.cost.update');
    Route::delete('company/costs/destory/{id}', 'CompanyCostController@destory')->name('company.cost.destory');

    // Compoany Cashin Route
    Route::get('cashins', 'CashinController@index')->name('cashin.index');
    Route::post('cashins/store', 'CashinController@store')->name('cashin.store');
    Route::get('cashins/edit/{id}', 'CashinController@edit')->name('cashin.edit');
    Route::put('cashins/update/{id}', 'CashinController@update')->name('cashin.update');
    Route::delete('cashins/destory/{id}', 'CashinController@destory')->name('cashin.destory');

    // Compoany Total Cash Route
    Route::get('montly-sales', 'MonthlySaleController@index')->name('monthly.sale.index');
    Route::post('montly-sale/store', 'MonthlySaleController@store')->name('monthly.sale.store');
    Route::get('montly-sale/edit/{id}', 'MonthlySaleController@edit')->name('monthly.sale.edit');
    Route::put('montly-sale/update/{id}', 'MonthlySaleController@update')->name('monthly.sale.update');
    Route::delete('montly-sale/destory/{id}', 'MonthlySaleController@destory')->name('monthly.sale.destory');
    
});
