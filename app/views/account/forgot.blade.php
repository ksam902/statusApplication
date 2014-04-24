@extends('layout.main')

@section('content')
<div class="mainParagraph">
		<center><p>It is unfortunate that you have forgotten your password. <strong>Luckily, we can give you a new one!</strong> </p></center>
<!-- 		<p class="errorReport"> @if($errors->has('email'))
			{{$errors->first('email')}}
		@endif
		</p> -->
		@foreach($errors->all() as $error)
		<p class="errorReport">{{ $error }}</p>
	@endforeach
</div>	
<form action="{{URL::route('account-forgot-password-post')}}" method ="post">
	<div class="field">
		<center><input type="text" name="email" placeholder="Email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}></center>
		
	</div>
		<center><input type="submit" value="Recover"></center>

	{{Form:: token()}}
</form>

@stop