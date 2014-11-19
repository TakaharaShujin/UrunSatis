<?php

class Sayfa extends BaseController {

	public function index($sef)
	{
		/*
		$getKategori 	= KategorilerMdl::find($cid);
		$kategoriler 	= KategorilerMdl::where('ust_kat', '=', $cid)->get();
		foreach ($kategoriler as $kategori)
			$kategoriListe[] = '<li><a href="' .  action('KategoriDetay', array($kategori->sef)) . '">' . $kategori->baslik . '</a></li>';
		$kategoriListe[] = '<li><a href="' .  action('KategoriDetay', array($getKategori->sef)) . '">Tümünü Göster</a></li>';
		return json_encode($kategoriListe);
		*/
	}
}