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
        Schema::create('layanan_details', function (Blueprint $table) {
            $table->id('id_layanan_details');
            $table->string('gambar_layanan_details');
            $table->string('icon_layanan_details');
            $table->string('judul_layanan_details');
            $table->longtext('konten_layanan_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_details');
    }
};
