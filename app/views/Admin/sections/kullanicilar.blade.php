@extends('admin.container')
@section('title') Kullanıcılar @endsection
@section('styles') 					@endsection
@section('scripts')					@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kullanıcılar <small>Kullanıcıları Düzenle</small></h1>
	</div>
</div>
<ul class="nav nav-pills contentMenu bg-primary" role="tablist">
	{{ HTML::sub_link('Tüm Kullanıcılar','AdminKullanicilar', array('tum_kullanicilar')) }}
	{{ HTML::sub_link('Onay Bekleyenler', 'AdminKullanicilar', array('onay_bekleyenler')) }}
	{{ HTML::sub_link('Onaylananlar', 'AdminKullanicilar', array('onaylananlar')) }}
</ul>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						<th width="30">#ID</th>
						<th>Ad</th>
						<th>Soyad</th>
						<th>E-Mail</th>
						<th width="95">Aktivasyon</th>
						<th width="10%" class="tools">İşlemler</th>
					</tr>
				</thead>
				<tbody>
					@forelse($kullanicilar as $kullanici)
					<tr>
						<td>{{ $kullanici->id }}</td>
						<td>{{ $kullanici->ad }}</td>
						<td>{{ $kullanici->soyad }}</td>
						<td>{{ $kullanici->email }}</td>
						<td> @if($kullanici->aktivasyon == 0) <span class="label label-danger">Pasif</span> @else <span class="label label-success">Aktif</span> @endif</td>
						<td class="tools">
							<a href="{{ action('SilmeMerkezi', array('kullanici', $kullanici->id)) }}" class="btn btn-danger btn-tool" title="Kullanıcıyı Sil" data-toggle="tooltip"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="4" class="bg-red text-center">
								Henüz hiç kullanıcı eklenmemiş!
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection