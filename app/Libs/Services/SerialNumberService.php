<?php

namespace App\Libs\Services;

use App\SerialNumber;
use App\Libs\Contracts\SerialNumberContract;

class SerialNumberService implements SerialNumberContract
{
    private $model;

    public function __construct(SerialNumber $model)
    {
        $this->model = $model;
    }

    /**
     * @param String $institusi
     * @return String
     */
    public function getSerialNumber(int $institusi)
    {
        $serial = $this->model
                       ->where('institusi', $institusi)
                       ->where('tahun', date('Y'))
                       ->first();

        if ( $serial === null ) {
            $nomor = $institusi . "." . date('Y') . ".000001";

            $this->model->create([
                'institusi' => $institusi,
                'tahun' => date('Y'),
                'counter' => 1
            ]);
        } else {
            $nomor = $institusi .
                "." .
                $serial->tahun .
                "." .
                str_pad($serial->counter + 1, 6, 0, STR_PAD_LEFT);

            $this->model->find($serial->id)->update([
                'counter' => $serial->counter + 1
            ]);
        }

        return $nomor;
    }
}
