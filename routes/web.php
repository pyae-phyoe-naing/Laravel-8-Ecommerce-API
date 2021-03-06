<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin/login', 'AuthController@showLogin');
Route::post('/admin/login', 'AuthController@login')->name('login');


Route::get('/test', 'AuthController@test');
Route::group(['middleware' =>[ 'admin','auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'PageController@home')->name('home');

    Route::resource('/category', 'CategoryController');
    Route::resource('/category.sub', 'SubCategoryController')->shallow();

    Route::resource('/tag', 'TagController');
    Route::resource('/product', 'ProductController');

    Route::get('/order', 'OrderController@index')->name('order');
    Route::get('/order/delete/{id}', 'OrderController@delete')->name('order.delete');
    Route::get('/orderItem/{id}', 'OrderItemController@orderItem')->name('order_item');
    Route::patch('/changeOrderStatus/{id}', 'OrderController@changeOrderStatus')->name('change-status');

    Route::get('/logout', 'PageController@logout')->name('logout');
});
