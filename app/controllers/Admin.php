<?php

class Admin extends BaseController {

	public function index()
	{
		return View::make('admin.sections.index');
	}

	public function Kategoriler()
	{
		$kategoriler = KategorilerMdl::all();
		return View::make('admin.sections.kategoriler', compact('kategoriler'));
	}

	public function Urunler($kategori)
	{
		$kategori = KategorilerMdl::find($kategori);
		$urunler = UrunlerMdl::where('kategori', $kategori->id)->get();

		$kategoriler = KategorilerMdl::all();

		return View::make('admin.sections.urunler', compact('urunler', 'kategori', 'kategoriler'));
	}

	public function KategoriSec()
	{
		$kategoriler = KategorilerMdl::all();
		return View::make('admin.sections.kategori_sec', compact('kategoriler'));
	}

	public function Sayfalar()
	{
		$sayfalar = SayfalarMdl::all();
		return View::make('admin.sections.sayfalar', compact('sayfalar'));
	}

	public function Galeri()
	{
	}
	public function Kullanicilar($tip = null)
	{
		if($tip == 'tum_kullanicilar')
			$kullanicilar = KullaniciMdl::all();
		elseif ($tip == 'onay_bekleyenler')
			$kullanicilar = KullaniciMdl::where('aktivasyon', '=', 0)->get();
		elseif ($tip == 'onaylananlar')
			$kullanicilar = KullaniciMdl::where('aktivasyon', '=', 1)->get();

		return View::make('admin.sections.kullanicilar', compact('kullanicilar'));
	}
	public function Ayarlar()
	{
		$ayarlar = AyarlarMdl::find(1);
		return View::make('admin.sections.ayarlar', compact('ayarlar'));
	}
}
