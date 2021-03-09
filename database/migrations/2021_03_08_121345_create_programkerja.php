<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programkerja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NamaProgramKerja');
            $table->bigInteger('periodeprogramkerja_idperiodeprogramkerja');
            $table->bigInteger('tipeprogramkerja_idtipeprogramkerja');
            $table->date('tanggalMulai');
            $table->date('tanggalBerakhir');
            $table->text('DeskripsiProgramKerja');
            $table->bigInteger('statusprogramkerja_idstatusprogramkerja');
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
        Schema::dropIfExists('programkerja');
    }
}
