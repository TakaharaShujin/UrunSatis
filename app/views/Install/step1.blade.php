@extends('install.container')
@section('content')
		<form class="form-signin" role="form" action="{{ $formAction }}" method="post">
			<h2 class="form-signin-heading text-center">{{ $siteTitle }}</h2>
			@if (@Session::get('dbStatus'))
			<div class="alert alert-danger">
				<strong>Hata!</strong> {{ Session::get('dbStatus') }}
			</div>
			@endif
			<div class="inputs">
				<input name="dbhost" type="text" class="form-control" placeholder="Veritabanı Hostu" required="required" autofocus="autofocus">
				<input name="dbuser" type="text" class="form-control" placeholder="Veritabanı Kullanıcı Adı" required="required">
				<input name="dbpass" type="password" class="form-control" placeholder="Veritabanı Şifresi">
				<input name="dbname" type="text" class="form-control" placeholder="Veritabanı Adı" required="required">
				<input name="dbpfix" type="text" class="form-control" placeholder="Tablo Öneki | Varsayılan : up_">
			</div>
			<div class="checkbox text-center">
				<label class="btn-block">
					<input type="checkbox" name="eula" required="required"> Kullanım koşullarını kabul ediyorum.
				</label>
			</div>
			<button class="btn btn-primary btn-block" style="font-size: 18px;" type="submit">Devam</button>
		</form>
@endsection