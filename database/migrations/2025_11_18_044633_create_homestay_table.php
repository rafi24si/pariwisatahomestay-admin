<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('homestay', function (Blueprint $table) {
        $table->id('homestay_id');
        $table->unsignedBigInteger('pemilik_warga_id')->nullable();
        $table->string('nama');
        $table->string('alamat')->nullable();
        $table->string('rt', 10)->nullable();
        $table->string('rw', 10)->nullable();
        $table->json('fasilitas_json')->nullable();
        $table->decimal('harga_per_malam', 12, 2)->default(0);
        $table->string('status')->default('aktif');
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
