<?php

namespace App\Libs\Traits;

use App\Pendaftaran;
use App\Jurusan;
use App\Siswa;
use Carbon\Carbon;
use Workflow;

trait InfoPendaftaran
{
    protected $siswa;
    protected $keterangan = 'Tidak Memenuhi Syarat';

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
     * @param Siswa $siswa
     * @param String $jalur
     * @param String $key
     * @param String $value
     * @return String
     */
    protected function cekPersyaratan(Siswa $siswa, String $jalur, String $key, String $value): String
    {
        $this->siswa = $siswa;
        $result = '';

        switch ($jalur) {
            case 'tugas-belajar':
                $result = $this->cekJalurTugas($key, $value);
                break;

            case 'undangan-smk':
                $result = $this->cekJalurSmk($key, $value);
                break;

            case 'undangan-petani':
                $result = $this->cekJalurPetani($key, $value);
                break;

            case 'kerjasama-pemda':
                $result = $this->cekJalurKerjasama($key, $value);
                break;

            case 'umum':
                $result = $this->cekJalurUmum($key, $value);
                break;
        }

        return $result;
    }

    /**
     * @param String $key
     * @param String $value
     * @return String
     */
    protected function cekJalurTugas(String $key, String $value) : String
    {
        //cek tinggi badan
        if ($key == 'tinggi_badan') {
            if (!$this->cekTinggiBadan($value)) {
                return 'Tinggi Badan ' . $this->keterangan;
            }
        }

        //cek usia per 31 agustus maks 37 tahun 0 bulan
        if ($key == 'tanggal_lahir') {
            if (!$this->cekUmur($value, 444)) { //444 bulan = 37 tahun
                return 'Umur ' . $this->keterangan;
            }
        }

        return '';
    }

    /**
     * @param String $key
     * @param String $value
     * @return String
     */
    protected function cekJalurSmk(String $key, String $value) : String
    {
        //cek tinggi badan
        if ($key == 'tinggi_badan') {
            if (!$this->cekTinggiBadan($value)) {
                return 'Tinggi Badan ' . $this->keterangan;
            }
        }

        //Cek Tipe Sekolah Harus SMKPP

        //Cek Nilai Rata-Rata Semester 1 - 5
        /*$rata_rata_ganjil_1 = $request['rata_rata_ganjil_1'];
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
        }*/
        return '';
    }

    /**
     * @param String $key
     * @param String $value
     * @return String
     */
    protected function cekJalurPetani(String $key, String $value) : String
    {
        //cek tinggi badan
        if ($key == 'tinggi_badan') {
            if (!$this->cekTinggiBadan($value)) {
                return 'Tinggi Badan ' . $this->keterangan;
            }
        }

        //Cek tahun kelulusan paling lama 2 tahun
        if ($key == 'tahun_lulus') {
            if (!$this->cekTahunLulus($value)) {
                return 'Tahun Lulus ' . $this->keterangan;
            }
        }

        return '';
    }

    /**
     * @param String $key
     * @param String $value
     * @return String
     */
    protected function cekJalurKerjasama(String $key, String $value) : String
    {
        //cek tinggi badan
        if ($key == 'tinggi_badan') {
            if (!$this->cekTinggiBadan($value)) {
                return 'Tinggi Badan ' . $this->keterangan;
            }
        }

        //cek usia per 31 agustus maks 25 tahun 0 bulan
        if ($key == 'tanggal_lahir') {
            $tglahir = Carbon::createFromFormat("yyyy-MM-dd", $value);
        }

        return '';
    }

    /**
     * @param String $key
     * @param String $value
     * @return String
     */
    protected function cekJalurUmum(String $key, String $value) : String
    {
        //cek tinggi badan
        if ($key == 'tinggi_badan') {
            if (!$this->cekTinggiBadan($value)) {
                return 'Tinggi Badan ' . $this->keterangan;
            }
        }

        //cek tahun kelulusan paling lama 2 tahun
        if ($key == 'tahun_lulus') {
            if (!$this->cekTahunLulus($value)) {
                return 'Tahun Lulus ' . $this->keterangan;
            }
        }

        return '';
    }

    /**
     * @param int $tinggi_badan
     * @return bool
     */
    protected function cekTinggiBadan(int $tinggi_badan): bool
    {
        $jenis_kelamin = $this->siswa->jenis_kelamin;

        if ($jenis_kelamin == 'Pria' && $tinggi_badan < 160) {
            return false;
        }
        if ($jenis_kelamin == 'Wanita' && $tinggi_badan < 155) {
            return false;
        }
        return true;
    }

    /**
     * @param int $tahun_lulus
     * @return bool
     */
    protected function cekTahunLulus(int $tahun_lulus) : bool
    {
        $tahun = date('Y');
        if ($tahun - $tahun_lulus > 2) {
            return false;
        }
        return true;
    }

    protected function cekUmur(String $tanggal_lahir, int $batas) : bool
    {
        $lahir = Carbon::parse($tanggal_lahir);
        $syarat = Carbon::parse('2018-08-31');
        $selisih = $lahir->diffInMonths($syarat);
        if ($selisih > $batas) {
            return false;
        }

        return true;
    }

    /**
     * @param Siswa $siswa
     * @param array $data
     * @return String
     */
    protected function cekJurusan(Siswa $siswa, array $data): String
    {
        $jurusan_siswa = $siswa->jurusan;
        $jurusan_1 = Jurusan::selectName($data['jurusan_1']);
        $jurusan_2 = Jurusan::selectName($data['jurusan_2']);

        //22: IPS, 299: Lain-Lain, 31: SMK Mesin
        //Jurusan IPS hanya boleh memilih 3 jurusan
        if ($jurusan_siswa == 22 || $jurusan_siswa == 299 || $jurusan_siswa == 31) {
            if ($jurusan_1 == 'Penyuluhan Pertanian Berkelanjutan' ||
                $jurusan_1 == 'Penyuluhan Perkebunan Presisi' ||
                $jurusan_1 == 'Penyuluhan Peternakan dan Kesejahteraan Hewan') {
            } else {
                return 'Jurusan 1 ' . $this->keterangan;
            }

            if ($jurusan_2 == 'Penyuluhan Pertanian Berkelanjutan' ||
                $jurusan_2 == 'Penyuluhan Perkebunan Presisi' ||
                $jurusan_2 == 'Penyuluhan Peternakan dan Kesejahteraan Hewan') {
            } else {
                return 'Jurusan 2 ' . $this->keterangan;
            }
        }
        return '';
    }
}
