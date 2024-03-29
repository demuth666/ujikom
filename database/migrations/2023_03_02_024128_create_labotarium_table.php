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
        Schema::create('labotarium', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_rm')->default('RM1-' . now()->format('Ymd'));
            $table->string('hasil_lab');
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
        Schema::dropIfExists('labotarium');
    }
};
