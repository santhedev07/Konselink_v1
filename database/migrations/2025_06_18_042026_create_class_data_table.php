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
        Schema::create('class_data', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('major')->nullable(); // Optional: Add major field if needed
            $table->string('grade')->nullable(); // Optional: Add grade field if needed
            $table->foreignId('year_academic_id')->constrained('year_academics')->onDelete('restrict'); // Foreign key to year_academics table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_data');
    }
};
