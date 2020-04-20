<?php

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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    /* Danh mục sản phẩm */
    Route::group(['prefix' => 'CategoryProduct'], function (){
        Route::get('/', 'AdminCategoryProductController@index')->name('admin.get.list.CategoryProduct');

        Route::get('/create', 'AdminCategoryProductController@create')->name('admin.get.create.CategoryProduct');
        Route::post('/create', 'AdminCategoryProductController@store');

        Route::get('/update/{id}', 'AdminCategoryProductController@edit')->name('admin.get.update.CategoryProduct');
        Route::post('/update/{id}', 'AdminCategoryProductController@update');

        Route::get('/{action}/{id}', 'AdminCategoryProductController@action')->name('admin.get.action.CategoryProduct');
    });
});
