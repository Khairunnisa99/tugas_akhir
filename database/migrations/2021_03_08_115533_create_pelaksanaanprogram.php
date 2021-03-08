<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaksanaanprogram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaksanaanprogram', function (Blueprint $table) {
            $table->bigIncrements('idjpelaksanaanprogram');
            $table->bigInteger('programkerja_idprogramkerja');
            $table->bigInteger('typepelaksanaan_idtypepelaksanaan');
            $table->string('NamaPelaksanaan');
            $table->date('TanggalMulai');
            $table->date('TanggalBerakhir');
            $table->text('KeteranganPelaksanaan');
            $table->bigInteger('statuspelaksanaan_idstatuspelaksanaan');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');
            $table->bigInteger('lock');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaksanaanprogram');
    }
}
