@extends('admin.container')
@section('title') Sayfalar @endsection
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
		<h1 class="page-header">Sayfalar <small>Sayfaları Düzenle</small></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						<th colspan="3">Sayfa Ekle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="3">
							@if (Session::get('cevap')) {{Session::get('cevap')}} @endif
							<form action="{{ action('EklemeMerkezi', array('sayfa')) }}" method="post" role="form">
								<div class="row">
									<div class="form-group col-lg-8">
										<label class="control-label">Sayfa Başlığı</label>
										<input class="form-control" name="baslik" type="text">
									</div>
									<div class="form-group col-lg-4">
										<label class="control-label">Sayfa Durumu</label>
										<select name="durum" class="form-control">
											<option value="0" selected="selected">Taslak</option>
											<option value="1">Yayında</option>
										</select>
									</div>
									<div class="form-group col-lg-12">
										<label class="control-label">Sayfa İçeriği</label>
										<textarea class="form-control wysi" name="icerik" rows="8"></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i> Sayfa Ekle</button>
							</form>
						</td>
					</tr>
				</tbody>
				<thead class="bg-primary">
					<tr>
						<th width="12%">Sayfa Durumu</th>
						<th>Sayfa Adı</th>
						<th width="10%">İşlemler</th>
					</tr>
				</thead>
				<tbody>
					@forelse($sayfalar as $sayfa)
					<tr>
						<td>
							@if($sayfa->durum == 0)
							<span class="label label-warning">Taslak</span>
							@else
							<span class="label label-success">Yayında</span>
							@endif
						</td>
						<td>{{ $sayfa->baslik }}</td>
						<td class="tools">
							<a href="{{ action('SilmeMerkezi', array('sayfa', $sayfa->id)) }}" class="btn btn-danger btn-tool" title="Kategoriyi Sil" data-toggle="tooltip"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="3" class="bg-red text-center">
								Henüz hiç sayfa eklenmemiş!
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection