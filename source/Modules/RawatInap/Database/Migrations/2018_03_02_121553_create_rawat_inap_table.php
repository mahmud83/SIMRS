<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap', function (Blueprint $table) {
            $table->increments('id');

            $table->string('id_rm');
            $table->string('id_pasien');
            $table->string('nama_kamar');
            $table->string('id_dokter_pj');
            $table->string('dokter_pengirim');
            $table->string('id_petugas_penerima');
            $table->string('diagnosa_awal');
            $table->string('icd_x_diagnosa_awal');
            $table->string('diagnosa_sekunder');
            $table->string('icd_x_diagnosa_sekunder');
            $table->date('tanggal_masuk');

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
        Schema::dropIfExists('rawat_inap');
    }
}
