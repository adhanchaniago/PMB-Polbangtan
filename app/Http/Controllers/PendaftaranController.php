<?php

namespace App\Http\Controllers;

use App\Institusi;
use App\Libs\Services\PendaftaranDetailService;
use App\Libs\Services\PendaftaranService;
use App\Libs\Services\PrestasiService;
use App\Libs\Services\SerialNumberService;
use App\Libs\Services\VerifikasiDetailService;
use App\Libs\Services\VerifikasiPendaftaranService;
use App\Libs\Traits\InfoPendaftaran;
use App\Libs\Traits\InfoSiswa;
use App\Libs\Traits\InstitusiJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class PendaftaranController extends Controller
{
    use InfoSiswa, InfoPendaftaran, InstitusiJurusan;

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
     * @param Request $request
     * @param PendaftaranService $service
     * @return mixed
     * @throws \Throwable
     */
    public function store(Request $request,
                          PendaftaranService $service,
                          SerialNumberService $sService)
    {
        $pendaftaran = $this->getPendaftaran();

        DB::transaction(function () use ($pendaftaran, $service, $sService) {
            $no_pendaftaran = $sService->getSerialNumber($pendaftaran->institusi);

            $service->updatePendaftaran($pendaftaran->id, ['no_pendaftaran' => $no_pendaftaran]);

            $this->updateState($pendaftaran->id, 'menyelesaikan_pendaftaran');
        });

        return Redirect::to('pendaftaran')->withSuccess('Pendaftaran berhasil disubmit');
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
     * @param PendaftaranDetailService $dService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_jalur(Request $request, PendaftaranService $service,
                                PendaftaranDetailService $dService)
    {
        $rollback = false; $keterangan = '';
        $siswa = $request->user()->person;
        $pendaftaran = $this->getPendaftaran();

        DB::beginTransaction();
        //insert data siswa ke pendaftaran detail
        foreach ($siswa->toArray() as $key => $value) {
            if ($key != 'id' && $key != 'created_at' && $key != 'updated_at') {
                $cek_sistem = true;
                if ($value == null){
                    $value = '';
                }
                $keterangan = $this->cekPersyaratan($siswa, $pendaftaran->jalur, $key, $value);

                if ($keterangan != '') {
                    $cek_sistem = false;
                    if ($pendaftaran->jalur == 'undangan-petani' ||
                        $pendaftaran->jalur == 'undangan-smk') {
                    } else {
                        $rollback = true;
                        break;
                    }
                }

                $dService->createPendaftaranDetail([
                    'pendaftaran_id' => $pendaftaran->id,
                    'key' => $key,
                    'value' => $value,
                    'cek_sistem' => $cek_sistem,
                    'cek_admin' => true,
                    'keterangan' => $keterangan,
                    'kelompok' => 'biodata'
                ]);
            }
        }

        if ($rollback) {
            DB::rollBack();
            return Redirect::to('pendaftaran')->withError($keterangan);
        }

        //insert dokumen ke pendaftaran detail
        $data = $request->except(['_token']);
        foreach ($data as $key => $value) {
            $cek_sistem = true;
            if ($value == null){
                $value = '';
            }

            $keterangan = $this->cekPersyaratan($siswa, $pendaftaran->jalur, $key, $value);

            if ($keterangan != '') {
                $cek_sistem = false;
            }

            if ( $request->hasFile($key) ) {
                $value = $request->file($key)->store("pendaftaran");
            }

            $dService->createPendaftaranDetail([
                'pendaftaran_id' => $pendaftaran->id,
                'key' => $key,
                'value' => $value,
                'cek_sistem' => $cek_sistem,
                'cek_admin' => true,
                'keterangan' => $keterangan,
                'kelompok' => 'berkas'
            ]);
        }

        $this->updateState($pendaftaran->id, 'menyelesaikan_pemberkasan');
        DB::commit();

        return redirect()->route('pilih-jurusan');
    }

    public function jurusan()
    {
        $pendaftaran = $this->getPendaftaran();
        if ($pendaftaran->state != 'pemilihan_jurusan') {
            return Redirect::to('pendaftaran')->withError('Anda tidak dapat memilih jurusan');
        }

        $institusi = Institusi::all();
        $jurusan = $this->getJurusan($institusi[0]->id);

        return view('pendaftaran.jurusan', [
            'institusi' => $institusi,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * @param Request $request
     * @param PendaftaranService $service
     * @param PendaftaranDetailService $dService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store_jurusan(Request $request,
                                  PendaftaranService $service,
                                  PendaftaranDetailService $dService)
    {
        $data = $request->only(['institusi', 'jurusan_1', 'jurusan_2']);
        if ($data['jurusan_1'] == $data['jurusan_2']) {
            return redirect()->back()->withError('Jurusan tidak boleh sama');
        }

        $siswa = $request->user()->person;
        $pendaftaran = $this->getPendaftaran();
        DB::transaction(function () use ($data, $siswa, $pendaftaran, $service, $dService) {
            $cek_sistem = true;
            $keterangan = $this->cekJurusan($siswa, $data);

            if ($keterangan != '') {
                $cek_sistem = false;
            }

            //jika jurusan tidak cocok, update cek_sistem jurusan di biodata menjadi false
            $dService->updatePendaftaranDetailByKey('jurusan', [
                'cek_sistem' => $cek_sistem,
                'keterangan' => $keterangan
            ]);

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
     * @param PendaftaranDetailService $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resume(Request $request,
                           PendaftaranDetailService $service,
                           PrestasiService $pService)
    {
        $pendaftaran = $this->getPendaftaran();
        $pendaftaran['jalur_label'] = ucwords(str_replace("-", " ", $pendaftaran->jalur));
        $pendaftaran['jurusan_1_label'] = $this->getJurusanName($pendaftaran->jurusan_1);
        $pendaftaran['jurusan_2_label'] = $this->getJurusanName($pendaftaran->jurusan_2);

        $detail = $service->getPendaftaranDetailByPendaftaran($pendaftaran->id);
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

        return view('pendaftaran.resume', [
            'pendaftaran' => $pendaftaran,
            'biodata' => $biodata,
            'dokumen' => $dokumen,
            'cek_sistem_false' => $cek_sistem_false,
            'prestasi' => $prestasi
        ]);
    }

}
