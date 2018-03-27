<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);

        $user = new User;
        $user->name = 'Alfonso';
        $user->email = 'alfonso@gmail.com';
        $user->password = bcrypt('01020304');
        $user->save();
        $user->assignRole($adminRole);

        $user = new User;
        $user->name = 'Ramon';
        $user->email = 'ramon@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->assignRole($adminRole);
    }
}
