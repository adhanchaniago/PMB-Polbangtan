<?php

use App\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::create([
        	'nama' => 'Pendaftaran',
        	'tanggal_awal' => '2019-04-25',
        	'tanggal_akhir' => '2019-05-25'
        ]);

        Jadwal::create([
        	'nama' => 'Pengumuman Hasil Seleksi Administrasi Jalur Undangan & Tugas Belajar',
        	'tanggal_awal' => '2019-05-28',
        	'tanggal_akhir' => '2019-05-28'
        ]);

        Jadwal::create([
        	'nama' => 'Pengumuman Hasil Seleksi Administrasi Jalur Umum & Kerjasama',
        	'tanggal_awal' => '2019-06-01',
        	'tanggal_akhir' => '2019-06-01'
        ]);

        Jadwal::create([
        	'nama' => 'Pelaksanaan Tes Tertulis dan Wawancara Jalur Umum & Jalur Kerjasama',
        	'tanggal_awal' => '2019-07-03',
        	'tanggal_akhir' => '2019-07-05'
        ]);

        Jadwal::create([
        	'nama' => 'Pengumuman Hasil Tes Tertulis dan Wawancara Jalur Umum & Jalur Kerjasama',
        	'tanggal_awal' => '2019-07-09',
        	'tanggal_akhir' => '2019-07-09'
        ]);

        Jadwal::create([
        	'nama' => 'Tes Kesehatan Untuk Semua Jalur',
        	'tanggal_awal' => '2019-07-17',
        	'tanggal_akhir' => '2019-07-19'
        ]);

        Jadwal::create([
        	'nama' => 'Pengumuman Calon Mahasiswa Diterima Untuk Semua Jalur',
        	'tanggal_awal' => '2019-07-24',
        	'tanggal_akhir' => '2019-07-24'
        ]);
    }
}
