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
        Schema::create('projects', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->unique();
            $table->string('location');
            $table->text('image1_path');
            $table->text('image2_path');
            $table->text('image3_path');
            $table->text('image4_path')->nullable();
            $table->text('image5_path')->nullable();
            $table->text('image6_path')->nullable();
            $table->text('image7_path')->nullable();
            $table->text('image8_path')->nullable();
            $table->text('image9_path')->nullable();
            $table->text('image10_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
