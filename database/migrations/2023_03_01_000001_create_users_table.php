<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->text('avatar_path')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('password_updated_at')->nullable();
            $table->string('address', 512)->nullable();
            $table->string('province_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('about', 2048)->nullable();
            $table->rememberToken();
            $table->string('registration_token')->nullable();
            $table->timestamp('registration_complete_at')->nullable();
            $table->boolean('is_old_member')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_active_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
