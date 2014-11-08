<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title') </title>
	{{ HTML::style('assets/components/bootstrap/bootstrap.min.css'); }}
	{{ HTML::style('assets/components/font-awesome/font-awesome.min.css'); }}
	{{ HTML::style('assets/css/front.css'); }}
	@yield('styles')
</head>
<body>
	<div class="container">
		<header>
			<div class="row">
				<div class="col-lg-3">
					<figure class="logo">MalMan</figure>
				</div>
				<div class="col-lg-6">
					<form action="#" role="search" class="form-inline" id="topSearch">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Tüm kategorilerde ara..." maxlength="60">
						</div>
						<button type="submit" class="btn"><i class="fa fa-search fa-2x"></i></button>
					</form>
				</div>
				<div class="col-lg-3">
					<div class="btn-group navbar-right" id="userMenu">
						<a href="" class="btn btn-white">Üye Ol</a>
						<a href="" class="btn btn-white">Giriş Yap</a>
						<a href="" class="btn btn-white"><i class="fa fa-shopping-cart"></i> Sepetim</a>
					</div>
				</div>
			</div>
		</header>
		<main>
			<div class="row">
				<div class="col-lg-3">
					<h3 class="title orange">Kategoriler</h3>
					<div class="list-group" id="sideMenu">
						@forelse ($kategoriler as $kategori)
							@if ($kategori->ust_kat == 0)
							<a href="javascript:;" class="list-group-item" data-toggle="collapse" data-target="#cat-{{ $kategori->id }}" data-parent="#sideMenu" class="collapsed">{{ $kategori->baslik }} <i class="fa fa-chevron-right"></i></a>
								@forelse($kategoriler as $alt_kategori)
									<div class="submenu collapse" id="cat-{{ $kategori->id }}">
									@if ($kategori->id == $alt_kategori->ust_kat)
										<a href="{{route('AdminUrunler', array('id' => $alt_kategori->id));}}">{{ $alt_kategori->baslik }}</a>
									@else
										Alt kategori bulunamadı!
									@endif
									</div>
								@empty
								@endforelse
							@endif
						@empty
							<div class="alert alert-info">Kategori Bulunamadı!</div>
						@endforelse
					</div>
				</div>
				<div class="col-lg-9">
					@yield('content')
				</div>
			</div>
		</main>
		<footer>
			<div class="kategoriler">
			<div class="baslik"> Kategoriler</div>
			<div class="col-lg-3">
			<h5>Kategori 1</h5>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
			</div>
			<div class="col-lg-3">
			<h5>Kategori 1</h5>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
			</div>
			<div class="col-lg-3">
			<h5>Kategori 1</h5>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
			</div>
			<div class="col-lg-3">
			<h5>Kategori 1</h5>
			<ul>
				<li>Alt Kategori 1</li>
				<li>Alt Kategori 2</li>
				<li>Alt Kategori 3</li>
				<li>Alt Kategori 4</li>
			</ul>
			</div>
			</div><hr>
			Anasayfa | Hakkımızda | İletişim
		</footer>
	</div>
	{{ HTML::script('assets/js/jquery.min.js'); }}
	{{ HTML::script('assets/components/bootstrap/bootstrap.min.js'); }}
	@yield('scripts')
</body>
</html>