<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabakreditasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babakreditasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NomorBab')->nullable();
            $table->string('KodeBab')->nullable();
            $table->string('NamaBab')->nullable();
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
        Schema::dropIfExists('babakreditasi');
    }
}
