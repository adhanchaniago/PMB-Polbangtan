<?php

namespace App\Http\Controllers;

use App\Institusi;
use App\Jurusan;
use App\Siswa;
use App\Libs\Services\PendaftaranDokumenService;
use App\Libs\Services\PendaftaranService;
use App\Libs\Services\PrestasiService;
use App\Libs\Services\VerifikasiDetailService;
use App\Libs\Services\VerifikasiPendaftaranService;
use App\Libs\Traits\InfoPendaftaran;
use App\Libs\Traits\InfoSiswa;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class PendaftaranController extends Controller
{
    use InfoSiswa, InfoPendaftaran;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PendaftaranService $service)
    {
        $pendaftaran = [];
        $access = $this->cekKelengkapanDokumen();

        if ($access) {
            $pendaftaran = $this->getPendaftaran();

            if ($pendaftaran !== null) {
                $pendaftaran['jalur_label'] = ucwords(str_replace("-", " ", $pendaftaran->jalur));
            }
        }

        return view('pendaftaran.index', [
            'access' => $access,
            'data' => $pendaftaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, PendaftaranService $service)
    {
        $this->validate($request, [
            'jalur' => 'required'
        ]);

        $service->createPendaftaran([
            'siswa_id' => $user = auth()->user()->person_id,
            'jalur' => $request->jalur
        ]);

        return redirect()->route('pilih-jalur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, String $jalur, PendaftaranService $service)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PendaftaranService $service)
    {
        $service->updatePendaftaran($id, ['state' => 'cancel']);

        return Redirect::to('pendaftaran');
    }

    /**
     * @param PrestasiService $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jalur(PrestasiService $service)
    {
        $pendaftaran = $this->getPendaftaran();

        if ($pendaftaran->state != 'start') {
            return Redirect::to('pendaftaran')->withError('Anda tidak dapat memilih jalur');
        }

        $view = 'jalur-' . $pendaftaran->jalur;
        $jalur = str_replace("-", " ", $pendaftaran->jalur);
        $title = "Pendaftaran Mahasiswa Baru Jalur " . ucwords($jalur);

        $prestasi = $service->getPrestasiByPendaftaran($pendaftaran->id);

        return view('pendaftaran.jalur', [
            'title' => $title,
            'view' => $view,
            'prestasi' => $prestasi
        ]);
    }

    /**
     * @param Request $request
     * @param PendaftaranService $service
     * @param PendaftaranDokumenService $dService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_jalur(Request $request, PendaftaranService $service,
                                PendaftaranDokumenService $dService)
    {
        $siswa = $request->user()->person;
        $pendaftaran = $this->getPendaftaran();

        $data = array_merge($request->all(), $siswa->toArray());
        $cekPersyaratan = $this->cekPersyaratan($pendaftaran->jalur, $data);

        if ($cekPersyaratan == '') {
            DB::transaction(function () use ($request, $pendaftaran, $service, $dService) {
                //Update pendaftaran (state)
                $this->updateState($pendaftaran->id, 'menyelesaikan_pemberkasan');

                //Simpan dokumen
                $dService->createPendaftaranDokumen($pendaftaran->id, $request);
            });
        } else {
            if ($pendaftaran->jalur == 'undangan-petani' ||
                $pendaftaran->jalur == 'undangan-smk') {
                DB::transaction(function () use ($request, $pendaftaran, $service, $dService, $cekPersyaratan) {
                    //Update pendaftaran (state)
                    $this->updateState($pendaftaran->id, 'menyelesaikan_pemberkasan');
                    $service->updatePendaftaran($pendaftaran->id, ['keterangan' => $cekPersyaratan]);

                    //Simpan dokumen
                    $dService->createPendaftaranDokumen($pendaftaran->id, $request);
                });
            } else {
                return Redirect::to('pendaftaran')->withError($cekPersyaratan);
            }
        }

        return redirect()->route('pilih-jurusan');
    }

    public function jurusan()
    {
        $pendaftaran = $this->getPendaftaran();
        if ($pendaftaran->state != 'pemilihan_jurusan') {
            return Redirect::to('pendaftaran')->withError('Anda tidak dapat memilih jurusan');
        }

        $institusi = Institusi::all();
        $jurusan = Jurusan::where('institusi_id', $institusi[0]->id)->get();

        return view('pendaftaran.jurusan', [
            'institusi' => $institusi,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * @param Request $request
     * @param PendaftaranService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_jurusan(Request $request, PendaftaranService $service)
    {
        $data = $request->only(['institusi', 'jurusan_1', 'jurusan_2']);

        if ($data['jurusan_1'] == $data['jurusan_2']) {
            return redirect()->back()->withError('Jurusan tidak boleh sama');
        }

        $pendaftaran = $this->getPendaftaran();
        DB::transaction(function () use ($data, $pendaftaran, $service) {
            $service->updatePendaftaran($pendaftaran->id, [
                'institusi' => $data['institusi'],
                'jurusan_1' => $data['jurusan_1'],
                'jurusan_2' => $data['jurusan_2']
            ]);
            $this->updateState($pendaftaran->id, 'mereview_pendaftaran');
        });

        return redirect()->route('pendaftaran.resume');
    }

    /**
     * @param Request $request
     * @param VerifikasiPendaftaranService $vService
     * @param VerifikasiDetailService $dService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resume(Request $request,
                           VerifikasiPendaftaranService $vService,
                           VerifikasiDetailService $dService)
    {
        //1. Ambil Data Siswa
        $siswa = $request->user()->person;

        //2. Ambil Data Pendaftaran
        $pendaftaran = $this->getPendaftaran();
        $pendaftaran['jalur_label'] = ucwords(str_replace("-", " ", $pendaftaran->jalur));

        //3. Ambil Data Pendaftaran Dokumen
        $dokumen = $pendaftaran->dokumen;

        //4. Buat Verifikasi
        //5. Buat Detail, Cek Masing-Masing Isian
        DB::transaction(function () use ($siswa, $pendaftaran, $dokumen, $vService, $dService) {
            $verifikasi = $vService->createVerifikasi([
                'pendaftaran_id' => $pendaftaran->id,
            ]);

            $this->create_detail($pendaftaran, $verifikasi->getKey(), $siswa, $dService);
        });

        return view('pendaftaran.resume', [
            'pendaftaran' => $pendaftaran,
            'siswa' => $siswa
        ]);
    }

    /**
     * @param Pendaftaran $pendaftaran
     * @param int $verifikasiId
     * @param Siswa $siswa
     * @param VerifikasiDetailService $service
     */
    private function create_detail(Pendaftaran $pendaftaran, int $verifikasiId, Siswa $siswa, VerifikasiDetailService $service)
    {
        foreach ($siswa->toArray() as $key => $value) {
            if ($key != 'id' || $key != 'created_at' || $key != 'updated_at') {
                $cek_sistem = true;

                if ($pendaftaran->jalur == 'undangan-petani' ||
                    $pendaftaran->jalur == 'undangan-smk') {

                    if ($key == 'tinggi_badan') {
                        $cek_sistem = $this->cekTinggiBadan($siswa->jenis_kelamin, $value);
                    } else {
                    }

                }

                $service->createDetail([
                    'verifikasi_id' => $verifikasiId,
                    'key' => $key,
                    'value' => $value,
                    'cek_sistem' => $cek_sistem,
                    'cek_admin' => true,
                ]);
            }
        }
    }

}
