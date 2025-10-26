<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbgolongan', function (Blueprint $table) {
            $table->id();
            $table->string('golongan_nama', 20);
            $table->integer('gaji_pokok');
            $table->integer('tunjangan_keluarga');
            $table->integer('tunjangan_transport');
            $table->integer('tunjangan_makan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbgolongan');
    }
};