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

Route::group(['prefix' => 'admin'], function () {

    //404
    Route::get('/404', 'Admin\NotFoundController@index');

    //default
    Route::get('/', ['uses' => 'Admin\DashboardController@index','as' => 'adminHome']);

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', 'Admin\CustomerController@index')->name('admin.customer');
        Route::post('/create', 'Admin\CustomerController@create')->name('admin.customer.create');
        Route::post('/update', 'Admin\CustomerController@update')->name('admin.customer.update');
        Route::delete('/destroy', 'Admin\CustomerController@destroy')->name('admin.customer.destroy');
   
    });
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'Admin\ProductController@index')->name('admin.product');
    });
    Route::group(['prefix' => 'manufature'], function() {
        Route::get('/', 'Admin\ManufatureController@index')->name('admin.manufature');
    });
    Route::group(['prefix' => 'ingredients'], function() {
        Route::get('/', 'Admin\IngredientsController@index')->name('admin.ingredients');
    });
    Route::group(['prefix' => 'formula'], function() {
        Route::get('/', 'Admin\FormulaController@index')->name('admin.formula');
    });
    Route::group(['prefix' => 'comments'], function() {
        Route::get('/', 'Admin\CommentsController@index')->name('admin.comments');
    });

    Route::group(['prefix' => 'report'], function() {
        Route::get('/salesorder', 'Admin\SalesOrderController@index')->name('admin.report.salesorder');
      
    });
});
Route::get('/', function () {
    return redirect('admin');
});
