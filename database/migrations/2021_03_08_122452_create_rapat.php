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
            $table->bigIncrements('idrapat');
            $table->string('namaRapat');
            $table->dateTime('WaktuRapat');
            $table->text('KeteranganRapat');
            $table->text('PesertaRapat');
            $table->text('NotulenRapat');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');
            $table->bigInteger('lock');
            $table->text('Umpan');
            $table->text('MateriRapat');
            $table->text('Rekomendasi');
            $table->text('TindakLanjut');

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
