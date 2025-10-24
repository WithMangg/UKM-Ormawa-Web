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
        Schema::create('recomendation', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('Adminukm_id'); // Tambahkan kolom ini
            $table->foreign('Adminukm_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('interest');
            $table->string('activity_type');
            $table->string('community_size');
            $table->string('preferred_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendation');
    }
};
