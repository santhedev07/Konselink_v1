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
        Schema::create('year_academics', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('semester')->nullable(); // Optional: Add semester field if needed
            $table->string('status')->default('active'); // Optional: Add status field to indicate if the year is active or not
            $table->string('description')->nullable(); // Optional: Add description field for additional information
            $table->foreignId('school_id')->constrained('school_data')->onDelete('restrict'); // Foreign key to school_data table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_academics');
    }
};
