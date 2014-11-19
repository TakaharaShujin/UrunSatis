<?php

class BaseController extends Controller {

	protected function setupLayout()
		{
			if ( ! is_null($this->layout))
			{
				$this->layout = View::make($this->layout);
			}
			$ayarlar = AyarlarMdl::find(1);
			$sayfalar = SayfalarMdl::where('durum', '=', 1)->get();
			$kategoriler = KategorilerMdl::where('ust_kat', '=', 0)->get();
			View::share(compact('sayfalar', 'ayarlar', 'kategoriler'));
		}

	public function arrayToObject($array)
		{
			if (!is_array($array)) {
				return $array;
			}
			
			$object = new stdClass();
			if (is_array($array) && count($array) > 0) {
				foreach ($array as $name=>$value) {
					$name = strtolower(trim($name));
					if (!empty($name)) {
						$object->$name = $this->arrayToObject($value);
					}
				}
				return $object;
			}
			else {
				return FALSE;
			}
		}

	public function sefGenerator($string)
		{
			$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#','.');
			$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp','');
			$string = strtolower(str_replace($find, $replace, $string));
			$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
			$string = trim(preg_replace('/\s+/', ' ', $string));
			$string = str_replace(' ', '-', $string);
			return $string;
		}
}
