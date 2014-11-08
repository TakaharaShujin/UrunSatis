@extends('install.container')
@section('content')
	<form class="form-signin" role="form" action="{{ $formAction }}" method="post">
		<h2 class="form-signin-heading text-center">{{ $siteTitle }}</h2>
		<div class="inputs">
			<input name="siteTitle" type="text" class="form-control" placeholder="Site Başlığı" required="required" autofocus>
			<input name="siteMail" type="text" class="form-control" placeholder="Site İletişim Adresi">
			<select name="siteStatus" class="form-control">
				<option selected="selected">Site Durumu</option>
				<option value="1">Açık</option>
				<option value="0">Kapalı</option>
			</select>
			<textarea name="metaKeys" class="form-control" placeholder="Meta Anahtar Kelimeleri"></textarea>
			<textarea name="metaDesc" class="form-control" placeholder="Meta Açıklaması"></textarea>
			<textarea name="siteAnalytics" class="form-control" placeholder="Analiz Kodları"></textarea>
			<input name="siteFace" type="text" class="form-control" placeholder="Facebook Adresi">
			<input name="siteTwit" type="text" class="form-control" placeholder="Twitter Adresi">
		</div>
		<button class="btn btn-primary btn-block" style="font-size: 18px;" type="submit">Devam</button>
	</form>
@endsection