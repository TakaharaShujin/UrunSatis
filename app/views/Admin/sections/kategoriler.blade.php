@extends('admin.container')
@section('title') Kategoriler @endsection
@section('styles') 					@endsection
@section('scripts')					@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kategoriler <small>Kategorileri Düzenle</small></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						<th colspan="2">Kategori Ekle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2">
							@if (Session::get('cevap')) {{Session::get('cevap')}} @endif
							<form action="{{ action('EklemeMerkezi', array('kategori')) }}" method="post" role="form" class="form-inline row">
								<div class="form-group col-lg-7">
									<input name="baslik" class="form-control full-width" type="text" placeholder="Kategori adını yazınız..">
								</div>
								<div class="form-group col-lg-3">
									<select name="ust_kat" class="form-control full-width">
										<option value="0" selected="selected">Üst Kategori Yok</option>
										@foreach ($kategoriler as $kategori) @if($kategori->ust_kat == 0)
											<option value="{{ $kategori->id }}">{{ $kategori->baslik }}</option>
										@endif @endforeach
									</select>
								</div>
								<button type="submit" class="btn btn-success">Devam Et <i class="fa fa-chevron-right"></i></button>
							</form>
						</td>
					</tr>
				</tbody>
				<thead class="bg-primary">
					<tr>
						<th>Kategori Adı</th>
						<th width="10%" class="tools">İşlemler</th>
					</tr>
				</thead>
				<tbody>
					@forelse($kategoriler as $kategori)
					<tr>
						<td> @if($kategori->ust_kat > 0) <span class="label label-info">Alt Kategori</span> @endif {{ $kategori->baslik }}</td>
						<td class="tools">
							<a href="{{ action('SilmeMerkezi', array('kategori', $kategori->id)) }}" class="btn btn-danger btn-tool" title="Kategoriyi Sil" data-toggle="tooltip"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="2" class="bg-red text-center">
								Henüz hiç kategori eklenmemiş!
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection