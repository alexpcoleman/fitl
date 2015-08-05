<!DOCTYPE html>
<html>
	<head>
		<title>ProgQuest - @yield('title')</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	</head>
	<body>
		
		@include('shared.header')

		<div class="container">
			@yield('content')
		</div>

		@include('shared.footer')

		<script src="{{ asset('js/jquery-2.1.4.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
	</body>
</html>