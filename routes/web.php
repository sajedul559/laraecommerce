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

Route::get('/', 'PagesController@index')->name('index');
Route::get('/contact', 'PagesController@contact')->name('contact');


Route::get('/products', 'PagesController@products')->name('products');

Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'AdminProductController@index')->name('admin.index');
  Route::get('/product/create', 'AdminProductController@create')->name('admin.product.create');
  Route::get('/products', 'AdminProductController@index')->name('admin.products');
  Route::get('/product/edit{id}', 'AdminProductController@edit')->name('admin.product.edit');
 Route::post('/product/edit/{id}', 'AdminProductController@update')->name('admin.product.update');
 Route::post('/product/delete/{id}', 'AdminProductController@delete')->name('admin.product.delete');

  Route::post('/product/create', 'AdminProductController@store')->name('admin.product.store');
});
