<?php

class RegistrasiController extends BaseController {

	public function formregist()
	{
		return View::make('register');
		
	}

	public function validasi()
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
	}
}
