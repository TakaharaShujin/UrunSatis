<?php

App::before(function($request)
{
});


App::after(function($request, $response)
{
});

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('giris-yap')->withErrors(array('Bu işlemi yapabilmek için sisteme giriş yapmanız gerekiyor'));
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

Route::filter('is_guest', function()
{
	if (Auth::guest()) return Redirect::to('/welcome');
});

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('admin', function() {
	if (Auth::user()->group != '1') return View::make('admin.error')->with(array(
		'title' => 'Bu bölüme erişim yetkiniz bulunmamaktadır!',
		'message' => 'Bu bölüme yalnızca site yöneticilerinin erişim yetkisi bulunmamaktadır!',
		));
});

//Route::when('admin/*', 'admin');

Route::filter('editor', function() {
	if (Auth::user()->role != '0' | Auth::user()->role != 'admin') return View::make('admin.error')->with(array(
		'title' => 'Bu bölüme erişim yetkiniz bulunmamaktadır!',
		'message' => 'Bu bölüme yalnızca site yöneticilerinin erişim yetkisi bulunmamaktadır!',
		));
});