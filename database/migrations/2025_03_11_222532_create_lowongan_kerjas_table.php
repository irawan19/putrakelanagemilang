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
        Schema::create('lowongan_kerjas', function (Blueprint $table) {
            $table->id('id_lowongan_kerjas');
            $table->string('judul_lowongan_kerjas');
            $table->longtext('konten_lowongan_kerjas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_kerjas');
    }
};
