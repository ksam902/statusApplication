@extends('layout.main')

@section('content')
	<div class="mainParagraph">
		<center><p>You would like to change your password?</br></br> 
			<strong>Change away!</strong> 
		</p></center>
	@foreach($errors->all() as $error)
		<p class="errorReport">{{ $error }}</p>
	@endforeach

	</div>
	<form action="{{URL::route('account-change-password-post')}}" method="post">

		<div class="field">
			<center><input type="password" name="old_password" placeholder="Old Password"></center>
<!-- 			@if($errors->has('old_password'))
			{{$errors->first('old_password')}}
			@endif -->
		</div>
		<div class="field">
			<center><input type="password" name="password" placeholder="New Password"></center>
	<!-- 		@if($errors->has('password'))
			{{$errors->first('password')}}
			@endif -->
		</div>
		<div class="field">
			<center><input type="password" name="password_again" placeholder="Confirm Password"></center>
	<!-- 		@if($errors->has('password_again'))
			{{$errors->first('password_again')}}
			@endif -->
		</div>
		<center><input type="submit" value="Change"></center>

		{{Form::token()}}
	</form>
@stop