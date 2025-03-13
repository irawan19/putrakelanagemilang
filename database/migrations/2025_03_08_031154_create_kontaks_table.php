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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id('id_kontaks');
            $table->string('text1_kontaks');
            $table->string('text2_kontaks');
            $table->string('gambar_kontaks');
            $table->string('telepon_kontaks');
            $table->string('email_kontaks');
            $table->string('alamat_kontaks');
            $table->string('url_alamat_kontaks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
