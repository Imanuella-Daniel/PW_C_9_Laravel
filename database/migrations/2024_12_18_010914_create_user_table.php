<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('IDUser');
            $table->string('NamaDepan');
            $table->string('NamaBelakang');
            $table->string('Email')->unique();
            $table->string('NoTelepon');
            $table->string('Negara');
            $table->text('Alamat');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
