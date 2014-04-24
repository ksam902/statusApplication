@extends('layout.main')


@section('content')

	<center><h1>Let Your Voice Be Heard</h1></center>

	@foreach($errors->all() as $error)
		<p class="errorReport">{{ $error }}</p>
	@endforeach

	<form action="{{ URL::route('new-post')}}" method="post" id="updateForm">
	<div>
		<textarea maxlength="500" rows="10" cols="55" name="newUpdate" placeholder="Enter Update Here..." id="newUpdate" form="updateForm"></textarea>
	</div>
		<center><input type="submit" name="submitUpdate" value="Submit Update"></center>


	{{ Form::token() }}
	</form>

@stop