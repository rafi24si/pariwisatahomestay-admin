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
    Schema::create('kamar_homestay', function (Blueprint $table) {
        $table->id('kamar_id');
        $table->unsignedBigInteger('homestay_id');

        $table->string('nama_kamar');
        $table->integer('kapasitas')->default(1);
        $table->json('fasilitas_json')->nullable();
        $table->decimal('harga', 12, 2)->default(0);

        $table->timestamps();

        // Foreign Key
        $table->foreign('homestay_id')
              ->references('homestay_id')
              ->on('homestay')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar_homestay');
    }
};
