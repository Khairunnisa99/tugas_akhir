<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubbab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubbab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_subbab')->unsigned();
            $table->string('NomerKriteria')->nullable();
            $table->string('namaKriteria')->nullable();
            $table->string('MaksudDanTujuan')->nullable();
          
            $table->bigInteger('Skor')->nullable();
            $table->bigInteger('periodeakreditasi_idperiodeakreditasi')->nullable();
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
        Schema::dropIfExists('subsubbab');
    }
}
