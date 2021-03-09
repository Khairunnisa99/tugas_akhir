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
            $table->bigIncrements('id');
            $table->string('SubBabNomor')->nullable();
            $table->string('SubBabNama')->nullable();
            $table->string('SubBabStandard')->nullable();
            $table->text('SubBabDeskripsi')->nullable();
            $table->bigInteger('BabAkreditasi_idBabAkreditasi')->unsigned()->nullable();
            $table->bigInteger('periodeakreditasi_idperiodeakreditasi')->unsigned()->nullable();
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
        Schema::dropIfExists('subbab');
    }
}
