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
        Schema::create('catatan_rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('tindakan');
            $table->string('dokter');
            $table->string('diagnosa');
            $table->string('keluhan');
            $table->date('tgl_pemeriksaan');
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
        Schema::dropIfExists('catatan_rekam_medis');
    }
};
