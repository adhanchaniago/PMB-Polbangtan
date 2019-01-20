<?php

use App\Institusi;
use App\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
	private $institusi = ['Polbangtan Medan', 'Polbangtan Bogor', 'Polbangtan Yogyakarta',
						  'Polbangtan Magelang', 'Polbangtan Malang', 'Polbangtan Gowa',
						  'Polbangtan Manokwari'];

	private $jurusan = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$jurusan['Polbangtan Medan'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Penyuluhan Perkebunan Presisi',
			'Teknologi Produksi Tanaman Perkebunan'
		];
		$jurusan['Polbangtan Bogor'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Penyuluhan Peternakan dan Kesejahteraan Hewan',
			'Agribisnis Hortikultura',
			'Teknologi Mekanisme Pertanian',
			'Kesehatan Hewan'
		];
		$jurusan['Polbangtan Yogyakarta'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Teknologi Benih',
			'Agribisnis Hortikultura',
			'Penyuluhan Peternakan dan Kesejahteraan Hewan',
			'Teknologi Pakan Ternak',
			'Teknologi Produksi Ternak'
		];
		$jurusan['Polbangtan Magelang'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Teknologi Benih',
			'Agribisnis Hortikultura',
			'Penyuluhan Peternakan dan Kesejahteraan Hewan',
			'Teknologi Pakan Ternak',
			'Teknologi Produksi Ternak'
		];
		$jurusan['Polbangtan Malang'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Penyuluhan Peternakan dan Kesejahteraan Hewan',
			'Agribisnis Peternakan'
		];
		$jurusan['Polbangtan Gowa'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Penyuluhan Peternakan dan Kesejahteraan Hewan',
			'Budidaya Tanaman Hortikultura',
			'Budidaya Ternak'
		];
		$jurusan['Polbangtan Manokwari'] = [
			'Penyuluhan Pertanian Berkelanjutan',
			'Penyuluhan Peternakan dan Kesejahteraan Hewan',
			'Teknologi Produksi Tanaman Perkebunan'
		];

		Institusi::create([
			'nama' => 'Pusat'
		]);
		
    	foreach ($this->institusi as $value) {
	    	$institusi = Institusi::create([
	    		'nama' => $value
	    	]);

	    	foreach ($jurusan[$value] as $value) {
		        Jurusan::create([
		        	'institusi_id' => $institusi->getKey(),
		        	'nama' => $value
		        ]);
	    	}
    	}
    }
}
