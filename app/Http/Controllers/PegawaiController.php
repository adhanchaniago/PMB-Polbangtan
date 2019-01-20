<?php

namespace App\Http\Controllers;

use App\Libs\Services\InstitusiService;
use App\Libs\Services\PegawaiService;
use App\Libs\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PegawaiService $service, InstitusiService $iService)
    {
    	$data = $service->getPegawai();
    	$institusi = $iService->getAllInstitusi();

        return view('pegawai.index', [
        	'data' => $data,
        	'institusi' => $institusi
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
    public function store(Request $request, PegawaiService $service, UserService $uService)
    {
    	$this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

    	DB::transaction(function() use ($request, $service, $uService) {
    		$pegawai = $service->createPegawai([
    			'nama' => $request->nama,
	        	'institusi_id' => $request->institusi
    		]);

    		if ($request->institusi == '1') {
    			$type = 'admin';
    		} else {
    			$type = 'operator';
    		}

    		$user = $uService->createUser([
		        'name' => $request->nama,
		        'email' => $request->email,
		        'password' => bcrypt($request->password),
		        'status' => 1,
		        'person_id' => $pegawai->getKey(),
		        'person_type' => $type
    		]);
    	});

        return Redirect::to('pegawai')->withSuccess('Data user berhasil ditambahkan');
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
    public function update(Request $request, $id, PegawaiService $service, UserService $uService)
    {
    	$this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id . ',person_id',
        ]);

    	DB::transaction(function() use ($request, $id, $service, $uService) {
    		$pegawai = $service->updatePegawai($id, [
    			'nama' => $request->nama,
	        	'institusi_id' => $request->institusi
    		]);

    		$dataUser = [
		        'name' => $request->nama,
		        'email' => $request->email,
    		];

    		if ($request->has('password') && $request->password !== null) {
    			$dataUser['password'] = bcrypt($request->password);
    		}
    		$uService->updateUserPegawai($id, $dataUser);
    	});

        return Redirect::to('pegawai')->withSuccess('Data user berhasil ditambahkan');
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
