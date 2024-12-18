<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('IDFasilitas');
            $table->string('NamaFasilitas');
            $table->decimal('HargaFasilitas', 10, 2);
            $table->text('Deskripsi');
            $table->text('Fasilitas');
            $table->string('Status');
            $table->decimal('Rating', 3, 2);
            $table->string('Gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
}
