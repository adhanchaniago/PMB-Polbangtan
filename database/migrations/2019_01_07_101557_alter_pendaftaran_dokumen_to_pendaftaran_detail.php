<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPendaftaranDokumenToPendaftaranDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pendaftaran_dokumens', 'pendaftaran_details');

        Schema::table('pendaftaran_details', function (Blueprint $table) {
            $table->boolean('cek_sistem');
            $table->boolean('cek_admin');
            $table->string('keterangan')->nullable();
            $table->string('kelompok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftaran_details', function (Blueprint $table) {
            $table->dropColumn('cek_sistem');
            $table->dropColumn('cek_admin');
            $table->dropColumn('keterangan');
            $table->dropColumn('kelompok');
        });

        Schema::rename('pendaftaran_details', 'pendaftaran_dokumens');
    }
}
