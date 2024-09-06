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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->datetime('checkout1')->nullable();
            $table->datetime('checkin1')->nullable();
            $table->datetime('checkout2')->nullable();
            $table->datetime('checkin2')->nullable();
            $table->datetime('checkout3')->nullable();
            $table->datetime('checkin3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
