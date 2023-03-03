<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->varhcar('labotarium_id');
            $table->varhcar('tindakan_id');
            $table->varhcar('obat_id');
            $table->varhcar('dokter_id');
            $table->varhcar('pasien_id');
            $table->string('diagnosa');
            $table->string('resep');
            $table->string('keluhan');
            $table->date('tgl_pemeriksaan');
            $table->text('ket');
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
        Schema::dropIfExists('rekam_medis');
    }
};
