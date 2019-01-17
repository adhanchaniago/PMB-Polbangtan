<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesKesehatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_kesehatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pendaftaran');
            $table->string('mata');
            $table->string('gigi');
            $table->string('tindik');
            $table->string('cacat');
            $table->string('tato');
            $table->integer('tinggi_badan');
            $table->string('penyakit');
            $table->text('keterangan')->nullable();
            $table->string('nilai_label');
            $table->string('nilai_angka');
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
        Schema::dropIfExists('tes_kesehatans');
    }
}
