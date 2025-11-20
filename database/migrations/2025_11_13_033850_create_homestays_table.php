<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homestays', function (Blueprint $table) {
            $table->id('homestay_id');
            $table->unsignedBigInteger('pemilik_warga_id')->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->json('fasilitas_json')->nullable();
            $table->decimal('harga_per_malam', 12, 2);
            $table->string('status')->default('tersedia');
            $table->timestamps();

            // Foreign key ke tabel warga (opsional)
            $table->foreign('pemilik_warga_id')->references('warga_id')->on('warga')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homestays');
    }
};
