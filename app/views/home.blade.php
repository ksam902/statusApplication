@extends('layout.main')

@section('content')


<div class="mainParagraph" >
		<p><small><?php 
		 	echo 'Today is: '.date('M d Y');
		 	?></small>
		</p>
	@if(Auth::check())
		<p><span class="keyWord">Welcome</span> <strong>{{Auth::user()->username}}</strong>,</br></br> 
			Have a look at what everyone has to say. If you want your voice to be heard, just click the link below
			to post a new update!</br></br>
			If you would like to <strong>EDIT</strong> or <strong>DELETE</strong> any of your updates <strong><a href="{{URL::route('user-updates')}}" id="link">click here</a></strong>.
		</p>
		</br>
		<center><h1>Everyone's Thoughts!</h1></center>
		<center><p class="postLink"><strong><a href="{{ URL::route('new') }}" id="link">Post a new Update!
		</a></strong></p></center>

		<!--displaying users updates-->
		<div class="updateList">
	@foreach($allUpdates as $update)
		@foreach($allUsers as $user)
		<p id="usernameDisplay">
			@if($update->owner_id == $user->id)
				<strong>{{ $user->username}}</strong> says:
			@endif
		</p>
		@endforeach
			<p id="updateDisplay"> {{ $update->newUpdate }}</br></br></br>
		<!-- 	<small>(<a href="#" id="link">edit</a>)</small>
			<small>(<a href="{{ URL::route('delete-update', $update->id)}}" id="link">delete</a>)</small> -->
			<small>Update posted: {{ $update->created_at }}</small>
			</p><hr>
	@endforeach
		</div>
	@else
			<p>In order to see this site's contents, please sign in!</p>
	@endif
	<center><p><a href="#top" id="link">Beam me up Scotty</a></p></center>
</div>
@stop