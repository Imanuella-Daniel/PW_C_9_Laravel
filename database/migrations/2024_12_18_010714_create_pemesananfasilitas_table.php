<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananfasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('pemesananfasilitas', function (Blueprint $table) {
            $table->id('IDFasilitas');
            $table->foreignId('NoTransaksi')->constrained('transaksi')->onDelete('cascade'); // Relasi dengan transaksi
            $table->string('NamaFasilitas');
            $table->text('Deskripsi');
            $table->decimal('Biaya', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesananfasilitas');
    }
}
