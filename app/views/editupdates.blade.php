@extends('layout.main')


@section('content')

	<center><h1>Go Ahead {{ $username }}, Edit Away!</h1></center>


	<!--trying a new, more slick way of creating a field-->

	<form action="{{ URL::route('edit-update-post', $update->id)}}" method="post" id="editForm">
	<div>
		<textarea maxlength="500" rows="10" cols="55" name="newEdit" id="newEdit" form="editForm">{{ $update->newUpdate }}</textarea>
	</div>
		<center><input type="submit" name="submitEdit" value="Confirm Edit"></center>

		<!-- <input type="hidden" name="id" value="{{ $update->id }}"> -->
	{{ Form::token() }}
	</form>

@stop