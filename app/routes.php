<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/halo', function()
{
    return "Halo, bro";
});

Route::get('/halo-juga', ['uses'=>'SiteController@haloJuga']);

Route::put('/sk/{namasukucadang}',['uses'=>'SukuCadangController@update']);

Route::get('/sk/get',function(){
	return SukuCadang::all();
});

Route::get('/register', ['uses'=>'RegistrasiController@formregist']);
Route::post('/register', ['uses'=>'RegistrasiController@validasi']);

Route::get('blade-sample', function(){

    return View::make('blade-sample');

});

Route::get('test', function()
{
	$user = new User2;
	$user->email = "isa@test.com";
	$user->real_name = "Muhammad Isa";
	$user->password = "isa";
	$user->save();
	return "The test user has been saved to the database.";
});

Route::get('/user2',['uses'=>'User2Controller@action_index']);

Route::get('/user2/create',['uses'=>'User2Controller@get_create']);
Route::post('/user2/create',['uses'=>'User2Controller@post_create']);