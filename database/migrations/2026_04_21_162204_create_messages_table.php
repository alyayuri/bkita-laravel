<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // RELASI KE KONSELING
            $table->foreignId('konseling_id')->constrained()->onDelete('cascade');

            // USER YANG KIRIM
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // ISI PESAN
            $table->text('message');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};