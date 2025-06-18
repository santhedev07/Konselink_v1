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
        Schema::create('achievement_data', function (Blueprint $table) {
            $table->id('achievement_id');
            $table->foreignId('student_id')->constrained('student_data')->onDelete('restrict'); // Foreign key to student_data table
            $table->string('achievement_name');
            $table->string('achievement_description')->nullable();
            $table->date('achievement_date')->nullable(); // Optional: Add date field for when the achievement was received
            $table->string('achievement_type')->nullable(); // Optional: Add type field for categorizing achievements (e.g., academic, extracurricular)
            $table->string('achievement_level')->nullable(); // Optional: Add level field for categorizing achievements (e.g., local, national, international)
            $table->foreignId('point_id')->constrained('point_data')->onDelete('restrict'); // Foreign key to point_data table
            $table->string('achievement_certificate')->nullable(); // Optional: Add certificate field for storing achievement certificates or documents
            $table->string('input_by')->nullable(); // Optional: Add input_by field to track who added the achievement
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement_data');
    }
};
