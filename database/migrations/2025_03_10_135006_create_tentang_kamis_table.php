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
        Schema::create('tentang_kamis', function (Blueprint $table) {
            $table->id('id_tentang_kamis');
            $table->longtext('konten_sekilas_tentang_kamis');
            $table->longtext('konten_tentang_kamis');
            $table->longtext('konten_footer_tentang_kamis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kamis');
    }
};
