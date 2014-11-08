<?php

class Kullanici extends BaseController {

	public function index()
	{
	}

	public function girisFormu()
	{
		return View::make('front.kullanici.giris-formu');
	}
}