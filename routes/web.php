<?php

use Illuminate\Routing\RouteGroup;
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

Route::get('/', 'LandingpageController@index')->name('/');
Route::group(['middleware' => 'auth'],function () {
    Route::get('add-to-cart/{id}', 'LandingpageController@addto')->name('add-to');
    Route::get('cart', 'LandingpageController@cart')->name('cart'); 
    Route::get('delete-cart/{id}', 'LandingpageController@deletecart')->name('delete-cart'); 
    Route::get('transaction', 'LandingpageController@transaction')->name('trnsaction'); 
});

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth','admin')
        ->group(function () {
        
            Route::group(['as' => 'admin.'], function(){
                Route::resources([
                    'dashboard' => 'DashboardController',
                    'user' => 'UserController',
                    'transaksi' => 'TransactionController',
                    'gift' => 'GiftController',
                    'penukaran' => 'PenukaranController',
                    'product' => 'ProductController',
                ]);       
            });

});

Route::prefix('user')
        ->namespace('User')
        ->middleware('auth','user')
        ->group(function () {
        
            Route::group(['as' => 'user.'], function(){
                Route::resources([
                    'dashboard' => 'DashboardController',
                    'gift' => 'GiftController',
                    'transaksi' => 'TransactionController',
                    'penukaran' => 'PenukaranController',
                ]);       
            });

});

Route::prefix('api')
        ->namespace('API')
        ->middleware('auth')
        ->group(function () {
        
            Route::group(['as' => 'api.'], function(){
                Route::get('point', 'TransactionController@point')->name('point');
                Route::post('points', 'TransactionController@store')->name('point.store');
            });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
