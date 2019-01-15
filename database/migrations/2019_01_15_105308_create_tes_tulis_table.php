<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesTulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_tulis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pendaftaran');
            $table->integer('institusi_id');
            $table->double('matematika');
            $table->double('teknis_pertanian');
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
        Schema::dropIfExists('tes_tulis');
    }
}
