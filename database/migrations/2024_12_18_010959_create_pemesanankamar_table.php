<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananKamarTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanankamar', function (Blueprint $table) {
            $table->id('IDPesanan');
            $table->foreignId('NoTransaksi')->constrained('transaksi')->onDelete('cascade');
            $table->string('NoKamar');
            $table->date('TanggalPesan');
            $table->integer('JumlahDewasa');
            $table->integer('JumlahAnak');
            $table->text('PermintaanKhusus');
            $table->date('TanggalCheckIn');
            $table->date('TanggalCheckOut');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanankamar');
    }
}
