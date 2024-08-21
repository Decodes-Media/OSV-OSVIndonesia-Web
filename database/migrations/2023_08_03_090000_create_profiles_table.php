<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('title', 512);
            $table->string('slug', 512)->unique();
            $table->string('photo_path');
            $table->text('excerpt');
            $table->text('content');
            $table->string('status')->index();
            $table->boolean('is_published')->nullable()->default(false);
            $table->timestamp('published_at')->nullable();
            $table->foreignUlid('published_by')->nullable()->constrained('admins');
            $table->bigInteger('views_count')->default(0);
            $table->text('internal_note')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
