<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('support_area');
            $table->string('contribution_amount');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_subscriptions');
    }
};
