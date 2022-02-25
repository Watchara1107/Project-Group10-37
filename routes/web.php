<?php

use App\Product;
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
    return view('welcome')->with('products',Product::all());
});

Auth::routes();

Route::middleware(['auth','verifyisadmin'])->group(function(){

Route::get('/home', 'HomeController@index')->name('home');

//product
Route::get('admin/product/index','Admin\ProductController@index')->name('index.product');
Route::get('admin/product/from','Admin\ProductController@fromproduct')->name('from.product');
Route::post('admin/product/create','Admin\ProductController@create')->name('create.product');
Route::get('admin/product/edit/{id}','Admin\ProductController@edit');
Route::post('admin/product/update/{id}','Admin\ProductController@update');
Route::get('admin/product/delete/{id}','Admin\ProductController@delete');


//user
Route::get('admin/user/index','Admin\UserController@index')->name('user.index');
Route::get('admin/user/edit/{id}','Admin\UserController@edit');
Route::post('admin/user/update/{id}','Admin\UserController@update');

});
