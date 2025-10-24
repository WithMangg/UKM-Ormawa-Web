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
        Schema::create('rekomawa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('AdminOrmawa_id'); // Tambahkan kolom ini
            $table->foreign('AdminOrmawa_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('question1');
            $table->string('question2');
            $table->string('question3');
            $table->string('question4');
            $table->string('question5');
            $table->string('question6');
            $table->string('question7');
            $table->string('question8');
            $table->string('question9');
            $table->string('question10');
            $table->string('question11');
            $table->string('question12');
            $table->string('question13');
            $table->string('question14');
            $table->string('question15');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomawa');
    }
};
