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
Route::group(['middleware' => 'admin'], function(){
    Route::group(['prefix' => 'admin'], function () {
        //404
        Route::get('/404', 'Admin\NotFoundController@index404');
    
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
            Route::post('/create', 'Admin\ProductController@create')->name('admin.product.create');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
            Route::delete('/destroy', 'Admin\ProductController@destroy')->name('admin.product.destroy');
        });
        Route::group(['prefix' => 'manufature'], function() {
            Route::get('/', 'Admin\ManufatureController@index')->name('admin.manufature');
            Route::post('/create', 'Admin\ManufatureController@create')->name('admin.manufature.create');
            Route::post('/update', 'Admin\ManufatureController@update')->name('admin.manufature.update');
            Route::delete('/destroy', 'Admin\ManufatureController@destroy')->name('admin.manufature.destroy');
        });
        Route::group(['prefix' => 'ingredient'], function() {
            Route::get('/', 'Admin\IngredientController@index')->name('admin.ingredient');
            Route::post('/create', 'Admin\IngredientController@create')->name('admin.ingredient.create');
            Route::post('/update', 'Admin\IngredientController@update')->name('admin.ingredient.update');
            Route::delete('/destroy', 'Admin\IngredientController@destroy')->name('admin.ingredient.destroy');
        });
        Route::group(['prefix' => 'formula'], function() {
            Route::get('/', 'Admin\FormulaController@index')->name('admin.formula');
            Route::post('/create', 'Admin\FormulaController@create')->name('admin.formula.create');
            Route::post('/update', 'Admin\FormulaController@update')->name('admin.formula.update');
            Route::delete('/destroy', 'Admin\FormulaController@destroy')->name('admin.formula.destroy');
        });
        Route::group(['prefix' => 'comment'], function() {
            Route::get('/', 'Admin\CommentController@index')->name('admin.comment');
            Route::post('/create', 'Admin\CommentController@create')->name('admin.comment.create');
            Route::post('/update', 'Admin\CommentController@update')->name('admin.comment.update');
            Route::delete('/destroy', 'Admin\CommentController@destroy')->name('admin.comment.destroy');
        });
    
        Route::group(['prefix' => 'report'], function() {
            Route::get('/salesorder', 'Admin\SalesOrderController@index')->name('admin.report.salesorder');
            Route::get('/formula', 'Admin\ReportFormulaController@index')->name('admin.report.formula');
            Route::get('/mfg-spec', 'Admin\ReportMfgSpecController@index')->name('admin.report.mfgspec');
            Route::get('/cost', 'Admin\ReportCostController@index')->name('admin.report.cost');
            Route::get('/quotation', 'Admin\ReportQuotationController@index')->name('admin.report.quotation');
            Route::get('/inspection', 'Admin\ReportInspectionController@index')->name('admin.report.inspection');


            Route::post('/saveform', 'Admin\SalesOrderController@saveForm')->name('admin.report.saveform');
            Route::post('/saveform-formula', 'Admin\ReportFormulaController@saveForm')->name('admin.report.saveformformula');
            Route::post('/saveform-mfgspec', 'Admin\ReportMfgSpecController@saveForm')->name('admin.report.savemfgspec');
            Route::post('/saveform-cost', 'Admin\ReportCostController@saveForm')->name('admin.report.savecost');
            Route::post('/saveform-quotation', 'Admin\ReportQuotationController@saveForm')->name('admin.report.savequotation');
            Route::post('/saveform-inspection', 'Admin\ReportInspectionController@saveForm')->name('admin.report.saveinspection');


            Route::get('/getcustomrequest', 'Admin\ReportFormulaController@getCustomRequest')->name('admin.report.getcustomrequest');
            Route::get('/getreportformula', 'Admin\ReportMfgSpecController@getReportFormula')->name('admin.report.getreportformula');
            Route::get('/getreportcost', 'Admin\ReportCostController@getReportFormula')->name('admin.reportcost.getreportformula');
            Route::get('/getreportquotation', 'Admin\ReportQuotationController@getReportFormula')->name('admin.reportquotation.getreportformula');
            Route::get('/getreportinspection', 'Admin\ReportInspectionController@getReportFormula')->name('admin.inspection.getreportformula');


        });
    });
}); 


Route::get('/', function () {
    return redirect('/admin');
});

//Login routes
Route::get('login', ['uses' => 'Admin\AuthController@login', 'as' => 'adminLogin']);
Route::post('login', ['uses' => 'Admin\AuthController@postLogin', 'as' => 'postlogin']);
// Route::post('profile', ['uses' => 'Backend\AuthController@profile', 'as' => 'admin.auth.profile']);
Route::get('logout', ['uses' => 'Admin\AuthController@logout', 'as' => 'adminLogout']);
Route::get('register', ['uses' => 'Admin\AuthController@register', 'as' => 'adminRegister']);
Route::post('register', ['uses' => 'Admin\AuthController@postRegister', 'as' => 'postRegister']);



