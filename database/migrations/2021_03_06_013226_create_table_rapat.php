<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRapat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_rapat', function (Blueprint $table) {
            $table->bigIncrements('idRapat');
            $table->string('namaRapat');
            $table->dateTime('WaktuRapat');
            $table->text('KeteranganRapat');
            $table->text('PesertaRapat');
            $table->text('NotulenRapat');
            $table->bigIncrements('lock');
            $table->text('Umpan');
            $table->text('MateriRapat');
            $table->text('Rekomendasi');
            $table->text('TindakLanjut');
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
        Schema::dropIfExists('table_rapat');
    }
}
