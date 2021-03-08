<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProgramkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_programkerja', function (Blueprint $table) {
            $table->bigIncrements('idProgramkerja');
            $table->string('namaprogramKerja');
            $table->text('periode');
            $table->text('tipeProgram');
            $table->text('tanggalMulai');
            $table->text('tanggalBerakhir');
            $table->text('deskripsiprogramKerja');
            $table->text('status');
            
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
        Schema::dropIfExists('table_programkerja');
    }
}