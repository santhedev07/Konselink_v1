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
        Schema::create('point_data', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Category of the point (e.g., achivement, violation)
            $table->string('level'); // Level of the point (e.g., minor, major)
            $table->bigInteger('points'); // Points value for the category
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_data');
    }
};
