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
        $this->call(CmsSeeder::class);
        $this->call(JadwalSeeder::class);

        $this->call(DemoSeeder::class);
    }
}
