<?php

namespace App\Imports;

use App\TesTulis;
use Maatwebsite\Excel\Concerns\ToModel;

class TesTulisImport implements ToModel
{
    protected $institusiId, $userId;
    protected $rowIdx;

    public function __construct(int $institusi_id, int $user_id)
    {
        $this->institusiId = $institusi_id;
        $this->userId = $user_id;
        $this->rowIdx = 0;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($this->rowIdx > 0) {
            return new TesTulis([
                'no_pendaftaran' => $row[1],
                'institusi_id' => $this->institusiId,
                'matematika' => $row[3],
                'teknis_pertanian' => $row[4],
                'hasil' => strtoupper($row[5]),
                'uploaded_by' => $this->userId
            ]);
        }
        $this->rowIdx += 1;
    }
}
