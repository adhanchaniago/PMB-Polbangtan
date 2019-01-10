<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Libs\Services\PendaftaranDetailService;
use App\Libs\Services\PendaftaranService;
use App\Libs\Services\PrestasiService;
use Illuminate\Http\Request;

class VerifikasiDokumenController extends Controller
{
    private $url = 'verifikasi-dokumen';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->url . '.index', [
            'urlDataList' => route('api.verifikasi')
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,
                         PendaftaranService $service,
                         PendaftaranDetailService $dService,
                         PrestasiService $pService)
    {
        $pendaftaran = $service->getPendaftaranById($id);
        $pendaftaran['jalur_label'] = ucwords(str_replace("-", " ", $pendaftaran->jalur));
        $pendaftaran['jurusan_1_label'] = Jurusan::selectName($pendaftaran->jurusan_1);
        $pendaftaran['jurusan_2_label'] = Jurusan::selectName($pendaftaran->jurusan_2);

        $detail = $dService->getPendaftaranDetailByPendaftaran($pendaftaran->id);
        $biodata = $detail->map(function($item) {
            return $item;
        })->where('kelompok', 'biodata');

        $dokumen = $detail->map(function($item) {
            return $item;
        })->where('kelompok', 'berkas');

        $cek_sistem_false = $detail->map(function($item) {
            return $item;
        })->where('cek_sistem', false)->count();

        $prestasi = $pService->getPrestasiByPendaftaran($pendaftaran->id);

        return view($this->url . '.show', [
            'pendaftaran' => $pendaftaran,
            'biodata' => $biodata,
            'dokumen' => $dokumen,
            'cek_sistem_false' => $cek_sistem_false,
            'prestasi' => $prestasi
        ]);
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
}
