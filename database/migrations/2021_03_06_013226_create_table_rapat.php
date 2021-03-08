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
            $table->dateTime('waktuRapat');
            $table->text('agendaRapat');
            $table->text('pesertaRapat');
            $table->text('notulenRapat');
            $table->text('materiRapat');
            $table->text('rekomendasi');
            $table->text('tindakLanjut');
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