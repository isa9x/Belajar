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

Route::get('/register', function()
{
    return View::make('register');
});

Route::post('/register', function()
{
    var_dump($_POST);
});

Route::post('/register', function()
{    
	 $validator = Validator::make(
        Input::all(),
        array(
            "email"                 => "required|email|unique:users,email",
            "password"              => "required|min:6",
            "password_confirmation" => "same:password",
        )
    );
	if($validator->passes())
    {
   		$user = new User;
    	$user->email    = Input::get('email');
    	$user->password = Hash::make(Input::get('password'));
    	$user->save();

    	return Redirect::to("register")->with('register_success', 'Selamat, Anda telah resmi menjadi pengangguran, silakan cek email untuk aktivasi :P');
	}
	else
	{
		 return Redirect::to('register')
            ->withErrors($validator)
            ->withInput();
	}

});