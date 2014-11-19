@extends('front.container')
@section('title') {{ $kategori->baslik }} | {{ $ayarlar->baslik }} @endsection
@section('styles')
@endsection
@section('scripts')
@endsection

@section('content')
<h1 class="title orange"><em>{{ $kategori->baslik }}</em> <small>kategorisindeki ürünler</small></h1>
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

