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
        Schema::create('pertanyaan_umums', function (Blueprint $table) {
            $table->id('id_pertanyaan_umums');
            $table->longtext('pertanyaan_pertanyaan_umums');
            $table->longtext('jawaban_pertanyaan_umums');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_umums');
    }
};
