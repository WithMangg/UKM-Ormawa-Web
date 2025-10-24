<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('nim')->unique(); 
            $table->string('email')->unique(); 
            $table->string('phone')->nullable(); 
            $table->string('study_program');
            $table->year('entry_year'); 
            $table->enum('gender', ['Male', 'Female']);
            $table->text('reason');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
