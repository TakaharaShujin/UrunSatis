<?php

class Station extends BaseController {

	public function Ekle($process)
	{
		switch ($process) {
			case 'kategori':
				$KategorilerMdl 		= new KategorilerMdl;
				foreach (Input::get() as $k => $v) $KategorilerMdl->$k = $v;
				$KategorilerMdl->sef 	= BaseController::sefGenerator(Input::get('baslik'));
				$Ekle 					= $KategorilerMdl->save();

				if ($Ekle) $mesaj = $this->alert('success', 'Kategori başarıyla eklendi!');
				else $mesaj = $this->alert('danger', 'Kategori eklenirken hata oluştu! Lütfen daha sonra tekrar deneyiniz..');

				return $this->go('AdminKategoriler', $mesaj);
				break;

			case 'sayfa':
				$SayfalarMdl 			= new SayfalarMdl;
				$Girdiler = Input::only('baslik', 'icerik', 'durum');
				foreach ($Girdiler as $k => $v) $SayfalarMdl->$k = $v;
				$SayfalarMdl->sef 		= BaseController::sefGenerator(Input::get('baslik'));
				$Ekle 					= $SayfalarMdl->save();

				if ($Ekle) $mesaj = $this->alert('success', 'Sayfa başarıyla eklendi!');
				else $mesaj = $this->alert('danger', 'Sayfa eklenirken hata oluştu! Lütfen daha sonra tekrar deneyiniz..');

				return $this->go('AdminSayfalar', $mesaj);
				break;

			case 'urun':
				$UrunlerMdl 			= new UrunlerMdl;
				$Girdiler = Input::only('kategori', 'baslik', 'fiyat', 'aciklama');
				foreach ($Girdiler as $k => $v) $UrunlerMdl->$k = $v;
				$UrunlerMdl->sef 		= BaseController::sefGenerator(Input::get('baslik'));
				$Ekle 					= $UrunlerMdl->save();

				if ($Ekle) $mesaj = $this->alert('success', 'Ürün başarıyla eklendi!');
				else $mesaj = $this->alert('danger', 'Ürün eklenirken hata oluştu! Lütfen daha sonra tekrar deneyiniz..');

				return Redirect::route('AdminUrunler', array(Input::get('kategori')))->with('cevap', $mesaj);
				break;
		}
	}

	public function Sil($process, $id)
		{
			switch ($process) {
				case 'kategori':
					$KategorilerMdl 	= KategorilerMdl::find($id);
					if (!empty($KategorilerMdl)){
						$Sil = $KategorilerMdl->delete();
					} else {
						$mesaj = $this->alert('warning', 'Geçersiz işlem!'); return $this->go('AdminKategoriler', $mesaj);
					}

					if ($Sil)
						$mesaj = $this->alert('success', 'Kategori başarıyla silindi!');
					else
						$mesaj = $this->alert('danger', 'Kategori silinirken hata oluştu! Lütfen daha sonra tekrar deneyiniz..');

					return $this->go('AdminKategoriler', $mesaj);
					break;

				case 'sayfa':
					$SayfalarMdl 	= SayfalarMdl::find($id);
					if (!empty($SayfalarMdl)) $Sil = $SayfalarMdl->delete();
					else {
						$mesaj = $this->alert('warning', 'Geçersiz işlem!');
						return $this->go('AdminSayfalar', $mesaj);
					}

					if ($Sil) $mesaj = $this->alert('success', 'Sayfa başarıyla silindi!');
					else $mesaj = $this->alert('danger', 'Sayfa silinirken hata oluştu! Lütfen daha sonra tekrar deneyiniz..');

					return $this->go('AdminSayfalar', $mesaj);
					break;
			}
		}

	public function Guncelle($process, $id)
		{
			switch ($process) {
				case 'ayarlar':
					$AyarlarMdl = AyarlarMdl::find($id);
					foreach (Input::get() as $k => $v) $AyarlarMdl->$k = $v;
					$Guncelle 	= $AyarlarMdl->save();

					if ($Guncelle) $mesaj = $this->alert('success', 'Ayarlar başarıyla güncellendi!');
					else $mesaj = $this->alert('danger', 'Ayarlar güncellenirken hata oluştu!');
				
					return $this->go('AdminAyarlar', $mesaj);

					break;
			}
		}

	private function alert($type, $msg)
		{
			switch ($type) {
				case 'warning': $title = 'Uyarı !'; 	break;
				case 'success': $title = 'Tebrikler !'; break;
				case 'danger': 	$title = 'Hata !'; 		break;
				case 'info': 	$title = 'Bilgi !'; 	break;
			}

			return '<div class="alert alert-' . $type . ' fade in" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>' . $title . '</strong>' . $msg . '</div>';
		}

	public function go($page, $msg)
		{
			return Redirect::route($page)->with('cevap', $msg);
		}
}