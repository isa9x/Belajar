<?php
class User2Controller extends BaseController
{
	public function action_index()
	{
		$users = User2::all();
		return View::make('users.index')->with('users', $users);
	}
	public function get_create()
	{
		return View::make('users.create');
	}
	public function post_create()
	{
		$user = new User2;
		$user->real_name = Input::get('real_name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return Redirect::to("user2/create");
	}
}