<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeprogramkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodeprogramkerja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NamaPeriodeProgramKerja')->nullable();
            $table->string('TahunProgramKerja')->nullable();
            $table->date('tanggalMulai')->nullable();
            $table->date('tanggalBerakhir')->nullable();
            $table->text('DeskripsiPeriodeProgramKerja')->nullable();
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
        Schema::dropIfExists('periodeprogramkerja');
    }
}
