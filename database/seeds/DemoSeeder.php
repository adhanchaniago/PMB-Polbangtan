<?php

use Illuminate\Database\Seeder;

use App\Pegawai;
use App\User;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pegawai = Pegawai::create([
    		'institusi_id' => 0,
    		'nama' => 'Admin Pusat'
    	]);
        $user = User::create([
        	'name' => $pegawai->nama,
        	'email' => 'adminpst@polbangtan.com',
        	'password' => bcrypt('123456'),
        	'status' => 1,
        	'person_id' => $pegawai->getKey(),
        	'person_type' => 'admin'
        ]);
        $user->assignRole(config('rolepermission.roles.admin_pusat.name'));

        for ( $i=1; $i<=7; $i++ ) {
	    	$pegawai = Pegawai::create([
	    		'institusi_id' => $i,
	    		'nama' => 'Operator'
	    	]);
	        $user = User::create([
	        	'name' => $pegawai->nama,
	        	'email' => "admin$i@polbangtan.com",
	        	'password' => bcrypt('123456'),
	        	'status' => 1,
	        	'person_id' => $pegawai->getKey(),
	        	'person_type' => 'operator'
	        ]);
	        $user->assignRole(config('rolepermission.roles.operator.name'));
        }
    }
}
