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
Route::get('/', 'IndexController@index');

Route::get('/message/{text}', 'MessageController@store')->middleware('auth');
Route::get('/messages', 'MessageController@all');

Route::get('/auth/login/{name}', 'AuthUserController@login');
Route::get('/auth/logout', 'AuthUserController@logout');

Route::post('/event', 'AuthUserController@event');

\Illuminate\Support\Facades\Auth::routes();