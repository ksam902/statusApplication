<?php


class UserUpdateTableSeeder extends Seeder{


	public function run(){

		//Drop status table so no dupilicate entries
		DB::table('userUpdate')->delete();


		$userUpdate = array(
			array(
				'newUpdate' => 'This is a string that will be a users updated status',
				'owner_id' => '1',
				'isDelete' => 0
				),
			array(
			'newUpdate' => 'blah',
				'owner_id' => '2',
				'isDelete' => 1
			),
			array(
				'newUpdate' => 'another status belonging to owner 1',
				'owner_id' => '1',
				'isDelete' => 0
				),
			);
		DB::table('userUpdate')->insert($userUpdate);


	}//ened run function

}//end StatusTableSeeder class