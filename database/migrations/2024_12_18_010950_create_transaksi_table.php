<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('NoTransaksi');
            $table->foreignId('IDUser')->constrained('user')->onDelete('cascade');
            $table->dateTime('TanggalPembayaran');
            $table->string('MetodePembayaran');
            $table->string('NoKartu');
            $table->decimal('BiayaKamar', 10, 2);
            $table->string('Status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
