<?php
class User2 extends Eloquent
{
	protected $table = 'users2';
	public function set_password($string)
	{
		$this->set_attribute('password', Hash::make($string));
	}
}