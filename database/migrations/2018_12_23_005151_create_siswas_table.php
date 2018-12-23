<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nisn')->nullable();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('ktp')->nullable();
            $table->string('tipe_sekolah')->comment('SMK, SMA, MA')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('no_telepon_sekolah')->nullable();
            $table->string('jurusan')->comment('PP, Pertanian, IPA, IPS')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('ijazah')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->string('sk_sehat')->nullable();
            $table->string('sk_tidak_hamil')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
