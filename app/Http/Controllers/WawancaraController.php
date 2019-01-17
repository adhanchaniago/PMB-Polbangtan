<?php

namespace App\Http\Controllers;

use App\Exports\WawancaraExport;
use App\Imports\WawancaraImport;
use App\Libs\Services\PendaftaranService;
use App\Libs\Traits\InstitusiJurusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Redirect;

class WawancaraController extends Controller
{
    use InstitusiJurusan;

    private $url = 'tes-wawancara';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->url . '.index', [
            'urlDataList' => route('api.wawancara')
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
        if ($request->hasFile('hasil_wawancara')) {
            $excel = new WawancaraImport($request->user()->id);
            $excel->import($request->hasil_wawancara);
        }

        return Redirect::to('tes-wawancara')->withSuccess('Import data hasil wawancara berhasil');
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
        $pendaftaran = $service->searchPendaftaran([
            'state' => 'tes_wawancara'
        ]);
        $pendaftaran = $pendaftaran->map(function($item) {
            $item['jurusan_1_label'] = $this->getJurusanName($item->jurusan_1);
            $item['jurusan_2_label'] = $this->getJurusanName($item->jurusan_2);

            return $item;
        });

        $pdf = PDF::loadView($this->url . '.pdf', [
            'pendaftaran' => $pendaftaran
        ]);

        return $pdf->stream();
    }

    public function xls(PendaftaranService $service)
    {
        $pendaftaran = $service->searchPendaftaran([
            'state' => 'tes_wawancara'
        ]);

        return Excel::download(new WawancaraExport($pendaftaran), 'daftar_peserta_wawancara.xlsx');
    }
}
