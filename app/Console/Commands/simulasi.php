<?php

namespace App\Console\Commands;

use App\Pendaftaran;
use App\TesTulis;
use App\Wawancara;
use Illuminate\Console\Command;

class simulasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pendaftaran:simulasi {tipe}';

    protected $totalNilai;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulasi Pendaftaran';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        switch ($this->argument('tipe')) {
            case 'reset':
                $this->simulasiReset();
                break;

            case 'verifikasi':
                $this->simulasiVerifikasi();
                break;

            case 'tulis':
                $this->simulasiTulis();
                break;

            case 'wawancara':
                $this->simulasiWawancara();
                break;

            case 'kesehatan':
                $this->simulasiKesehatan();
                break;
        }
    }

    private function simulasiReset()
    {
        Pendaftaran::where('state', '!=', '')->update(['state' => 'verifikasi_dokumen']);
        TesTulis::truncate();
        Wawancara::truncate();
    }

    private function simulasiVerifikasi()
    {
        $pendaftaran = Pendaftaran::all();
        $jml_lulus = $pendaftaran->count()-50;

        $i=0;
        foreach ($pendaftaran as $key => $value) {
            if ($i <= $jml_lulus) {
                Pendaftaran::updatePendaftaran($value->id, ['state' => 'tes_tulis']);
            } else {
                Pendaftaran::updatePendaftaran($value->id, ['state' => 'gugur_tulis']);
            }
            $i++;
        }
    }

    private function simulasiTulis()
    {
        $pendaftaran = Pendaftaran::all();
        $jml_lulus = $pendaftaran->count()-50;

        $i=0;
        foreach ($pendaftaran as $key => $value) {
            if ($i <= $jml_lulus) {
                $state = 'tes_tulis';
                $matematika = rand(70, 90);
                $teknis_pertanian = rand(70, 90);
                $hasil = 'y';
            } else {
                $state = 'gugur_tulis';
                $matematika = rand(30, 50);
                $teknis_pertanian = rand(30, 50);
                $hasil = 't';
            }

            Pendaftaran::updatePendaftaran($value->id, ['state' => $state]);

            TesTulis::create([
                'no_pendaftaran' => $value->no_pendaftaran,
                'institusi_id' => $value->institusi,
                'matematika' => $matematika,
                'teknis_pertanian' => $teknis_pertanian,
                'hasil' => $hasil,
                'uploaded_by' => 3
            ]);
            $i++;
        }
    }

    private function simulasiWawancara()
    {
        $pendaftaran = Pendaftaran::where('state', 'tes_tulis')->get();
        $jml_lulus = $pendaftaran->count()-50;

        TesTulis::truncate();
        $i=0;
        foreach ($pendaftaran as $key => $value) {
            $this->totalNilai = 0;
            if ($i <= $jml_lulus) {
                $state = 'tes_wawancara';
                $kriteria = ['b', 'c'];
                $hasil = 'y';
            } else {
                $state = 'gugur_wawancara';
                $kriteria = ['k', 'c'];
                $hasil = 't';
            }

            $fisik = array_rand($kriteria);
            $sopan = array_rand($kriteria);
            $prestasi = array_rand($kriteria);
            $finansial = array_rand($kriteria);
            $pendapat = array_rand($kriteria);
            $tangkap = array_rand($kriteria);
            $pd = array_rand($kriteria);
            $motivasi = array_rand($kriteria);
            $prestasi = array_rand($kriteria);
            $emosi = array_rand($kriteria);

            Pendaftaran::updatePendaftaran($value->id, ['state' => $state]);

            Wawancara::create([
                'no_pendaftaran' => $value->no_pendaftaran,

                'penampilan_fisik' => $kriteria[$fisik],
                'sopan_santun' => $kriteria[$sopan],
                'prestasi_akademik' => $kriteria[$prestasi],
                'kemampuan_finansial' => $kriteria[$finansial],
                'kemampuan_menyampaikan_pendapat' => $kriteria[$pendapat],
                'daya_tangkap' => $kriteria[$tangkap],
                'kepercayaan_diri' => $kriteria[$pd],
                'motivasi' => $kriteria[$motivasi],
                'dorongan_prestasi' => $kriteria[$prestasi],
                'stabilitas_emosi' => $kriteria[$emosi],

                'nilai_penampilan_fisik' => $this->getNilai($kriteria[$fisik]),
                'nilai_sopan_santun' => $this->getNilai($kriteria[$sopan]),
                'nilai_prestasi_akademik' => $this->getNilai($kriteria[$prestasi]),
                'nilai_kemampuan_finansial' => $this->getNilai($kriteria[$finansial]),
                'nilai_kemampuan_menyampaikan_pendapat' => $this->getNilai($kriteria[$pendapat]),
                'nilai_daya_tangkap' => $this->getNilai($kriteria[$tangkap]),
                'nilai_kepercayaan_diri' => $this->getNilai($kriteria[$pd]),
                'nilai_motivasi' => $this->getNilai($kriteria[$motivasi]),
                'nilai_dorongan_prestasi' => $this->getNilai($kriteria[$prestasi]),
                'nilai_stabilitas_emosi' => $this->getNilai($kriteria[$emosi]),
                'total' => $this->totalNilai / 10,

                'keterangan' => '-',
                'hasil' => $hasil,
                'uploaded_by' => 3
            ]);

            $i++;
        }
    }

    private function simulasiKesehatan()
    {

    }

    private function getNilai(String $s): int
    {
        switch ($s) {
            case 'b':
                $this->totalNilai += 100;
                return 100;

            case 'c':
                $this->totalNilai += 50;
                return 50;

            case 'k':
                $this->totalNilai += 20;
                return 20;
        }
    }
}
