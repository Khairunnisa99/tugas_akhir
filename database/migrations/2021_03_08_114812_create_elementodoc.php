<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementodoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementodoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('elemen_idElemen')->nullable();
            $table->bigInteger('Dokumen_idDokumen')->nullable();
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
        Schema::dropIfExists('elementodoc');
    }
}
