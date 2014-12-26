<?php

class SukuCadang extends Eloquent {


	protected $table = 'suku_cadang';
	public $timestamps = false;

	public $newAttribute = 'new attribute';

    public function url()
    {
        return 'http:://www.domain.com/post/' . $this->nama;
    }


}
