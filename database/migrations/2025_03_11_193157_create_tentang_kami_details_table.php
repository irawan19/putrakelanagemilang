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
        Schema::create('tentang_kami_details', function (Blueprint $table) {
            $table->id('id_tentang_kami_details');
            $table->string('icon_tentang_kami_details');
            $table->string('judul_tentang_kami_details');
            $table->longtext('konten_tentang_kami_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami_details');
    }
};
