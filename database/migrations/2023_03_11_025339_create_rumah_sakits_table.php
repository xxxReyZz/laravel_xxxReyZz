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
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah_sakit');
    }
};
