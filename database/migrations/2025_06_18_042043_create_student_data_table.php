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
        Schema::create('student_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict'); // Foreign key to users table
            $table->string('name');
            $table->string('nomor_induk')->unique()->nullable();
            $table->string('description')->nullable(); // Optional: Add description field for additional information
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->string('address')->nullable(); // Optional: Add address field for additional information
            $table->foreignId('class_id')->constrained('class_data')->onDelete('restrict'); // Foreign key to class_data table
            $table->foreignId('year_academic_id')->constrained('year_academics')->onDelete('restrict'); // Foreign key to year_academics table
            $table->string('status')->default('active'); // Optional: Add status field to indicate if the student is active or not
            // You can add more fields as needed, such as date of birth,
            $table->foreignId('parent_id')->nullable()->constrained('parents_data')->onDelete('set null'); // Foreign key to parents_data table, nullable if no parent is linked
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_data');
    }
};
