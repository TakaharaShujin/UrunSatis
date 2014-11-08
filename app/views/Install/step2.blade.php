@extends('install.container')
@section('content')
		<form class="form-signin" role="form" action="{{ $formAction }}" method="post">
			<h2 class="form-signin-heading text-center">{{ $siteTitle }}</h2>
			@if (isset($dbStatus))
			<div class="alert alert-success">
				<strong>Başarılı!</strong> {{ $dbStatus }}
			</div>
			@endif
			<div class="inputs">
				<input name="userMail" type="text" class="form-control" placeholder="Kullanıcı Mail Adresi" autofocus>
				<input name="userPass" type="password" class="form-control" placeholder="Kullanıcı Şifresi">
			</div>
			<button class="btn btn-primary btn-block" style="font-size: 18px;" type="submit">Devam</button>
		</form>
@endsection