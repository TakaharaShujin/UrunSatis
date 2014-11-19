@extends('front.container')
@section('title') Yeni Üye Kaydı @endsection
@section('content')
<h1 class="title orange">Yeni Üye Kaydı</h1>
<div class="register-form borange content">
	<h3 class="shout">Büyük fırsatları kaçımak istemiyor musunuz ? <br />O zaman <em>siz</em> de <b>bizden</b>siniz!</h3>
	<form role="form" autocomplete="off">
		<div class="row">
			<div class="form-group col-lg-6">
				<label for="ad">Ad</label>
				<input type="text" name="ad" id="ad" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label for="soyad">Soyad</label>
				<input type="text" name="soyad" id="soyad" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="sifre">Şifre</label>
			<input type="password" name="sifre" id="sifre" class="form-control">
		</div>
		<button type="submit" class="btn btn-success">Kayıt Ol</button>
		<a href="{{ route('girisFormu') }}" class="btn btn-primary pull-right">Zaten Üyeyim!</a>
	</form>
</div>
@endsection
@section('sidebar')
@endsection