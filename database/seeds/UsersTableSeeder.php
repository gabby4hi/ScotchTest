<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user =  App\User::create([
        	'name'=>'Gabriel',
        	'email'=>'gabrieljames85@gmail.com',
        	'password'=>bcrypt('password'),
        	'admin'=> 1
        ]);

        App\Profile::create([
        	'user_id' => $user->id,
        	'avatar'=>'upload/avatars/gabby.jpg',
        	'about'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam ut dolores omnis sint et vel, maiores architecto sapiente, fugiat rem dolore voluptatem dolorum quisquam assumenda amet aut ipsum unde reiciendis.',
        	'facebook'=>'facebook.com',
        	'youtube'=>'youtube.com'
        ]);
    }
}
