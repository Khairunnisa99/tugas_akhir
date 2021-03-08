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
            $table->bigIncrements('idBabAkreditasi');
            $table->string('NomorBab');
            $table->string('KodeBab');
            $table->string('NamaBab');
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
        Schema::dropIfExists('babakreditasi');
    }
}
