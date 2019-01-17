<?php

namespace App\Imports;

use App\Libs\Traits\InfoPendaftaran;
use App\TesTulis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TesTulisImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable, InfoPendaftaran;

    protected $institusiId, $userId;

    public function __construct(int $institusi_id, int $user_id)
    {
        $this->institusiId = $institusi_id;
        $this->userId = $user_id;
    }

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        //insert tes tulis
        $tesTulis = TesTulis::create([
            'no_pendaftaran' => $row['no_pendaftaran'],
            'institusi_id' => $this->institusiId,
            'matematika' => $row['nilai_matematika'],
            'teknis_pertanian' => $row['nilai_teknis_pertanian'],
            'hasil' => strtolower($row['lulus_yt']),
            'uploaded_by' => $this->userId
        ]);

        //update state pendaftaran
        $pendaftaran = $tesTulis->pendaftaran;
        if ($row['lulus_yt'] == 'y') {
            $this->updateState($pendaftaran->id, 'memverifikasi_ujian');
        } else {
            $this->updateState($pendaftaran->id, 'mengugurkan_ujian');
        }

        //kirim email

        return $tesTulis;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'no_pendaftaran' => 'required|exists:pendaftarans|unique:tes_tulis',
            'nilai_matematika' => 'required|numeric',
            'nilai_teknis_pertanian' => 'required|numeric',
            'lulus_yt' => Rule::in(['y', 't'])
        ];
    }
}
