<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('tech_stack')->nullable(); // Laravel, MySQL, dll
            $table->string('screenshot')->nullable();
            $table->string('video_link')->nullable(); // YouTube link
            $table->string('demo_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('status')->default('Selesai'); // Selesai, Development, Mencari Kolaborasi
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};