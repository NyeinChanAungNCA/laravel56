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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','UserRegisterController@register');
Route::post('/update_user','UserRegisterController@update_user');
Route::delete('/delete_user','UserRegisterController@delete');
Route::post('/view_user','UserRegisterController@show');

Route::group(['prefix'=>'artical'],function(){
	Route::get('/index','ArticalController@index');
	Route::get('/{artical}','ArticalController@show');
	Route::post('/store','ArticalController@store')->middleware('auth:api');
	Route::patch('/{artical}','ArticalController@update')->middleware('auth:api');
	Route::delete('/{artical}','ArticalController@destroy')->middleware('auth:api');
});

Route::group(['prefix'=>'post'],function(){
	Route::get('/index','Postcontroller@index');
	Route::post('/store','Postcontroller@store');
	Route::patch('/{post}','Postcontroller@update');
	Route::delete('/{post}','Postcontroller@destroy');
});
