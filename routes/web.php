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


Route::get('/', 'ProductController@index');

Route::group(['middleware' => 'auth'], function() {
    #Create
    Route::get('/product-add', 'ProductController@productMake');

    Route::post('/products', 'ProductController@productAdd');


    #Read
    Route::get('/dashboard', 'ProductController@dashboard');

    Route::get('/products', 'ProductController@productListing');

    Route::get('/product-search', 'ProductController@productSearch');

    Route::get('/status-center', 'ProductController@statusListing');

    Route::get('/status-search', 'ProductController@statusSearch');


    #Update
    Route::get('/products/{id}/edit', 'ProductController@productEdit');

    Route::put('/products/{id}', 'ProductController@productUpdate');


    #Delete
    Route::delete('/products/{id}', 'ProductController@productDestroy');
});

Auth::routes();
