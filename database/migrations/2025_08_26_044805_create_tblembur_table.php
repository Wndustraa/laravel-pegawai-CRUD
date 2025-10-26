<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tblembur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('tbpegawai')->onDelete('cascade');
            $table->string('bulan_lembur', 20);
            $table->integer('jumlah_lembur');
            $table->integer('total_uang_lembur');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblembur');
    }
};