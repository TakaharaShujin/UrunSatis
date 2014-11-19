<?php

class Kategori extends BaseController {

	public function index($sef)
	{
		$kategori 	= KategorilerMdl::where('sef', '=', $sef)->first();
		$urunler	= KategorilerMdl::find($kategori->id)->urunler()->get();
		/*
		foreach ($urunler as $key => $value) {
			echo('<pre>');
			print_r($value);
			echo('</pre>');
		}
*/
		//$urunler 	= UrunlerMdl::where('kategori', '=', $kategori->id)->get();

		return View::make('front.sayfalar.kategori', compact('kategori', 'urunler')); 
	}

	public function Alt($cid)
	{
		$getKategori 	= KategorilerMdl::find($cid);
		$kategoriler 	= KategorilerMdl::where('ust_kat', '=', $cid)->get();
		foreach ($kategoriler as $kategori)
			$kategoriListe[] = '<li><a href="' .  action('Kategori', array($kategori->sef)) . '">' . $kategori->baslik . '</a></li>';
		$kategoriListe[] = '<li><a href="' .  action('Kategori', array($getKategori->sef)) . '">Tümünü Göster</a></li>';
		return json_encode($kategoriListe);
	}
}