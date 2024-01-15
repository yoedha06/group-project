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
        Schema::create('partai_politik', function (Blueprint $table) {
            $table->id('Id_Partai');
            $table->string('NamaPartai');
            $table->string('Ideologi');
            $table->integer('JumlahAnggota');
            $table->string('PemimpinPartai');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partai_politik');
    }
};
