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

Route::get('/', function () {
    return view('home');
});

Route::get('/', 'HomeController@index');

Auth::routes();


Route::post('/login/custom',[
    'uses'=>'LoginController@login',
    'as'=>'login.custom'
]);
Route::get('/home','HomeController@index');

Route::group(['prefix' => 'product','middleware'=>'admin'], function () {
    Route::get('/viewProduct','ProductsController@viewProduct');

    Route::get('/addProduct','ProductsController@getaddProduct');
    Route::post('/addProduct','ProductsController@postaddProduct');

    Route::get('/editProduct/{id}','ProductsController@geteditProduct');
    Route::post('/editProduct/{id}','ProductsController@posteditProduct');
    Route::get('/delProduct/{id}','ProductsController@delProduct');
});
