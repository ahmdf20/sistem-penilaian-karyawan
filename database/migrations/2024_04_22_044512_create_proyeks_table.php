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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nama_proyek');
            $table->string('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('deadline');
            $table->enum('status', ['selesai', 'revisi', 'review', 'proses', 'baru'])->default('baru');
            $table->dateTime('selesai')->nullable();
            $table->dateTime('revisi')->nullable();
            $table->dateTime('review')->nullable();
            $table->dateTime('proses')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
