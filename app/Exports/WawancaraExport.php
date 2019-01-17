<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class WawancaraExport implements FromView, ShouldAutoSize, WithEvents
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
        return view('tes-wawancara.xls', [
            'pendaftaran' => $this->pendaftaran
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:O1')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('A1:O1')->getAlignment()->applyFromArray([
                    'vertical' => 'center'
                ]);
                $event->sheet->getStyle('D1:O1')->getAlignment()->applyFromArray([
                    'horizontal' => 'center'
                ]);
            },
        ];
    }
}
