<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementodoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementodoc', function (Blueprint $table) {
            $table->bigIncrements('idElemenToDoc');
            $table->bigInteger('elemen_idElemen');
            $table->bigInteger('Dokumen_idDokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementodoc');
    }
}
