<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElemen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('SubSubBab_idSubSubBab')->nullable();
            $table->string('NoElemen')->nullable();
            $table->text('ElemenPenilaian')->nullable();
            $table->text('TelusurSasaran')->nullable();
            $table->text('MateriTelusur')->nullable();
            $table->text('DokumentInternal')->nullable();
            $table->text('DokumenEksternal')->nullable();
            $table->bigInteger('Skor')->nullable();
            $table->bigInteger('periodeakreditasi_idperiodeakreditasi')->nullable();
            $table->bigInteger('lock')->nullable();
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
        Schema::dropIfExists('elemen');
    }
}
