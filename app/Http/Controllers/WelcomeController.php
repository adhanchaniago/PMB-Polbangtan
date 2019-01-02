<?php

namespace App\Http\Controllers;

use App\Libs\Services\UserService;
use App\Mail\AktivasiAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;

class WelcomeController extends Controller
{
    /**
     * [aktifasi akun]
     * @param  Request $request
     */
    public function aktifasi(Request $request, UserService $service)
    {
    	$data = $request->only(['verification_code', 'email']);
    	$data['status'] = 0;
    	$user = $service->searchUser($data);

    	if ($user->count() > 0) {
    		$service->updateUser($user[0]->id, ['status' => 1]);

    		return Redirect::to('login')->withSuccess('Aktifasi akun berhasil, silahkan login menggunakan email dan password yang anda buat.');
    	} else {
    		return Redirect::to('login')->withError('Aktifasi akun gagal, kode atau email yang anda masukkan salah.');
    	}
    }

    public function aktifasi_resend()
    {
    	return view('auth.aktifasi.resend');
    }

    public function aktifasi_send(Request $request, UserService $service)
    {
    	$data = $request->only('email');
    	$data['status'] = 0;
    	$user = $service->searchUser($data);
    	
    	if ($user->count() > 0) {
    		$user = $service->updateUser($user[0]->id, ['verification_code' => str_random(20)]);
    		Mail::to($data['email'])->send(new AktivasiAkun($user));

    		return Redirect::to('aktifasi-resend')->withSuccess('Kami telah mengirimkan link aktifasi ke email ' . $data['email'] . '. Silahkan cek email anda');
    	} else {
    		return Redirect::to('aktifasi-resend')->withError('Akun tidak ditemukan. Silahkan mendaftar terlebih dahulu');
    	}
    }
}
