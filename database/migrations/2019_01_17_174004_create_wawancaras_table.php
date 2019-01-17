<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pendaftaran');
            $table->string('penampilan_fisik');
            $table->string('sopan_santun');
            $table->string('prestasi_akademik');
            $table->string('kemampuan_finansial');
            $table->string('kemampuan_menyampaikan_pendapat');
            $table->string('daya_tangkap');
            $table->string('kepercayaan_diri');
            $table->string('motivasi');
            $table->string('dorongan_prestasi');
            $table->string('stabilitas_emosi');

            $table->integer('nilai_penampilan_fisik');
            $table->integer('nilai_sopan_santun');
            $table->integer('nilai_prestasi_akademik');
            $table->integer('nilai_kemampuan_finansial');
            $table->integer('nilai_kemampuan_menyampaikan_pendapat');
            $table->integer('nilai_daya_tangkap');
            $table->integer('nilai_kepercayaan_diri');
            $table->integer('nilai_motivasi');
            $table->integer('nilai_dorongan_prestasi');
            $table->integer('nilai_stabilitas_emosi');
            $table->double('total');

            $table->text('keterangan')->nullable();
            $table->string('hasil');
            $table->integer('uploaded_by');
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
        Schema::dropIfExists('wawancaras');
    }
}
