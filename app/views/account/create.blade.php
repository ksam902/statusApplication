@extends('layout.main')

@section('content')
	<div class="mainParagraph">
		<center><p><strong><span class="keyWord">HEY YOU!</span></strong></br></br> Wanna join? I don't blame you.</br></br>
		Please provide the appropriate information to create an account!</br></br>
		<strong>- Check your email to activate your account -</strong></p></center>
<!-- 		<p class="errorReport">
			@if($errors -> has('email'))
			{{$errors->first('email')}}
		@endif </br>
		@if($errors->has('username'))
			{{$errors->first('username')}}
			@endif </br>
		@if($errors->has('password'))
			{{$errors->first('password')}}
			@endif	</br>
		@if($errors->has('password_again'))
			{{$errors->first('password_again')}}
			@endif
		</p> -->
		<!-- more efficient loop of problems -->	
		@foreach($errors->all() as $error)
		<p class="errorReport">{{ $error }}</p>
	@endforeach



	</div>	
	<form action="{{URL::route('account-create-post')}}" method="post">
		<div class="field">
			<center><input type="text" name="email" placeholder="Email"{{(Input::old('email')) ? ' 
				value="' . e(Input::old('email')) . '"' : ''}}></center>
			
		</div>
		<div class="field">
			<center><input type="text" name="username" placeholder="Username"{{(Input::old('username')) ? ' 
				value="' . e(Input::old('username')) . '"' : ''}}></center>
			
		</div>
		<div class="field">
			<center><input type="password" name="password" placeholder="Password"></center>
			
		</div>
		<div class="field">
			<center><input type="password" name="password_again" placeholder="Confirm Password"></center>
			

		</div>
			<center><input type="submit" value="Create" ></center>
		
		{{ Form::token() }}
	</form>
@stop