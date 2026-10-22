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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Primary Key otomatis
            $table->string('title'); // Contoh field untuk judul buku
            $table->string('author')->nullable(); // Contoh field untuk penulis buku (opsional)
            $table->text('description')->nullable(); // Contoh field untuk deskripsi buku
            $table->integer('publication_year')->nullable(); // Contoh field untuk tahun terbit
            $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
