@extends('admin.container')
@section('title') Ayarlar @endsection
@section('styles')@endsection
@section('scripts')@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ayarlar <small>Site Ayarları Düzenle</small></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						<th>Site Ayarlarını Düzenle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							@if (Session::get('cevap')) {{Session::get('cevap')}} @endif
							<form action="{{ action('GuncellemeMerkezi', array('ayarlar', 1)) }}" method="post" role="form" autocomplete="off">
								<div class="row">
									<div class="form-group col-lg-6">
										<label class="control-label">Site Başlığı</label>
										<input class="form-control" name="baslik" type="text" value="{{ $ayarlar->baslik }}">
									</div>
									<div class="form-group col-lg-6">
										<label class="control-label">Site İletişim Adresi</label>
										<input class="form-control" name="iletisim" type="text" value="{{ $ayarlar->iletisim }}">
									</div>
									<div class="form-group col-lg-6">
										<label class="control-label">Anahtar Kelimeler</label>
										<textarea class="form-control" name="kelimeler" rows="4">{{ $ayarlar->kelimeler }}</textarea>
									</div>
									<div class="form-group col-lg-6">
										<label class="control-label">Site Açıklaması</label>
										<textarea class="form-control" name="aciklama" rows="4">{{ $ayarlar->aciklama }}</textarea>
									</div>
									<div class="form-group col-lg-12">
										<label class="control-label">Analytic Kodları</label>
										<textarea class="form-control" name="analytics" rows="4">{{ $ayarlar->analytics }}</textarea>
									</div>
									<div class="form-group col-lg-12">
										<label class="control-label">Site Durumu</label>
										<select name="durum" class="form-control">
											<option value="1"@if($ayarlar->durum == 1) selected="selected" @endif>Açık</option>
											<option value="0"@if($ayarlar->durum == 0) selected="selected" @endif>Kapalı</option>
										</select>
									</div>
									<div class="form-group col-lg-6">
										<label class="control-label">Facebook Adresi</label>
										<div class="input-group">
											<span class="input-group-addon" style="background-color: #3D5B96; color: #fff;"><i class="fa fa-facebook"></i> /</span>
											<input class="form-control" name="facebook" type="text" value="{{ $ayarlar->facebook }}">
										</div>
									</div>
									<div class="form-group col-lg-6">
										<label class="control-label">Twitter Adresi</label>
										<div class="input-group">
											<span class="input-group-addon" style="background-color: #3399CC; color: #fff;"><i class="fa fa-twitter"></i> /</span>
											<input class="form-control" name="twitter" type="text" value="{{ $ayarlar->twitter }}">
										</div>
									</div>
									<div class="form-group col-lg-12">
										<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i> Sayfa Ekle</button>
									</div>
								</div>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection