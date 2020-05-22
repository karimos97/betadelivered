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
Auth::routes();

Route::get(         '/home' , 'HomeController@index')->name('home');
Route::redirect(    '/home' , '/order');
Route::redirect(    '/'     , '/order');

Route::group(['prefix' => '/order','middleware' => 'auth'], function () {
        
    Route::get('/'              , 'OrderController@home')->name('datatables.data');
    Route::post('/insert'       , 'OrderController@insert');
    Route::delete('/delete'     , 'OrderController@remove');
    Route::put('/edit'          , 'OrderController@edit');

});


Route::group(['prefix' => '/product','middleware' => 'auth'], function () {

    Route::get('/'                  , 'ProductsController@home')->name('productstable.data');
    Route::post('/insert'           , 'ProductsController@insert')->middleware('auth');
    Route::delete('/delete'         , 'ProductsController@remove')->name('delete');
    Route::put('/edit'              , 'ProductsController@edit');

});

