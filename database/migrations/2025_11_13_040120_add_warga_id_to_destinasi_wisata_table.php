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
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->unsignedBigInteger('warga_id')->after('destinasi_id')->nullable();
            $table->string('fasilitas')->nullable();

            $table->foreign('warga_id')
                ->references('warga_id')
                ->on('warga')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->dropForeign(['warga_id']);
            $table->dropColumn(['warga_id', 'fasilitas']);
        });
    }
};
