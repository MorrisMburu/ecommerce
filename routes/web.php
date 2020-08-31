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

Route::get('/', function () {
    return view('frontend.templates.main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::match(['get', 'post'], '/', 'AdminController@login');
	Route::group(['middleware'=>['admin']], function(){

	   Route::get('/dashboard', 'AdminController@index');
	   Route::get('/settings', 'AdminController@settings');
	   Route::get('/logout', 'AdminController@logout');
	   Route::post('/check-current-pwd', 'AdminController@chkCurrentPassword');
	   Route::post('/update-current-pwd', 'AdminController@updateCurrentPassword');
       Route::match(['get', 'post'], '/update-admin-details', 'AdminController@updateAdminDetails');

       //Section
	   Route::get('/sections', 'SectionController@section');
	   Route::post('/update-section-status', 'SectionController@updateSectionStatus');

	   //Categories
	   Route::get('/categories', 'CategoryController@categories');
	   Route::post('/update-category-status', 'CategoryController@updateCategoryStatus');
       Route::match(['get', 'post'], '/add-edit-category/{id?}', 'CategoryController@addEditCategory');
	   Route::post('/append-categories-level', 'CategoryController@appendCategoriesLevel');
	   Route::get('/delete-category-image/{id}', 'CategoryController@deleteCategoryImage');
	   Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');

	   //Products
	   Route::get('/products', 'ProductsController@products');
	   Route::post('/update-product-status', 'ProductsController@updateProductStatus');
	   Route::get('/delete-product/{id}', 'ProductsController@deleteProduct');
       Route::match(['get', 'post'], '/add-edit-product/{id?}', 'ProductsController@addEditProduct');
    });


}); 