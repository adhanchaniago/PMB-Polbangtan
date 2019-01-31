<?php

use App\Content;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
        	'key' => 'judul',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'sub-judul',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'deskripsi',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'countdown',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'alamat',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'no-telepon',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'informasi-pendaftaran',
        	'value' => ''
        ]);
        Content::create([
        	'key' => 'brosur-pmb',
        	'value' => ''
        ]);
    }
}
