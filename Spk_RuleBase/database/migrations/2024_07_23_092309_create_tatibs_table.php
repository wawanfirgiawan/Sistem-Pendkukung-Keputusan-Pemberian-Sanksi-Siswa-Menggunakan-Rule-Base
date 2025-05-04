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
        Schema::create('tatibs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tatib')->unique();
            $table->string('item_tatib');
            $table->enum("kategori", ["RINGAN", "SEDANG", "BERAT"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tatibs');
    }
};
