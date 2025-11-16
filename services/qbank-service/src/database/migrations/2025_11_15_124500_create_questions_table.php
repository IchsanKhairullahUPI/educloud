<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by'); // user_id from auth service
            $table->string('subject_id')->nullable();
            $table->string('difficulty')->nullable(); // easy, medium, hard
            $table->string('type'); // MC, essay, true_false
            $table->text('question_text');

            $table->json('options')->nullable(); // Only for MC
            $table->string('answer')->nullable(); // Correct answer

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};