<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaRapat')->nullable();
            $table->dateTime('WaktuRapat')->nullable();
            $table->text('KeteranganRapat')->nullable();
            $table->text('PesertaRapat')->nullable();
            $table->text('NotulenRapat')->nullable();
            $table->bigInteger('lock')->nullable();
            $table->text('Umpan')->nullable();
            $table->text('MateriRapat')->nullable();
            $table->text('Rekomendasi')->nullable();
            $table->text('TindakLanjut')->nullable();
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
        Schema::dropIfExists('rapat');
    }
}
