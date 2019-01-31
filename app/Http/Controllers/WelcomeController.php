<?php

namespace App\Http\Controllers;

use App\Libs\Services\ContentService;
use App\Libs\Services\UserService;
use App\Mail\AktivasiAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;

class WelcomeController extends Controller
{
	protected $data;

	public function __construct(ContentService $service)
	{
		$this->data = [];
    	$this->data['alamat'] = $service->getContentByKey('alamat')->value;
    	$this->data['telepon'] = $service->getContentByKey('no-telepon')->value;
	}

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
    	$data = $this->data;
    	return view('auth.aktifasi.resend', $data);
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

    public function index(ContentService $service)
    {
    	$data = $this->data;
    	$data['judul'] = $service->getContentByKey('judul')->value;
    	$data['sub'] = $service->getContentByKey('sub-judul')->value;
    	$data['deskripsi'] = $service->getContentByKey('deskripsi')->value;
    	$data['countdown'] = $service->getContentByKey('countdown')->value;

    	return view('frontend.welcome', $data);
    }

    public function informasi(ContentService $service)
    {
    	$data = $this->data;
    	$data['informasi'] = $service->getContentByKey('informasi-pendaftaran')->value;

    	return view('frontend.informasi-pendaftaran', $data);
    }

    public function brosur(ContentService $service)
    {
    	$data = $this->data;
    	$data['brosur'] = $service->getContentByKey('brosur-pmb')->value;

    	return view('frontend.brosur-pmb', $data);
    }

    public function dokumen(ContentService $service)
    {
    	$data = $this->data;
    	$dokumen = $service->getDokumen();
    	$dokumen = $dokumen->map(function ($item) {
    		$item['dokumen'] = json_decode($item->value, true);

    		return $item;
    	});
    	$data['dokumen'] = $dokumen;

    	return view('frontend.dokumen-pmb', $data);
    }
}
