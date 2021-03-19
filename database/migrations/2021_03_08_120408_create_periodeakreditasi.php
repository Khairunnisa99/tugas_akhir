<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeakreditasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodeakreditasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaPeriodeAkreditasi')->nullable();
            $table->string('tahunProgramAkreditasi')->nullable();
            $table->date('TanggalMulai')->nullable();
            $table->date('TanggalBerakhir')->nullable();
            $table->tinyInteger('periodeakreditasicStatus')->nullable();
            $table->text('deskripsiPeriodeAkreditasi')->nullable();
            $table->bigInteger('lock')->nullable();
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
        Schema::dropIfExists('periodeakreditasi');
    }
}
