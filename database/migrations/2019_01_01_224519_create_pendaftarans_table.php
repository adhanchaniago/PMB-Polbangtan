<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id');
            $table->string('no_pendaftaran')->nullable();
            $table->string('jalur');
            $table->string('institusi')->nullable();
            $table->string('jurusan_1')->nullable();
            $table->string('jurusan_2')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('state');
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
        Schema::dropIfExists('pendaftarans');
    }
}
