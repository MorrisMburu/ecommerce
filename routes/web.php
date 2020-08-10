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

Route::get('/dashboard', 'BackendController@index')->name('backend.index');

Route::resource('dashboard/productcategory', 'ProductCategoryController');
Route::resource('dashboard/product', 'ProductController');
Route::resource('dashboard/productImage', 'ProductImageController');

Route::resource('dashboard/contact', 'ContactController');
Route::resource('dashboard/contactform', 'ContactFormController');

Route::resource('dashboard/payment', 'PaymentController');
Route::resource('dashboard/customerDetail', 'CustomerDetailController');