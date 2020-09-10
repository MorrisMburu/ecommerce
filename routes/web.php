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
	   Route::get('/delete-product-image/{id}', 'ProductsController@deleteProductImage');
	   Route::get('/delete-product-video/{id}', 'ProductsController@deleteProductVideo');
       Route::match(['get', 'post'], '/add-edit-product/{id?}', 'ProductsController@addEditProduct');

       //Attributes
       Route::match(['get','post'],'add-attributes/{id}','ProductsController@addAttributes');
       Route::post('edit-attributes/{id}','ProductsController@editAttributes');
       Route::post('/update-attribute-status', 'ProductsController@updateAttributeStatus');
	   Route::get('/delete-attribute/{id}', 'ProductsController@deleteAttribute');

	   //Images
       Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');
       Route::post('/update-image-status', 'ProductsController@updateImageStatus');
	   Route::get('/delete-image/{id}', 'ProductsController@deleteImage');


	   //Brands
	    Route::get('brands','BrandController@brands');
	    Route::post('update-brand-status','BrandController@updateBrandStatus');
	    Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
	    Route::get('delete-brand/{id?}','BrandController@deleteBrand');

	    //Banner
	    Route::get('banners','BannersController@banners');
	    Route::post('update-banner-status','BannersController@updateBannerStatus');
	    Route::get('delete-banner/{id?}','BannersController@deleteBanner');
	    Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addEditBanner');
    });

}); 


Route::namespace('Front')->group(function(){
		//Homepage 
		Route::get('/', 'IndexController@index');
		//Listing Categories Route
	   Route::get('/{url}','ProductsController@listing');

	});