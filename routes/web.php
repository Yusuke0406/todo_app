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


Route::get('/', 'CategoryController@index')->name('category');

Route::post('/category/store','CategoryController@store');

Route::get('/category/delete/{id}','CategoryController@delete');

Auth::routes();

Route::get('/task/{id}','TaskController@showList')->name('task');

Route::post('/task/{id}/store','TaskController@store')->name('store');



Route::post('/task/{id}/complete','TaskController@complete');

Route::get('/delete/{id}', 'TaskController@delete')->name('delete');
