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

Route::get('/message/{text}', 'MessageController@store');
Route::get('/message', 'MessageController@all');

Route::get('/auth/login/{user}', 'AuthUserController@login');
Route::get('/auth/logout', 'AuthUserController@logout');
Route::get('/auth/register/{name}', 'AuthUserController@register');
