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
Route::redirect('/', '/'.str_finish(config('squish.path'), '/').'dashboard');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('domains', 'DomainController');