<?php

namespace App\Libs\Traits;

use App\Pendaftaran;
use App\Siswa;
use Carbon\Carbon;
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

    /**
     * @param String $jalur
     * @param array $request
     * @return String
     */
    protected function cekPersyaratan(String $jalur, array $request): String
    {
        $user = auth()->user();
        $this->siswa = Siswa::findOrFail($user->person_id);
        $this->cekSyaratUmum();

        switch ($jalur) {
            case 'kerjasama-pemda':
                $this->cekJalurKerjasama($request);
                break;

            case 'tugas-belajar':
                # code...
                break;

            case 'umum':
                $this->cekJalurUmum($request);
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

    protected function cekSyaratUmum()
    {
        //Cek Tinggi Badan
        $jenis_kelamin = $this->siswa->jenis_kelamin;
        $tinggi_badan = $this->siswa->tinggi_badan;
        if ($jenis_kelamin == 'Pria' && $tinggi_badan < 160) {
            $this->result .= "<p>Tinggi Badan Tidak Memenuhi Syarat</p>";
        }
        if ($jenis_kelamin == 'Wanita' && $tinggi_badan < 155) {
            $this->result .= "<p>Tinggi Badan Tidak Memenuhi Syarat</p>";
        }
    }

    protected function cekJalurKerjasama(array $request)
    {

    }

    protected function cekJalurUmum(array $request)
    {
        $tahun = date('Y');
        if ($tahun - $request['tahun_lulus'] > 2) {
            $this->result = "<p>Tahun Lulus Tidak Memenuhi Syarat</p>";
        }
    }

    protected function cekJalurSmk(array $request)
    {
        //Cek Nilai Rata-Rata Semester 1 - 5
        $rata_rata_ganjil_1 = $request['rata_rata_ganjil_1'];
        $rata_rata_genap_1 = $request['rata_rata_genap_1'];
        $rata_rata_ganjil_2 = $request['rata_rata_ganjil_2'];
        $rata_rata_genap_2 = $request['rata_rata_genap_2'];
        $rata_rata_ganjil_3 = $request['rata_rata_ganjil_3'];
        $rata_rata_genap_3 = $request['rata_rata_genap_3'];

        if ($rata_rata_ganjil_1 <= 7.5) {
            $this->result = "<p>Nilai Rata - Rata Semeseter Ganjil Kelas 1 Tidak Memenuhi Syarat</p>";
        }
        if ($rata_rata_genap_1 <= 7.5) {
            $this->result .= "<p>Nilai Rata - Rata Semeseter Genap Kelas 1 Tidak Memenuhi Syarat</p>";
        }
        if ($rata_rata_ganjil_2 <= 7.5) {
            $this->result .= "<p>Nilai Rata - Rata Semeseter Ganjil Kelas 2 Tidak Memenuhi Syarat</p>";
        }
        if ($rata_rata_genap_2 <= 7.5) {
            $this->result .= "<p>Nilai Rata - Rata Semeseter Genap Kelas 2 Tidak Memenuhi Syarat</p>";
        }
        if ($rata_rata_ganjil_3 <= 7.5) {
            $this->result .= "<p>Nilai Rata - Rata Semeseter Ganjil Kelas 3 Tidak Memenuhi Syarat</p>";
        }
    }

    protected function validasiResumePendaftaran(String $jalur, String $key, String $value): Boolean
    {
        $result = true;
        switch ($jalur) {
            case 'kerjasama-pemda':
                $this->validasiJalurKerjasama($key, $value);
                break;

            case 'tugas-belajar':
                $this->validasiJalurTugasBelajar($key, $value);
                break;

            case 'umum':
                $this->validasiJalurUmum($key, $value);
                break;

            case 'undangan-petani':
                $this->validasiJalurUndanganPetani($key, $value);
                break;

            case 'undangan-smk':
                $this->validasiJalurUndanganSmk($key, $value);
                break;
        }

        return $result;
    }

    protected function validasiJalurKerjasama(String $key, String $value)
    {
        //cek nilai ijazah min 7
        //cek usia per 31 agustus 2018 paling tinggi 25 tahun 0 bulan
        if ($key == 'tanggal_lahir') {
            $tglahir = Carbon::createFromFormat("yyyy-MM-dd", $value);
        }

        return true;
    }

    /**
     * @param String $jenis_kelamin
     * @param int $tinggi_badan
     * @return bool
     */
    protected function cekTinggiBadan(String $jenis_kelamin, int $tinggi_badan): Boolean
    {
        if ($jenis_kelamin == 'Pria' && $tinggi_badan < 160) {
            return false;
        }
        if ($jenis_kelamin == 'Wanita' && $tinggi_badan < 155) {
            return false;
        }
        return true;
    }

    /**
     * @param Pendaftaran $pendaftaran
     * @param int $tipe_sekolah
     * @param int $jurusan
     * @return bool
     */
    protected function cekJurusan(Pendaftaran $pendaftaran, int $tipe_sekolah, int $jurusan): Boolean
    {
        //tipe_sekolah == 2 adalah SMA/SMK
        //jurusan != 1 adalah IPS dan Lain-Lain
        if ($tipe_sekolah == 2 && $jurusan != 1) {
            //Untuk jurusan selain IPA hanya boleh 3 Jurusan
            if ($pendaftaran->jurusan_1 == 'Penyuluhan Pertanian Berkelanjutan' ||
                $pendaftaran->jurusan_1 == 'Penyuluhan Perkebunan Presisi' ||
                $pendaftaran->jurusan_1 == 'Penyuluhan Peternakan dan Kesejahteraan Hewan') {

            }
        }
    }
}
