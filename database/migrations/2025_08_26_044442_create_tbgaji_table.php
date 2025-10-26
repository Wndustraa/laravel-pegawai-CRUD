<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbgaji', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pegawai_id'); // 👈 Jangan pake foreignId()
        $table->foreign('pegawai_id')->references('id')->on('tbpegawai')->onDelete('cascade');
        $table->integer('jumlah_gaji');
        $table->integer('jumlah_lembur');
        $table->integer('potongan');
        $table->integer('gaji_diterima');
        $table->date('tanggal_gaji');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbgaji');
    }
};