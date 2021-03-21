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
            $table->string('NamaProgramKerja')->nullable();
            $table->bigInteger('periodeprogramkerja_idperiodeprogramkerja')->nullable()->unsigned();
            $table->bigInteger('tipeprogramkerja_idtipeprogramkerja')->nullable()->unsigned();
            $table->date('tanggalMulai')->nullable();
            $table->date('tanggalBerakhir')->nullable();
            $table->text('DeskripsiProgramKerja')->nullable();
            $table->bigInteger('statusprogramkerja_idstatusprogramkerja')->nullable()->unsigned();
            $table->bigInteger('lock')->nullable();


            // $table->foreign('statusprogramkerja_idstatusprogramkerja')->references('id')->on('statusprogramkerja')
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
