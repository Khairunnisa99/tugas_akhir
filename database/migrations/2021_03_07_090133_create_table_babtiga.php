<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBabtiga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_babtiga', function (Blueprint $table) {
            $table->bigIncrements('idBabtiga');
            $table->string('id_standar');
            $table->string('nomorKriteria');
            $table->text('namaKriteria');
            $table->text('maksudTujuan');
            
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
        Schema::dropIfExists('table_babtiga');
    }
}