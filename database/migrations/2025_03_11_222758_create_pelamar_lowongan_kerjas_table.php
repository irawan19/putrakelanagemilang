<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelamar_lowongan_kerjas', function (Blueprint $table) {
            $table->id('id_pelamar_lowongan_kerjas');
            $table->bigInteger('lowongan_kerjas_id')->unsigned()->index()->nullable();
            $table->foreign('lowongan_kerjas_id')->references('id_lowongan_kerjas')->on('lowongan_kerjas')->onUpdate('set null')->onDelete('set null');
            $table->string('nama_lengkap_pelamar_lowongan_kerjas');
            $table->string('telepon_pelamar_lowongan_kerjas');
            $table->string('email_pelamar_lowongan_kerjas');
            $table->string('cv_lowongan_kerjas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar_lowongan_kerjas');
    }
};
