@extends('admin.container')
@section('title') Ürünler @endsection
@section('styles')
	{{ HTML::style('assets/components/wysiwyg/wysihtml5.css'); }}
@endsection
@section('scripts')
	{{ HTML::script('assets/components/wysiwyg/wysihtml5.js'); }}
	{{ HTML::script('assets/components/wysiwyg/wysiwyg.js'); }}
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ürünler <small>{{ $kategori->baslik }}</small></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						<th colspan="3" data-toggle="collapse" href="#addProduct" style="cursor: pointer;">Ürün eklemek için tıklayınız</th>
					</tr>
				</thead>
				<tbody id="addProduct" class="panel-collapse collapse in">
					<tr>
						<td colspan="3">
							@if (Session::get('cevap')) {{Session::get('cevap')}} @endif
							<form action="{{ action('EklemeMerkezi', array('urun')) }}" method="post" role="form" class="row">
								<input type="hidden" name="kategori" value="{{ $kategori->id }}">
								<div class="form-group col-lg-8">
									<label>Ürün Başlığı</label>
									<input name="baslik" class="form-control" type="text" placeholder="Ürün başlığı yazınız..">
								</div>
								<div class="form-group col-lg-4">
									<label>Ürün Fiyatı</label>
									<div class="input-group">
										<input name="fiyat" class="form-control" type="text" placeholder="Ürün fiyatını yazınız..">
										<span class="input-group-addon">TL</span>
									</div>
								</div>
								<div class="form-group col-lg-12">
									<label>Ürün Açıklaması</label>
									<textarea class="form-control wysi" name="aciklama" rows="8"></textarea>
								</div>
								<div class="form-group col-lg-4 col-lg-offset-4">
									<button type="submit" class="btn btn-success full-width">Devam Et <i class="fa fa-chevron-right"></i></button>
								</div>
							</form>
						</td>
					</tr>
				</tbody>
				<thead class="bg-primary">
					<tr>
						<th width="5%">#ID</th>
						<th>Ürün Adı</th>
						<th width="10%">İşlemler</th>
					</tr>
				</thead>
				<tbody>
					@forelse($urunler as $urun)
					<tr>
						<td>#{{ $urun->id }}</td>
						<td> {{ $urun->baslik }}</td>
						<td class="tools">
							<a href="{{ action('SilmeMerkezi', array('urun', $urun->id)) }}" class="btn btn-danger btn-tool" title="Kategoriyi Sil" data-toggle="tooltip"><i class="fa fa-times"></i></a>
							<a href="{{ action('AdminGaleri', array($urun->id)) }}" class="btn btn-warning btn-tool" title="Resim Ekle" data-toggle="tooltip"><i class="fa fa-plus"></i><i class="fa fa-picture-o"></i></a>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="3" class="bg-red text-center">
								Bu kategoride hiç ürün bulunmamaktadır!
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection