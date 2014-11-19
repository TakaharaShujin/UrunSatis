@extends('front.container')
@section('title') Üye Girişi @endsection
@section('content')
<h1 class="title orange">Üye Girişi</h1>
<div class="login-form borange content">
	<h3 class="shout"><em>En iyiler</em> her zaman <b>sizde</b> olsun!</h3>
	<form role="form" autocomplete="off">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="sifre">Şifre</label>
			<input type="password" name="sifre" id="sifre" class="form-control">
		</div>
		<button type="submit" class="btn btn-success">Giriş Yap</button>
		<a href="{{ route('girisFormu') }}" class="btn btn-primary pull-right">Kayıt Ol</a>
	</form>
</div>
@endsection
@section('sidebar')
@endsection