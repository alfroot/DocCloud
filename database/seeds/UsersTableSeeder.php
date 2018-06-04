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

        $SuperAdminRole = Role::create(['name' => 'SuperAdmin']);
        $AdminRole = Role::create(['name' => 'Admin']);
        $UserRole = Role::create(['name' => 'User']);

        $user = new User;
        $user->name = 'Alfonso';
        $user->lastname = 'Pozo';
        $user->email = 'alfonso@gmail.com';
        $user->password = bcrypt('01020304');
        $user->profilephoto = 'profiles/41.jpg';
        $user->save();
        $user->assignRole($SuperAdminRole);


        factory(User::class,4)->create()->each->assignRole($AdminRole);
        factory(User::class,185)->create()->each->assignRole($UserRole);
    }
}
