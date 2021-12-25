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
    return view('welcome');
});


Route::group(['as' => 'message_borads.', 'prefix' => 'message_borads'], function () {
    Route::name('create')->get('/create', 'App\Http\Controllers\MessageBoradController@create');
    Route::name('store')->post('/store', 'App\Http\Controllers\MessageBoradController@store');
    Route::name('index')->get('/index', 'App\Http\Controllers\MessageBoradController@index');
    Route::name('delete')->post('/delete/{id}', 'App\Http\Controllers\MessageBoradController@delete');
    Route::name('edit')->get('/edit/{id}', 'App\Http\Controllers\MessageBoradController@edit');
    Route::name('update')->post('/update/{id}', 'App\Http\Controllers\MessageBoradController@update');
});
