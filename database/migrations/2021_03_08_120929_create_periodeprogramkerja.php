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
            $table->string('NamaPeriodeProgramKerja');
            $table->string('TahunProgramKerja');
            $table->date('tanggalMulai');
            $table->date('tanggalBerakhir');
            $table->text('DeskripsiPeriodeProgramKerja');
            $table->bigInteger('lock');
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
