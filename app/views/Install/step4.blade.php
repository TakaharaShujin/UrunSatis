@extends('install.container')
@section('content')
		<div class="form-signin">
			<h2 class="form-signin-heading text-center">{{ $siteTitle }}</h2>
			<div class="alert alert-success">
				<p>
					<strong>Tebrikler!</strong><br />
					{{ $siteTitle}} Scripti başarıyla kuruldu.<br />
					Güle güle kullanın :) 
				</p>
				<hr>
				<a href="{{ $homeLink }}" class="btn btn-success btn-block" style="font-size: 15px;">Siteyi Göster</a>
				<a href="{{ $adminLink }}" class="btn btn-warning btn-block" style="font-size: 15px;">Yönetim Paneli</a>
			</div>
		</div>
@endsection