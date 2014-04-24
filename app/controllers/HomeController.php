<?php

class HomeController extends BaseController {

	
	public function home()
	{

		// Mail::send('emails.auth.test', array('name' => 'Kyle'), function($message){
		// 	$message->to('kylesamson21@gmail.com', 'Kyle Samson')->subject('test email');
		// });

		$userUpdates = Auth::user()->userUpdates;
		$allUpdates = UserUpdates::all();
		$allUsers = AllUsers::all();

		return View::make('home', array(
				'userUpdates' => $userUpdates,
				'allUpdates' => $allUpdates,
				'allUsers' => $allUsers
			));
	}

	public function getNew(){

		return View::make('layout.new');
	}

	public function postNew(){

		$rules = array('newUpdate' => 'required|min:1|max:500');
		$validator = Validator::make(Input::all(), $rules);
	
		if($validator->fails()){

			return Redirect::route('new')->withErrors($validator);
		}

		//updating the database
		$update = new UserUpdates;
		$update->owner_id = Auth::user()->id;
		$update->newUpdate = Input::get('newUpdate');
		$update->save();

		return Redirect::route('home');

	}
	public function getDeleteUpdate(UserUpdates $update){
		// $update = UserUpdates::find($update);
		// echo $update;

		// if(!$update){
		// 	echo "this isnt the right update to delete";
		// }
		$update->delete();
		return Redirect::route('user-updates')
		->with('global', 'Update deleted successfully');
	}
	public function getUserUpdates(){
		$allUsers = AllUsers::all();
		$userUpdates = Auth::user()->userUpdates;
		return View::make('userupdates', array(
				'userUpdates' => $userUpdates,
				'allUsers' => $allUsers
			));
	}
	public function getEdit(UserUpdates $update){

		$username = Auth::user()->username;
	
		return View::make('editupdates', array(
				'username' => $username,
				'update' => $update
			));
		
	}
	public function postEdit(UserUpdates $update){


		//updating the database
		
		$update->newUpdate = Input::get('newEdit');
		$update->save();
		// UserUpdates::update($id, array(
		// 	'newUpdate' => Input::get('newEdit')
		// 	));

		return Redirect::route('user-updates', array(
			'update' => $update
			))
		->with('global', 'Update edited successfully');

	}
}