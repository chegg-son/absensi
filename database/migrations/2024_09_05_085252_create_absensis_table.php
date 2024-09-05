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

            $table->foreignId('nip_id')->constrained();
            $table->datetimes('checkout1');
            $table->datetimes('checkin1');
            $table->datetimes('checkout2');
            $table->datetimes('checkin2');
            $table->datetimes('checkout3');
            $table->datetimes('checkin3');

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
