<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title') </title>
	{{ HTML::style('assets/components/bootstrap/bootstrap.min.css'); }}	{{ HTML::style('assets/components/font-awesome/font-awesome.min.css'); }}	{{ HTML::style('assets/css/admin.css'); }} 	@yield('styles')
</head>
<body>
	<div id="wrapper">
		<nav class="navbar text-white navbar-fixed-top" role="navigation">
			<ul class="nav navbar-nav side-nav" id="adminMenu">
				{{ HTML::nav_link('<i class="fa fa-fw fa-dashboard"></i> Anasayfa','Admin') }}
				{{ HTML::nav_link('<i class="fa fa-fw fa-list"></i> Kategoriler','AdminKategoriler') }}
				{{ HTML::nav_link('<i class="fa fa-fw fa-cubes"></i> Ürünler','AdminUrunler', array('')) }}
				{{ HTML::nav_link('<i class="fa fa-fw fa-newspaper-o"></i> Sayfalar','AdminSayfalar') }}
				{{ HTML::nav_link('<i class="fa fa-fw fa-users"></i> Kullanıcılar','AdminKullanicilar', array('tum_kullanicilar')) }}
				{{ HTML::nav_link('<i class="fa fa-fw fa-cogs"></i> Ayarlar','AdminAyarlar') }}
			</ul>
		</nav>
		<div id="page-wrapper">
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
	</div>
	{{ HTML::script('assets/js/jquery.min.js'); }}	{{ HTML::script('assets/components/bootstrap/bootstrap.min.js'); }}	{{ HTML::script('assets/js/admin.js'); }}	@yield('scripts')
</body>
</html>