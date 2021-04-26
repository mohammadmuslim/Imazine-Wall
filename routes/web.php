
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

    // Sell route
    Route::get('/sell', 'SellController@index')->name('sell.index');
    Route::post('/sell/store', 'SellController@store')->name('sell.store');

    //all store route
    Route::get('/allstore','Allstore@index')->name('allstore.index');

    //today sell route
    Route::get('/todaysell','Todaysell@index')->name('todaysell.index');

     //shop cost route

     Route::get('/sohpcost','ShopcostController@index')->name('shopcost.index');
     Route::post('/sohpcost/added','ShopcostController@costadd')->name('shopcost.added');
     Route::get('/sohpcost/edit/{id}','ShopcostController@costedit')->name('shopcost.edit');
     Route::put('/sohpcost/update/{id}','ShopcostController@update')->name('shopcost.update');



     //collection route

     Route::get('/collection','CollectionController@index')->name('collection.index');
     Route::post('/collection/store','CollectionController@store')->name('collection.store');
     Route::get('/collection/edit/{id}','CollectionController@edit')->name('collection.edit');
     Route::put('/collection/update/{id}','CollectionController@update')->name('collection.update');
     Route::delete('/collection/delete/{id}','CollectionController@delete')->name('collection.delete');

     //addshop route
     Route::get('/addshop','AddshopController@index')->name('addshop.index');
     Route::post('/addshop/added','AddshopController@addshop')->name('addshop.added');

     // All Shop route
     Route::get('/shop/{id}','AddshopController@shopview')->name('shop.view');


     //addshop route
     Route::get('/stock','stock@index')->name('stock.index');

     //add prdduct
     Route::get('/product','ProductController@index')->name('product.index');
     Route::post('/product/add','ProductController@addproduct')->name('product.add');

    // Stock
    Route::get('/stock','StockController@index')->name('stock.index');
    Route::post('/stock/store','StockController@store')->name('stock.store');
    Route::get('/stock/edit/{id}','StockController@edit')->name('stock.edit');
    Route::put('/stock/update/{id}','StockController@update')->name('stock.update');
    Route::delete('/stock/delete/{id}','StockController@delete')->name('stock.delete');

    // Stock
    Route::get('/stock','StockController@index')->name('stock.index');
    Route::post('/stock/store','StockController@store')->name('stock.store');
    Route::get('/stock/edit/{id}','StockController@edit')->name('stock.edit');
    Route::put('/stock/update/{id}','StockController@update')->name('stock.update');
    Route::delete('/stock/delete/{id}','StockController@delete')->name('stock.delete');


    //Bangking
    Route::get('/bank_data','BankController@index')->name('bank.index');
    Route::post('/bank_data','BankController@addamount')->name('amount.add');

    //bank drap
    Route::get('/add-bank','AddBankController@index')->name('bank.add');
    Route::post('/bank-store','AddBankController@store')->name('bank.added');
    //withdraw
    Route::get('/bank-withdraw','AddBankController@withdraw')->name('bank.withdraw');
    Route::post('/withdraw','AddBankController@withdrawamount')->name('amount.withdraw');

    //all bank route
    Route::get('/bank/{id}','BankController@bankview')->name('bank.view');
    //cash
    Route::get('/cash','CashController@index')->name('shop.cash');


});


