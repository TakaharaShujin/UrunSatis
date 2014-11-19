<?php

class KategorilerMdl extends Eloquent {

	protected 	$table 		= 'kategoriler';
	public 		$timestamps = false;

	public function urunler ()
	{
        return $this->hasMany('UrunlerMdl', 'id');
	}
}