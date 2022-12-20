<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poin_mahasiswas', function (Blueprint $table) {
            $table->id('id_poin');
            $table->string('namaKegiatan');
            $table->string('kategori');
            $table->string('instansi');
            $table->date('tglKegiatan');
            $table->integer('semester');
            $table->string('bukti');
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
        Schema::dropIfExists('poin_mahasiswas');
    }
};
