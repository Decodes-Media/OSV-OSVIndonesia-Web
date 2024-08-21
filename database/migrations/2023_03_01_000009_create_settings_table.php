<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @see https://github.com/spatie/laravel-settings/blob/main/UPGRADING.md
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table): void {
            $table->id();
            $table->string('group')->index();
            $table->string('name');
            $table->boolean('locked');
            $table->json('payload');
            $table->timestamps();
        });

        Schema::table('settings', function (Blueprint $table): void {
            $table->boolean('locked')->default(false)->change();
            $table->unique(['group', 'name']);
            $table->dropIndex(['group']);
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table): void {
            $table->boolean('locked')->default(null)->change();
            $table->dropUnique(['group', 'name']);
            $table->index('group');
        });

        Schema::dropIfExists('settings');
    }
};
