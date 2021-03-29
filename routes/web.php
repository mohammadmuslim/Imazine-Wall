
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

    //all store route

    Route::get('/allstore','Allstore@index')->name('allstore.index');

    //today sell route

    Route::get('/todaysell','Todaysell@index')->name('todaysell.index');
    
     //shop cost route

     Route::get('/sohpcost','shopcost@index')->name('shopcost.index');

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
    
    
});
 
 
