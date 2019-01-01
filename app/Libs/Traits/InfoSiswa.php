<?php

namespace App\Libs\Traits;

use App\Siswa;
use App\Pendaftaran;
use App\User;

trait InfoSiswa
{
    protected function cekKelengkapanDokumen()
    {
        $user = auth()->user();
        $siswa = Siswa::findOrFail($user->person_id);

        if ( $siswa->alamat === null ) {
        	return false;
        }
        if ( $siswa->kelurahan === null ) {
        	return false;
        }
        if ( $siswa->kecamatan === null ) {
        	return false;
        }
        if ( $siswa->kota === null ) {
        	return false;
        }
        if ( $siswa->provinsi === null ) {
        	return false;
        }
        if ( $siswa->tempat_lahir === null ) {
        	return false;
        }
        if ( $siswa->tanggal_lahir === null ) {
        	return false;
        }
        if ( $siswa->jenis_kelamin === null ) {
        	return false;
        }
        if ( $siswa->foto === null ) {
        	return false;
        }
        if ( $siswa->ktp === null ) {
        	return false;
        }
        if ( $siswa->nisn === null ) {
        	return false;
        }
        if ( $siswa->tipe_sekolah === null ) {
        	return false;
        }
        if ( $siswa->nama_sekolah === null ) {
        	return false;
        }
        if ( $siswa->alamat_sekolah === null ) {
        	return false;
        }
        if ( $siswa->jurusan === null ) {
        	return false;
        }
        if ( $siswa->no_ijazah === null ) {
        	return false;
        }
        if ( $siswa->tahun_lulus === null ) {
        	return false;
        }
        if ( $siswa->ijazah === null ) {
        	return false;
        }
        if ( $siswa->tinggi_badan === null ) {
        	return false;
        }
        if ( $siswa->sk_sehat === null ) {
        	return false;
        }
        if ( $siswa->sk_tidak_hamil === null ) {
        	return false;
        }

        return true;
    }

    protected function getPendaftaranState()
	{
        $user = auth()->user();
		$pendaftaran = Pendaftaran::where('siswa_id', $user->person_id)
								  ->where('state', '<>', 'cancel')
								  ->first();
		if ($pendaftaran === null) {
			return "";
		} else {
			if ( $pendaftaran->state == 'start' ) {
		    	$jalur = str_replace("-", " ", $pendaftaran->jalur);
				return "Mendaftar Melalui Jalur " . ucwords($jalur);
			} else {				
				return $pendaftaran->state;
			}
		}
	}

	protected function getPendaftaran()
	{
	    $user = auth()->user();
		$pendaftaran = Pendaftaran::where('siswa_id', $user->person_id)
								  ->where('state', '<>', 'cancel')
								  ->first();
		
		return $pendaftaran;
	}
}
