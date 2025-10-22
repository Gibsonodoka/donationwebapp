<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('support_area'); // e.g. Medical, Food, Drone
            $table->string('amount');       // e.g. $25/week
            $table->string('crypto_type');  // BTC, ETH, USDT
            $table->string('wallet_address'); // wallet sent to
            $table->string('receipt_path')->nullable(); // uploaded proof
            $table->enum('status', ['pending', 'confirmed', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
