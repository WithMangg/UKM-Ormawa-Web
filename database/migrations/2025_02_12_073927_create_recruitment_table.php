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
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nim');
            $table->string('email');
            $table->string('phone');
            $table->string('study_program');
            $table->string('semester');
            $table->string('gender');
            $table->string('reason');
            $table->string('photo');
            $table->unsignedBigInteger('Adminukm_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('Adminukm_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment');
    }
};
