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
        Schema::create('pasien', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_pasien');
            $table->string('j_kelamin');
            $table->string('agama');
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->integer('usia');
            $table->integer('no_tlp');
            $table->string('nm_kk');
            $table->string('hub_kel');
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
        Schema::dropIfExists('pasien');
    }
};
