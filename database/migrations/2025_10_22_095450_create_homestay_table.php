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
        Schema::create('homestay', function (Blueprint $table) {
    $table->id('homestay_id');
    $table->string('nama');
    $table->text('deskripsi')->nullable();
    $table->string('alamat')->nullable();
    $table->string('kontak', 50)->nullable();
    $table->decimal('harga_per_malam', 10, 2)->nullable();
    $table->text('fasilitas')->nullable();
    $table->string('media')->nullable();
    $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homestay');
    }
};
