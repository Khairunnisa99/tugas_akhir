<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBabdua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_babdua', function (Blueprint $table) {
            $table->bigIncrements('idBabdua');
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
        Schema::dropIfExists('table_babdua');
    }
}