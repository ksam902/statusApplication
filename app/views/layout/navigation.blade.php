<link rel='stylesheet' href='{{ URL::asset('css/stylesheet.css') }}' />


<div id="nav">
	<div id="nav-wrapper" >
		<ul >
			<li><a href="{{URL::route('home')}}">-Home-</a></li>

<!-- checking to see if the user is signed in -->
		@if(Auth::check())
			<li><a href="{{URL::route('user-updates')}}">-Your Updates-</a></li>
			<li><a href="{{URL::route('account-change-password')}}">-Change password-</a></li>
			<li><a href="{{URL::route('account-sign-out')}}">-Sign out-</a></li>
		@else
			<li><a href="{{ URL::route('account-sign-in')}}">-Sign in-</a></li>
			<li><a href="{{URL::route('account-create')}}">-Create Account-</a></li>
			<li><a href="{{URL::route('account-forgot-password')}}">-Forgot Password-</a></li>
		@endif
		</ul>
	</div>
</div>