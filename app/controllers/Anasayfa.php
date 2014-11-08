<?php

class Anasayfa extends BaseController {

	public function index()
	{
		if (file_exists("lock"))
			return $this->Anasayfa();
		else
			return Redirect::route('installStep1');
	}

	public function Anasayfa()
	{
		$kategoriler = KategorilerMdl::all();
		$urunler = UrunlerMdl::all();
		return View::make('front.sayfalar.anasayfa', compact('kategoriler', 'urunler'));
	}
}
