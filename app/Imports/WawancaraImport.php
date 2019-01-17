<?php

namespace App\Imports;

use App\Libs\Traits\InfoPendaftaran;
use App\Wawancara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WawancaraImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable, InfoPendaftaran;

    protected $userId, $totalNilai;

    public function __construct(int $user_id)
    {
        $this->userId = $user_id;
    }

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        $this->totalNilai = 0;

        //insert wawancara
        $wawancara = Wawancara::create([
            'no_pendaftaran' => $row['no_pendaftaran'],

            'penampilan_fisik' => $row['penampilanfisik'],
            'sopan_santun' => $row['sopansantun'],
            'prestasi_akademik' => $row['prestasiakademik'],
            'kemampuan_finansial' => $row['kemampuanfinansial'],
            'kemampuan_menyampaikan_pendapat' => $row['kemampuanmenyampaikan_pendapat'],
            'daya_tangkap' => $row['dayatangkap'],
            'kepercayaan_diri' => $row['kepercayaandiri'],
            'motivasi' => $row['motivasi'],
            'dorongan_prestasi' => $row['doronganprestasi'],
            'stabilitas_emosi' => $row['stabilitasemosi'],

            'nilai_penampilan_fisik' => $this->getNilai($row['penampilanfisik']),
            'nilai_sopan_santun' => $this->getNilai($row['sopansantun']),
            'nilai_prestasi_akademik' => $this->getNilai($row['prestasiakademik']),
            'nilai_kemampuan_finansial' => $this->getNilai($row['kemampuanfinansial']),
            'nilai_kemampuan_menyampaikan_pendapat' => $this->getNilai($row['kemampuanmenyampaikan_pendapat']),
            'nilai_daya_tangkap' => $this->getNilai($row['dayatangkap']),
            'nilai_kepercayaan_diri' => $this->getNilai($row['kepercayaandiri']),
            'nilai_motivasi' => $this->getNilai($row['motivasi']),
            'nilai_dorongan_prestasi' => $this->getNilai($row['doronganprestasi']),
            'nilai_stabilitas_emosi' => $this->getNilai($row['stabilitasemosi']),
            'total' => $this->totalNilai / 10,

            'keterangan' => $row['keterangan'],
            'hasil' => strtolower($row['lulus_yt']),
            'uploaded_by' => $this->userId
        ]);

        //update state pendaftaran
        $pendaftaran = $wawancara ->pendaftaran;
        if ($row['lulus_yt'] == 'y') {
            $this->updateState($pendaftaran->id, 'memverifikasi_wawancara');
        } else {
            $this->updateState($pendaftaran->id, 'mengugurkan_wawancara');
        }

        //kirim email

        return $wawancara ;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'no_pendaftaran' => 'required|exists:pendaftarans|unique:wawancaras',
            'penampilanfisik' => Rule::in(['b', 'c', 'k']),
            'sopansantun' => Rule::in(['b', 'c', 'k']),
            'prestasiakademik' => Rule::in(['b', 'c', 'k']),
            'kemampuanfinansial' => Rule::in(['b', 'c', 'k']),
            'kemampuanmenyampaikan_pendapat' => Rule::in(['b', 'c', 'k']),
            'dayatangkap' => Rule::in(['b', 'c', 'k']),
            'kepercayaandiri' => Rule::in(['b', 'c', 'k']),
            'motivasi' => Rule::in(['b', 'c', 'k']),
            'doronganprestasi' => Rule::in(['b', 'c', 'k']),
            'stabilitasemosi' => Rule::in(['b', 'c', 'k']),
            'lulus_yt' => Rule::in(['y', 't'])
        ];
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
