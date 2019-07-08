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

    // Category route
    Route::group(['prefix' => 'category'], function() {
        Route::get('/customer', 'Admin\CustomerController@index')->name('admin.category.customer');
        Route::get('/product', 'Admin\ProductController@index')->name('admin.category.product');
        Route::get('/manufature', 'Admin\ManufatureController@index')->name('admin.category.manufature');
        Route::get('/ingredients', 'Admin\IngredientsController@index')->name('admin.category.ingredients');
        Route::get('/formula', 'Admin\FormulaController@index')->name('admin.category.formula');
        Route::get('/comments', 'Admin\CommentsController@index')->name('admin.category.comments');
    });
    Route::group(['prefix' => 'report'], function() {
        Route::get('/salesorder', 'Admin\SalesOrderController@index')->name('admin.report.salesorder');
      
    });
});
Route::get('/', function () {
    return redirect('admin');
});
