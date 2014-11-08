@extends('admin.container')
@section('title') Kategori Seç @endsection
@section('styles') 					@endsection
@section('scripts')					@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kategori Seç <small>Ürün Listelemek İçin Kategori Seçin</small></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="list-group" id="sideMenu">
			@foreach ($kategoriler as $kategori)
				@if ($kategori->ust_kat == 0)
				<a href="javascript:;" class="list-group-item" data-toggle="collapse" data-target="#cat-{{ $kategori->id }}" data-parent="#sideMenu" class="collapsed">{{ $kategori->baslik }} <i class="fa fa-chevron-right"></i></a>
				<div class="submenu collapse" id="cat-{{ $kategori->id }}">
					@forelse($kategoriler as $alt_kategori)
						@if ($kategori->id == $alt_kategori->ust_kat)
							<a href="{{route('AdminUrunler', array('id' => $alt_kategori->id));}}">{{ $alt_kategori->baslik }}</a>
						@endif
					@empty
						Alt kategori bulunamadı!
					@endforelse
				</div>
				@endif
			@endforeach
		</div>

	</div>
</div>
@endsection