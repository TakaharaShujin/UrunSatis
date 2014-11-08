@extends('admin.container')
@section('title') Genel Bakış @endsection
@section('styles') 					@endsection
@section('scripts')					@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Genel Bakış <small>Genel Bakış ve İstatistikler</small></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-comments fa-5x"></i></div>
					<div class="col-xs-9 text-right">
						<div class="huge">11</div>
						<div>Tomplam Yorum</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-users fa-5x"></i></div>
					<div class="col-xs-9 text-right">
						<div class="huge">112</div>
						<div>Toplam Kullanıcı</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-video-camera fa-5x"></i></div>
					<div class="col-xs-9 text-right">
						<div class="huge">65</div>
						<div>Toplam Anime</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-support fa-5x"></i></div>
					<div class="col-xs-9 text-right">
						<div class="huge">498</div>
						<div>Toplam Güncel</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection