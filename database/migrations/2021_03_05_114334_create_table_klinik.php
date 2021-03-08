<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKlinik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_klinik', function (Blueprint $table) {
            $table->bigIncrements('idDokumen');
            $table->string('namaKlinik');
            $table->string('alamatKlinik');
            $table->string('webKlinik');
            $table->string('telponKlinik');
            $table->text('logo');
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
        Schema::dropIfExists('table_klinik');
    }
}
