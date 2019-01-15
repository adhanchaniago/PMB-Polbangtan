<?php

namespace App\Http\Controllers;

use App\Exports\TesTulisExport;
use App\Imports\TesTulisImport;
use App\Libs\Services\PendaftaranService;
use App\Libs\Traits\InfoOperator;
use App\Libs\Traits\InstitusiJurusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TesTulisController extends Controller
{
    use InfoOperator, InstitusiJurusan;

    private $url = 'tes-tulis';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->url . '.index', [
            'urlDataList' => route('api.tulis')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institusi = $this->getInstitusi();

        if ($request->hasFile('hasil_ujian')) {
            Excel::import(new TesTulisImport($institusi->id, $request->user()->id), $request->hasil_ujian);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf(PendaftaranService $service)
    {
        $institusi = $this->getInstitusi();

        $pendaftaran = $service->searchPendaftaran([
            'institusi' => $institusi->id,
            'state' => 'tes_tulis'
        ]);
        $pendaftaran = $pendaftaran->map(function($item) {
            $item['jurusan_1_label'] = $this->getJurusanName($item->jurusan_1);
            $item['jurusan_2_label'] = $this->getJurusanName($item->jurusan_2);

            return $item;
        });

        $pdf = PDF::loadView($this->url . '.pdf', [
            'pendaftaran' => $pendaftaran,
            'institusi' => $institusi
        ]);

        return $pdf->stream();
        /*return view($this->url . '.pdf', [
            'pendaftaran' => $pendaftaran,
            'institusi' => $institusi
        ]);*/
    }

    public function xls(PendaftaranService $service)
    {
        $institusi = $this->getInstitusi();
        $pendaftaran = $service->searchPendaftaran([
            'institusi' => $institusi->id,
            'state' => 'tes_tulis'
        ]);

        return Excel::download(new TesTulisExport($pendaftaran), 'daftar_peserta.xlsx');
    }
}
