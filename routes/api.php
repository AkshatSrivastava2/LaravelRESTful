<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register','RegisterController@register');

Route::post('login','LoginController@login');

Route::post('refresh','LoginController@refresh');

Route::middleware('auth:api')->group(function() {

	Route::get('profile','ProfileController@index');

	Route::post('profile/store','ProfileController@store');

	Route::post('profile/update/{id}','ProfileController@update');
    
	Route::post('logout','LoginController@logout');
});
