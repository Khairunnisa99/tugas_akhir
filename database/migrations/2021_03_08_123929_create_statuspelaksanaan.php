<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatuspelaksanaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuspelaksanaan', function (Blueprint $table) {
            $table->bigIncrements('idstatuspelaksanaan');
            $table->bigInteger('statusPelaksanaan');
            $table->text('keteranganStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuspelaksanaan');
    }
}
