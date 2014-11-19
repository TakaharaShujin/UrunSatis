<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title') </title>
	{{ HTML::style('assets/components/bootstrap/bootstrap.min.css'); }}
	{{ HTML::style('assets/components/font-awesome/font-awesome.min.css'); }}
	{{ HTML::style('assets/css/animate.css'); }}
	{{ HTML::style('assets/css/front.css'); }}
	@yield('styles')
</head>
<body>
	<div class="container">
		<header>
			<nav class="navbar navbar-default top-menu" role="navigation">
				<ul class="nav navbar-nav navbar-right user-menu">
					<li><a href="{{ action('girisFormu') }}">Giriş Yap</a></li>
					<li><a href="{{ action('kayitFormu') }}">Üye Ol</a></li>
					<li><a href="{{ action('Sepetim') }}"><i class="fa fa-shopping-cart"></i> Sepetim</a></li>		        
				</ul>
			</nav>
			<figure><a href="{{ action('Anasayfa') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="MalMan"></a></figure>
			<form action="{{ action('UrunAra') }}" role="search" class="top-search form-inline">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Tüm kategorilerde ara...">
				</div>
				<button type="submit" class="btn"><i class="fa fa-search"></i></button>
			</form>
		</header>
		<section id="Main">
			<div id="mainContent">
				<aside class="sideContent">
					<h3 class="catTitle">Kategoriler</h3>
					@if (count($kategoriler) > 0)
						<ul class="catMenu">
						@foreach ($kategoriler as $kategori)
							<li><a href="{{ action('Kategori', array($kategori->sef)) }}" class="ajaxMenu" data-id="{{ $kategori->id }}">{{ $kategori->baslik }} <span class="badge">255</span></a></li>
						@endforeach
						</ul>
					@else
						<div class="alert alert-info">Kategori Bulunamadı!</div>
					@endif
					<ul class="sub-menu"></ul>
				</aside>
				<div class="innerContent">
					@yield('content')
				</div>
				<div class="clear"></div>
			</div>
		</section>
		<footer>
			<div class="top">
				<div class="col">
					<h5>Site Haritası</h5>
					<ul>
						<li><a href="{{ action('Anasayfa') }}">Anasayfa</a></li>
						@if (count($kategoriler) > 0)
							@foreach ($sayfalar as $sayfa)
								<li><a href="{{ action('Sayfa', array($sayfa->sef)) }}">{{ $sayfa->baslik }}</a></li>
							@endforeach
						@endif
					</ul>
				</div>
				<div class="col">
					<h5>Kategoriler</h5>
					@if (count($kategoriler) > 0)
						<ul>
						@foreach ($kategoriler as $kategori)
							<li><a href="{{ action('Kategori', array($kategori->sef)) }}">{{ $kategori->baslik }}</a></li>
						@endforeach
						</ul>
					@else
						<div class="alert alert-info">Kategori Bulunamadı!</div>
					@endif
				</div>
				<div class="col">
					<h5>Takip Edin!</h5>
					<ul class="social-link">
						<li><a href="{{ $ayarlar->facebook }}" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i> Facebook</a></li>
						<li><a href="{{ $ayarlar->twitter }}" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i> Twitter</a></li>
						<li><a href="{{ $ayarlar->instagram }}" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i> İnstagram</a></li>
					</ul>
				</div>
				<div class="col">
					<img src="{{ asset('assets/images/secure.png') }}" alt="" width="100%">
				</div>
				<div class="clear"></div>
			</div>
			<div class="bottom">Atsepete.in &copy; 2014 | All rights reserved.</div>
		</footer>
	</div>
	{{ HTML::script('assets/js/jquery.min.js'); }}
	{{ HTML::script('assets/components/bootstrap/bootstrap.min.js'); }}
	{{ HTML::script('assets/js/custom.js'); }}
	@yield('scripts')
</body>
</html>