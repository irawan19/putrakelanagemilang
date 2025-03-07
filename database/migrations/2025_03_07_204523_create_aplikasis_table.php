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
        Schema::create('aplikasis', function (Blueprint $table) {
            $table->id('id_aplikasis');
            $table->string('nama_aplikasis');
            $table->string('email_aplikasis');
            $table->string('telepon_aplikasis');
            $table->string('deskripsi_aplikasis');
            $table->string('keyword_aplikasis');
            $table->string('icon_aplikasis');
            $table->string('logo_aplikasis');
            $table->string('logo_text_aplikasis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplikasis');
    }
};
