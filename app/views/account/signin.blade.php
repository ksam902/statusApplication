@extends('layout.main')


@section('content')
	<div class="mainParagraph">
		<center><p><strong>Welcome!</strong></br></br>
		Enter your <strong>Email</strong> and <strong>Password</strong> 
		and it will be smooth sailing from here!</p></center>
	<!-- 	<p class="errorReport"> @if($errors -> has('email'))
			{{$errors->first('email')}}
		@endif	</br>
		@if($errors->has('password'))
			{{$errors->first('password')}}
			@endif
		</p> -->

	@foreach($errors->all() as $error)
		<p class="errorReport">{{ $error }}</p>
	@endforeach
	</div>	


	<form action="{{ URL::route('account-sign-in-post') }}" method="post">

	<div class="field">
		
		<center><input type="text" name="email" placeholder="Email"{{ (Input::old('email')) ? ' value="' . Input::old('email'). '"' : '' }}></center>
		
	</div>
	<div class="field">
		<center><input type="password" name="password" placeholder="Password"></center>
	</div>
	<div class="field">
	<!-- 	
		<input type="checkbox" name="remember" id="remember">
		<label for="remember">Remember</label> -->
		<!-- <center>Remember Me</center> -->
	</div>
	
		
		<center><input type="submit" value="Sign in"></center>
		
		{{ Form::token() }}
	</form>
@stop