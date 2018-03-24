<?php

use App\User;
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
        User::truncate();


        $user = new User;
        $user->name = 'Alfonso';
        $user->email = 'alfonso@gmail.com';
        $user->password = bcrypt('01020304');
        $user->save();
    }
}
