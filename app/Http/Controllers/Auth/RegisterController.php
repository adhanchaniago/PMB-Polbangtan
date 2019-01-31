<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Libs\Services\ContentService;
use App\Libs\Services\SiswaService;
use App\Libs\Services\UserService;
use App\Http\Controllers\Controller;
use App\Mail\AktivasiAkun;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register-success';
    protected $data;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContentService $service)
    {
        $this->middleware('guest');
		$this->data = [];
    	$this->data['alamat'] = $service->getContentByKey('alamat')->value;
    	$this->data['telepon'] = $service->getContentByKey('no-telepon')->value;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register', $this->data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, SiswaService $service, UserService $uService)
    {
    	$user = new User;

    	DB::transaction(function() use (&$user, $data, $service, $uService) {
    		$siswa = $service->createSiswa($data['name']);

    		$data['password'] = Hash::make($data['password']);
    		$data['verification_code'] = str_random(20);
    		$data['person_type'] = 'siswa';
    		$data['person_id'] = $siswa->getKey();

    		$user  = $uService->createUser($data);
    		$user->assignRole(config('rolepermission.roles.siswa.name'));
    	});

		Mail::to($data['email'])->send(new AktivasiAkun($user));
        
        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, SiswaService $service, UserService $uService)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all(), $service, $uService)));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }    
}
