<?php

use App\Libs\Traits\RefreshRolePermission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use RefreshRolePermission;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->refreshRolePermission();

        $this->call(UsersSeeder::class);
        $this->call(JurusanSeeder::class);
    }
}
