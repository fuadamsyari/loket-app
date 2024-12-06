<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('antreans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_antrean');
            $table->foreignId('loket_id')->constrained('lokets')->onDelete('cascade'); // Menjadi foreign key ke tabel 'lokets'
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu'); // 3 kondisi antrean
            $table->timestamp('waktu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antreans');
    }
};
