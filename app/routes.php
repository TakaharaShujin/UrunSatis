<?php

	/*************************
	* Ana Rotalar
	**************************/
	// Anasayfa
	Route::get('/', 					array('as' => 'Anasayfa', 			'uses' => 'Anasayfa@index'));
	// Admin
	Route::get('/admin', 				array('as' => 'Admin', 				'uses' => 'Admin@index'));
	// Giriş
	Route::get('/giris-yap', 			array('as' => 'girisFormu', 		'uses' => 'Kullanici@girisFormu'));
	Route::post('/giris-yap', 			array('as' => 'girisIslemi', 		'uses' => 'Kullanici@girisIslemi'));
	// Kayıt
	Route::get('/kayit-ol', 			array('as' => 'kayitFormu', 		'uses' => 'Kullanici@kayitFormu'));
	Route::post('/kayit-ol', 			array('as' => 'kayitIslemi', 		'uses' => 'Kullanici@kayitIslemi'));




	/*************************
	* Admin Rotaları
	**************************/
	Route::get('/admin/kategoriler', 		array('as' => 'AdminKategoriler', 	'uses' => 'Admin@Kategoriler'));
	Route::get('/admin/urunler', 			array('as' => 'AdminKategoriSec', 	'uses' => 'Admin@KategoriSec'));
	Route::get('/admin/urunler/{id}', 		array('as' => 'AdminUrunler', 		'uses' => 'Admin@Urunler'))->where('id', '[1-9]+');
	Route::get('/admin/galeri/{id}', 		array('as' => 'AdminGaleri', 		'uses' => 'Admin@Galeri'))->where('id', '[1-9]+');
	Route::get('/admin/sayfalar', 			array('as' => 'AdminSayfalar', 		'uses' => 'Admin@Sayfalar'));
	Route::get('/admin/kullanicilar/{tip}', array('as' => 'AdminKullanicilar', 	'uses' => 'Admin@Kullanicilar'));
	Route::get('/admin/ayarlar', 			array('as' => 'AdminAyarlar', 		'uses' => 'Admin@Ayarlar'));
	
	// İşlem Merkezi
	Route::post('/admin/merkez/ekle/{tip}', 			array('as' => 'EklemeMerkezi', 		'uses' => 'Station@Ekle'))->where('process', '[a-z_]+');
	Route::get('/admin/merkez/sil/{tip}/{id}',			array('as' => 'SilmeMerkezi', 		'uses' => 'Station@Sil'))->where(array('tip' => '[a-z_]+', 'id' => '[0-9]+'));
	Route::post('/admin/merkez/guncelle/{tip}/{id}',	array('as' => 'GuncellemeMerkezi', 	'uses' => 'Station@Guncelle'))->where(array('tip' => '[a-z_]+', 'id' => '[0-9]+'));

	/*************************
	* Kullanıcı İşlemleri
	**************************/
	Route::group(array('before' => 'auth'), function()
	{
		// Panel ve Sepet
		Route::get('/panel', 			array('as' => 'Panel',				'uses' => 'Kullanici@Panel'));
		Route::get('/sepetim', 			array('as' => 'Sepetim', 			'uses' => 'Kullanici@Sepetim'));
		// Çıkış
		Route::get('/cikis', 			array('as' => 'cikisIslemi', 		'uses' => 'Kullanici@cikisIslemi'));

	});











	/*************************
	* Kurulum İşlemleri
	**************************/
	// Kurulum Get
		Route::get('/install', array('as' => 'installStep1', 'uses' => 'Install@Home'));
		Route::get('/install/step2', array('as' => 'installStep2Err', 'uses' => 'Install@Error'));
		Route::get('/install/step3', array('as' => 'installStep3Err', 'uses' => 'Install@Error'));
		Route::get('/install/step4', array('as' => 'installStep4Err', 'uses' => 'Install@Error'));

	// Kurulum Post
		Route::post('/install/step2', array('as' => 'installStep2', 'uses' => 'Install@Step2'));
		Route::post('/install/step3', array('as' => 'installStep3', 'uses' => 'Install@Step3'));
		Route::post('/install/step4', array('as' => 'installStep4', 'uses' => 'Install@Step4'));


	/*************************
	* Hata Yakalama Rotaları
	**************************/
	App::error(function(\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $exception)
	{
		Log::error('Yanlış http isteği!');
		return 'Yanlış http isteği!';
	});

	App::error(function(\Symfony\Component\HttpKernel\Exception\NotFoundHttpException  $exception)
	{
		Log::error('Sayfa bulunamadı!');
		return 'Sayfa bulunamadı!';
	});

	App::error(function(\BadMethodCallException  $exception)
	{
		Log::error('Method bulunamadı!');
		return 'Method bulunamadı!';
	});
?>