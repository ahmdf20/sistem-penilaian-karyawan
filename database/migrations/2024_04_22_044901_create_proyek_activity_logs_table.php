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
        Schema::create('proyek_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('proyek_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->text('log');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek_activity_logs');
    }
};
