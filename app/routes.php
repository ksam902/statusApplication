<?php

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
	)
) ->before('auth'); //making sure the user is signed in to see his or her status
Route::get('/user/{username}', array(
	'as' =>'profile-user',
	'uses'=>'ProfileController@user'
	));
/* New Update */

Route::get('/new', array(
	'as' => 'new', 
	'uses'=> 'HomeController@getNew'
	));
Route::post('/new', array(
	'as'=>'new-post',
	'uses'=> 'HomeController@postNew'
	));
/*Delete Update*/

Route::get('/deleteUpdate/{update}', array(
	'as'=> 'delete-update', 
	'uses' => 'HomeController@getDeleteUpdate'
	));
/*binding to the UserUpdates so it will delete correct entry*/
Route::bind('update', function($value, $route){

	return UserUpdates::where('id', $value)->first();

});
/*Your Updates*/
Route::get('/userUpdates', array(
	'as' => 'user-updates',
	'uses' => 'HomeController@getUserUpdates'
	));
/*Display Edit Update View*/
Route::get('/editUpdate/{update}', array(
	'as' => 'edit-update',
	'uses' => 'HomeController@getEdit'
	));
/*Update Edit Entry - PUT*/
Route::post('/postEdit/{update}', array(
	'as' => 'edit-update-post',
	'uses' => 'HomeController@postEdit' 
	));
/*Authenticated group*/
Route::group(array('before'=>'auth'), function(){

	//CSRF protection group
	Route::group(array('before'=>'csrf'), function(){

	//Change Password (POST)
		Route::post('account/change-password', array(
		'as'=>'account-change-password-post',
		'uses'=>'AccountController@postChangePassword'
		));

	});

	//Change password (GET)
	Route::get('account/change-password', array(
		'as'=>'account-change-password',
		'uses'=>'AccountController@getChangePassword'));

//Sign in (GET)
	Route::get('/account/sign-out', array(
		'as'=>'account-sign-out',
		'uses'=>'AccountController@getSignOut'
		));
});



/*Unauthenticated group*/
Route::group(array('before' => 'guest'), function(){
	/*CSRF protection Group*/
	Route::group(array('before' => 'csrf'), function(){
/*Create Account (POST)*/
	Route::post('/account/create', array(
		'as' => 'account-create-post',
		'uses' => 'AccountController@postCreate'
		));
	});
	/*Sign in (POST)*/
	Route::post('/account/signin', array(
		'as' => 'account-sign-in-post',	
		'uses'=>'AccountController@postSignIn'
		));
	//Forgot Password (POST)
	Route::post('/account/forgot', array(
		'as'=>'account-forgot-password-post',
		'uses'=>'AccountController@postForgotPassword'
		));
	//Forgot Password (GET)
	Route::get('/account/forgot', array(
		'as'=>'account-forgot-password',
		'uses'=>'AccountController@getForgotPassword'
		));

	Route::get('/account/recover/{code}', array(
		'as'=> 'account-recover',
		'uses'=> 'AccountController@getRecover'
		));	/*Sign in (GET)*/
	Route::get('/account/signin', array(
		'as' => 'account-sign-in',
		'uses'=>'AccountController@getSignIn'
		));

	/*Create Account (GET)*/
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
		));
	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
		));
});