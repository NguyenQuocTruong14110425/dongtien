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
Route::group(['middleware' => ['sessions']], function () {
    Route::group(['namespace'=>'API'],function() {
        Route::get('/product/list', 'ProductController@getList');
        Route::get('/product/detail/{id}', 'ProductController@getFind');

        // giỏ hàng
        // có 2 cái CartController , 1 cái ở admin dùng để quản lí đơn hàng, 1 cái ở client dùng trong giỏ hàng=> coi chừng bị lộn nhé a
        //
        Route::group(['prefix'=>'giohang'],function (){
            Route::get('/list','CartController@getList')->name('payment.cart');
            Route::post('edit/{id}','CartController@edit_purchase')->name('editCart');
            Route::get('delete/{id}','CartController@delete_purchase')->name('deleteCart');
            Route::get('removeall','CartController@removeall')->name('removecart');
            Route::post('add-cart/{id}', 'CartController@getPurchase');
            Route::post('update-price/{id}', 'CartController@updatePrice');
        });
    });
});
