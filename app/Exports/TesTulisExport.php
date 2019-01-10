<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TesTulisExport implements FromView, ShouldAutoSize
{
    protected $pendaftaran;

    public function __construct(Collection $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }
    /**
     * @return View
     */
    public function view(): View
    {
        return view('tes-tulis.xls', [
            'pendaftaran' => $this->pendaftaran
        ]);
    }
}
