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
            $table->bigIncrements('idSubSubBab');
            $table->bigInteger('SubBab_idSubBab');
            $table->string('NomerKriteria');
            $table->string('MaksudDanTujuan');
            $table->bigInteger('Skor');;
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
        Schema::dropIfExists('subsubbab');
    }
}
