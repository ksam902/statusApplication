<!DOCTYPE html>
<html>
	<head>
		<title>Norex Assignment</title>
		<link rel='stylesheet' href='{{ URL::asset('css/stylesheet.css') }}' />
	</head>
	<body id="top">

		@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
		@endif
		@include('layout.navigation')

		<div class="container">
			@yield('content')
			
		</div>
		
	</body>

</html>