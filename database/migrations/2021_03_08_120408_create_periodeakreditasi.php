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
            $table->bigIncrements('idperiodeakreditasi');
            $table->string('namaPeriodeAkreditasi');
            $table->string('tahunProgramAkreditasi');
            $table->date('TanggalMulai');
            $table->date('TanggalBerakhir');
            $table->tinyInteger('periodeakreditasicStatus');
            $table->text('deskripsiPeriodeAkreditasi');
            $table->bigInteger('lock');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');

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
