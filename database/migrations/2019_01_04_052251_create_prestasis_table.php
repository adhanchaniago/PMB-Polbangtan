<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pendaftaran_id');
            $table->string('bidang');
            $table->string('nama');
            $table->integer('tahun');
            $table->string('tingkat');
            $table->double('val_tingkat');
            $table->string('kepesertaan');
            $table->integer('val_kepesertaan');
            $table->string('prestasi');
            $table->integer('val_prestasi');
            $table->double('nilai_prestasi');
         	$table->softDeletes();
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
        Schema::dropIfExists('prestasis');
    }
}
