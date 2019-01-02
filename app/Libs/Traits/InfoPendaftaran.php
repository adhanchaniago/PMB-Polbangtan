<?php

namespace App\Libs\Traits;

use App\Pendaftaran;
use App\Siswa;
use Workflow;

trait InfoPendaftaran
{
	protected $siswa;
	protected $result = '';

    protected function updateState($id, $state)
    {
        $pendaftaran = Pendaftaran::find($id);
        $workflow = Workflow::get($pendaftaran);

        if ($workflow->can($pendaftaran, $state)) {
            $workflow->apply($pendaftaran, $state);
            $pendaftaran->save();

            return $pendaftaran;
        }
        return;
    }

    protected function cekPersyaratan(String $jalur, array $request) : String
    {
        $user = auth()->user();
        $this->siswa = Siswa::findOrFail($user->person_id);
        $this->cekSyaratUmum();

    	switch ($jalur) {
    		case 'kerjasama-pemda':
    			# code...
    			break;
    		
    		case 'tugas-belajar':
    			# code...
    			break;
    		
    		case 'umum':
    			# code...
    			break;
    		
    		case 'undangan-petani':
    			# code...
    			break;
    		
    		case 'undangan-smk':
    			$this->cekJalurSmk($request);
    			break;    		
    	}

    	return $this->result;
	}

	protected function cekSyaratUmum() : Void
	{
		//Cek Tinggi Badan
		$jenis_kelamin = $this->siswa->jenis_kelamin;
		$tinggi_badan = $this->siswa->tinggi_badan;
		if ( $jenis_kelamin == 'Pria' && $tinggi_badan < 160 ) {
			$this->result .= "<p>Tinggi Badan Tidak Memenuhi Syarat</p>";
		}
		if ( $jenis_kelamin == 'Wanita' && $tinggi_badan < 155 ) {
			$this->result .= "<p>Tinggi Badan Tidak Memenuhi Syarat</p>";
		}
	}

	protected function cekJalurSmk(array $request) : Void
	{
		//Cek Nilai Rata-Rata Semester 1 - 5
		$rata_rata_ganjil_1 = $request['rata_rata_ganjil_1'];
		$rata_rata_genap_1 = $request['rata_rata_genap_1'];
		$rata_rata_ganjil_2 = $request['rata_rata_ganjil_2'];
		$rata_rata_genap_2 = $request['rata_rata_genap_2'];
		$rata_rata_ganjil_3 = $request['rata_rata_ganjil_3'];
		$rata_rata_genap_3 = $request['rata_rata_genap_3'];

		if ( $rata_rata_ganjil_1 <= 7.5 ) {
			$this->result = "<p>Nilai Rata - Rata Semeseter Ganjil Kelas 1 Tidak Memenuhi Syarat</p>";
		}
		if ( $rata_rata_genap_1 <= 7.5 ) {
			$this->result .= "<p>Nilai Rata - Rata Semeseter Genap Kelas 1 Tidak Memenuhi Syarat</p>";
		}
		if ( $rata_rata_ganjil_2 <= 7.5 ) {
			$this->result .= "<p>Nilai Rata - Rata Semeseter Ganjil Kelas 2 Tidak Memenuhi Syarat</p>";
		}
		if ( $rata_rata_genap_2 <= 7.5 ) {
			$this->result .= "<p>Nilai Rata - Rata Semeseter Genap Kelas 2 Tidak Memenuhi Syarat</p>";
		}
		if ( $rata_rata_ganjil_3 <= 7.5 ) {
			$this->result .= "<p>Nilai Rata - Rata Semeseter Ganjil Kelas 3 Tidak Memenuhi Syarat</p>";
		}
	}
}
