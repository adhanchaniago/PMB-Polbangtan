<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Administrator',
        	'email' => 'appadmin@ashalta.com',
        	'password' => bcrypt('ashalta1234'),
        	'status' => 1
        ]);
        $user->assignRole(config('rolepermission.roles.administrator.name'));

        $user = User::create([
        	'name' => 'Admin Aplikasi',
        	'email' => 'admin@polbangtan.com',
        	'password' => bcrypt('admin'),
        	'status' => 1
        ]);
        $user->assignRole(config('rolepermission.roles.appadmin.name'));
    }
}
