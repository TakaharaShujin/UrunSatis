@extends('front.container')
@section('title') Anasayfa @endsection
@section('styles')
{{ HTML::style('assets/components/flexslider/flexslider.css'); }}
@endsection
@section('scripts')
{{ HTML::script('assets/components/flexslider/flexslider.js'); }}
{{ HTML::script('assets/components/velocity/velocity.min.js'); }}
@endsection

@section('content')
<section class="loading">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div><a href="#" rel="bookmark" target="_blank">Konu Başlığı</a></div>
				<a href="h#" rel="bookmark" target="_blank">
					<img width="690" height="270" src="images/Slider/resim1.jpg" alt="Resim 1" />
				</a>
			</li>
			<li>
				<div><a href="#" rel="bookmark" target="_blank">Konu Başlığı</a></div>
				<a href="h#" rel="bookmark" target="_blank">
					<img width="690" height="270" src="images/Slider/resim2.jpg" alt="Resim 2" />
				</a>
			</li>
		</ul>
	</div>
</section>
<div class="" id="homeMenu">
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
<div class="clear"></div>
<h1 class="title orange mar1015">Günün Ürünleri</h1>
	@if(count($urunler) >0)
		<ul id="urunList">
		@foreach($urunler as $urun)
			<li class="urun col-lg-3">
				<img src="https://placeimg.com/200/250/tech" alt="{{ $urun->baslik }}" class="img-responsive img-rounded">
				<button class="btn btn-orange info">Hızlı Görünüm</button>
			</li>
		@endforeach
		</ul>
		@foreach($urunler as $urun)
			
		@endforeach
	@else
		<div class="alert alert-info mar1015">
		<!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>-->
			<h4>Ürün Bulunamadı!</h4>
			<p>Sisteme henüz hiç ürün eklenmemiş.</p>
		</div>
	@endif
@endsection