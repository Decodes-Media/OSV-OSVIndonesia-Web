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
        Schema::create('company_document_downloads', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('fullname');
            $table->string('phone');
            $table->string('country');
            $table->string('company_name');
            $table->string('company_email')->nullable();
            $table->text('internal_note')->nullable();
            $table->text('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_document_downloads');
    }
};
