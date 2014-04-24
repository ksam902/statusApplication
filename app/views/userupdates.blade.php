@extends('layout.main')

@section('content')

	<div class="mainParagraph">
	@if(Auth::check())
		<p>Here you are, <strong>{{Auth::user()->username}}</strong>!</br></br> 
			From here you can manage all of your updates! Think about how much fun that can be!</p>
		</br>
		<center><h1>Feast Your Eyes on all of Your Updates!</h1></center>
		<center><p class="postLink"><strong><a href="{{ URL::route('new') }}" id="link">Post a new Update!
		</a></strong></p></center>
		<!--displaying users updates-->
		<div class="updateList">
			
		@foreach($userUpdates as $update)
			@foreach($allUsers as $user)
				<p id="usernameDisplay">
				@if($update->owner_id == $user->id)
					<strong>{{ $user->username}}</strong> says:
				@endif
				</p>
			@endforeach
			<p id="updateDisplay">
			{{ $update->newUpdate }}</br></br></br>
			(<a href="{{ URL::route('edit-update', $update->id)}}" id="link">edit</a>)
			(<a href="{{ URL::route('delete-update', $update->id)}}" id="link">delete</a>)
			<small><strong>Update posted: {{ $update->created_at }}</strong></small>
			</p><hr>
		@endforeach
		</div>
	@else
	<p>In order to see this site's contents, please sign in!</p>
	@endif
	<center><p><a href="#top" id="link">Beam me up Scotty</a></p></center>
	</div>



@stop