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
        Schema::create('results', function (Blueprint $table) {
            $table->increments('idpart');
            $table->unsignedInteger('id');
            $table->string('idquiz');
            $table->string('name', 45);
            $table->integer('result')->nullable();
            $table->timestamps();
        
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idquiz')->references('idquiz')->on('quizzes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
