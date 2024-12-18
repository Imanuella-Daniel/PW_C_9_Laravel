<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id('NoKamar');
            $table->string('TipeKamar');
            $table->integer('Kapasitas');
            $table->integer('JumlahKamar');
            $table->decimal('HargaKamar', 10, 2);
            $table->text('Desc');
            $table->text('Facility');
            $table->string('Status');
            $table->string('photo')->nullable();
            $table->decimal('Rating', 3, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
