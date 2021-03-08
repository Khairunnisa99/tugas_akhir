<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkertodoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prokertodoc', function (Blueprint $table) {
            $table->bigIncrements('idprokertodoc');
            $table->bigInteger('dokumen_idDokumen');
            $table->bigInteger('pelaksanaanprogram_idjpelaksanaanprogram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prokertodoc');
    }
}
