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
        Schema::create('HasilPemilihan', function (Blueprint $table) {
            $table->id('Id_HasilPemilihan');
            $table->unsignedBigInteger('Id_Pemilih');
            $table->unsignedBigInteger('Id_Kandidat');
            $table->timestamps();

            $table->foreign('Id_Pemilih')->references('Id_Pemilih')->on('pemilih');
            $table->foreign('Id_Kandidat')->references('Id_Kandidat')->on('kandidat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HasilPemilihan');
    }
};
