<?php

class SukuCadangController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function tambah()
	{
		DB::beginTransaction();

		$SukuCadang = new SukuCadang;
		$SukuCadang->nama = Input::get('nama');
		$SukuCadang->stok = Input::get('stok');
		$SukuCadang->save();
	
		DB::commit();
	}

	public function getsingle()
	{
		$singlePost = SukuCadang::find(1);
		return ($singlePost);
	}
	
	public function geturl()
	{
		$singlePost = SukuCadang::find(2);
		echo $singlePost->newAttribute; 
		echo '<br>';
		echo $singlePost->url();

		$posts = SukuCadang::where('nama','=','tang')->get();
		//return ($posts);
	}
	
	public function update($namasukucadang)
	{
		$post = SukuCadang::where('nama',$namasukucadang)->first();
		$post->nama=Input::get('nama');
		$post->save();
	}

	public function updateall()
	{
		$post = SukuCadang::where('nama','tang');
		$post->update(['nama'=>'bukan tang']);
	}

	public function delete()
	{
		/*$post = SukuCadang::find(5);
		$post->delete();
		*/
		SukuCadang::where('nama', 'bukan kabel')->delete();
	}

}
