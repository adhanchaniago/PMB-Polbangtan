<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to('login');
});
Route::get('/register-success', function () {
    return view('auth.success');
});
Route::get('/aktifasi', 'WelcomeController@aktifasi')->name('aktifasi');
Route::get('/aktifasi-resend', 'WelcomeController@aktifasi_resend')->name('aktifasi.resend');
Route::post('/aktifasi-send', 'WelcomeController@aktifasi_send')->name('aktifasi.send');
Route::get('/viewfile', 'ViewFileController@index')->name('viewfile');

Auth::routes();

Route::group(['middleware' => 'auth'], function ()
{
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/profile', 'HomeController@profile')->name('profile');
	Route::put('/profile/{id}/update', 'HomeController@update')->name('profile.update');

    Route::group(['middleware' => 'roles', 'roles' => 'administrator'], function ()
    {
		Route::get('admin', 'Admin\AdminController@index');
		Route::resource('admin/roles', 'Admin\RolesController');
		Route::resource('admin/permissions', 'Admin\PermissionsController');
		Route::resource('admin/users', 'Admin\UsersController');
		Route::resource('admin/pages', 'Admin\PagesController');
		Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
		    'index', 'show', 'destroy'
		]);
		Route::resource('admin/settings', 'Admin\SettingsController');
		Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
		Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
		
		Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
	});

    Route::group(['middleware' => 'roles', 'roles' => 'siswa'], function ()
    {
		Route::resource('siswa', 'SiswaController');
		Route::resource('pendaftaran', 'PendaftaranController');
		Route::get('pemilihan-jalur', 'PendaftaranController@jalur')->name('pilih-jalur');
		Route::post('jalur/simpan-jalur', 'PendaftaranController@store_jalur')->name('store-jalur');
		Route::get('jurusan/pemilihan-jurusan', 'PendaftaranController@jurusan')->name('pilih-jurusan');
		Route::post('jurusan/simpan-jurusan', 'PendaftaranController@store_jurusan')->name('store-jurusan');
		Route::resource('prestasi', 'PrestasiController');
		Route::get('resume', 'PendaftaranController@resume')->name('pendaftaran.resume');
        Route::get('siswa/kartu/cetak', 'SiswaController@kartu')->name('siswa.kartu');
	});
});