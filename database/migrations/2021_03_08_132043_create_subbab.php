<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubbab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subbab', function (Blueprint $table) {
            $table->bigIncrements('idSubBab');
            $table->string('SubBabNomor');
            $table->string('SubBabNama');
            $table->string('SubBabStandard');
            $table->text('SubBabDeskripsi');
            $table->bigInteger('BabAkreditasi_idBabAkreditasi');
            $table->bigInteger('periodeakreditasi_idperiodeakreditasi');
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
        Schema::dropIfExists('subbab');
    }
}
