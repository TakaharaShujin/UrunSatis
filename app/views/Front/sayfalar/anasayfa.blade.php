@extends('front.container')
@section('title') Anasayfa @endsection
@section('styles')
{{ HTML::style('assets/components/flexslider/flexslider.css'); }}
@endsection
@section('scripts')
{{ HTML::script('assets/components/flexslider/flexslider.js'); }}
@endsection

@section('content')
<section class="loading">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div><a href="#" rel="bookmark" target="_blank">Konu Başlığı</a></div>
				<a href="h#" rel="bookmark" target="_blank">
					<img width="690" height="270" src="{{ asset('assets/images/Slider/resim1.jpg'); }}" alt="Resim 1" />
				</a>
			</li>
			<li>
				<div><a href="#" rel="bookmark" target="_blank">Konu Başlığı</a></div>
				<a href="h#" rel="bookmark" target="_blank">
					<img width="690" height="270" src="{{ asset('assets/images/Slider/resim2.jpg'); }}" alt="Resim 2" />
				</a>
			</li>
		</ul>
	</div>
</section>
<!--
<div class="midi-menu o-h">
	<div class="col-lg-3">
		<figure>
			<h3>Kategori 1</h3>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
		</figure>
	</div>
	<div class="col-lg-3">
		<figure>
			<h3>Kategori 2</h3>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
		</figure>
	</div>
	<div class="col-lg-3">
		<figure>
			<h3>Kategori 3</h3>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
		</figure>
	</div>
	<div class="col-lg-3">
		<figure>
			<h3>Kategori 4</h3>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
		</figure>
	</div>
</div>
-->
<h1 class="title orange">Günün Ürünleri</h1>
<div class="clear"></div>
	@if(count($urunler) >0)
		<ul class="urunList">
		@foreach($urunler as $urun)
			<li class="urun">
				<figure>
					<img src="{{ asset('assets/images/urun.jpg') }}" alt="{{ $urun->baslik }}">
					<figcaption>
						<h3>{{ $urun->baslik }}</h3>
						<span>{{ $urun->fiyat }} TL</span>
						<a href="{{ action('UrunDetay', array($urun->sef)) }}" class="btn btn-warning btn-block btn-xs"><i class="fa fa-search"></i> İncele</a>
					</figcaption>
				</figure>
			</li>
		@endforeach
		</ul>
	@else
		<div class="alert alert-info mar1015">
		<!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>-->
			<h4>Ürün Bulunamadı!</h4>
			<p>Sisteme henüz hiç ürün eklenmemiş.</p>
		</div>
	@endif
@endsection

