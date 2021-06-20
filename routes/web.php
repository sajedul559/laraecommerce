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

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');



/*
 Product Routes
 All the routes for our product for frontend
*/
Route::get('/products', 'Frontend\ProductsController@index')->name('products');
Route::get('/product/{slug}', 'Frontend\ProductsController@show')->name('products.show');
Route::get('/search', 'Frontend\PagesController@search')->name('search');




// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'Backend\PagesController@index')->name('admin.index');


// Product Routes
  Route::group(['prefix' => '/products'], function(){
    Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
    Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
    Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');

    Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');

    Route::post('/product/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
    Route::post('/product/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
  });


// Category Routes
  Route::group(['prefix' => '/categories'], function(){
    Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
    Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
    Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');

    Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');

    Route::post('/category/edit/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
    Route::post('/category/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');
  });


});
