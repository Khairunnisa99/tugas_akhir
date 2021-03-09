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
            $table->bigInteger('SubSubBab_idSubSubBab');
            $table->string('NoElemen');
            $table->text('ElemenPenilaian');
            $table->text('TelusurSasaran');
            $table->text('MateriTelusur');
            $table->text('DokumentInternal');
            $table->text('DokumenEksternal');
            $table->bigInteger('Skor');
            $table->bigInteger('periodeakreditasi_idperiodeakreditasi');
            $table->bigInteger('lock');
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
