<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} - {{ $siteTitle }}</title>
	<link href="{{ $bStrapCss }}" rel="stylesheet">
	<link href="{{ $styleCss }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>
