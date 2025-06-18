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
        Schema::create('violation_data', function (Blueprint $table) {
            $table->id('violation_id');
            $table->string('violation_type'); // Type of violation (e.g., tardiness, absence)
            $table->foreignId('student_id')->constrained('student_data')->onDelete('restrict'); // Foreign key to student_data table
            $table->foreignId('point_id')->constrained('point_data')->onDelete('restrict'); // Foreign key to point_data table
            $table->date('violation_date')->nullable(); // Optional: Add date field for when the violation occurred
            $table->string('violation_description')->nullable(); // Optional: Add description field for additional information about the violation
            $table->string('input_by')->nullable(); // Optional: Add input_by field to
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_data');
    }
};
