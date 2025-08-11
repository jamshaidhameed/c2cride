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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default(null)->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('display_name')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->enum('social_provider', ['email', 'google', 'facebook'])->default('email')->nullable();
            $table->string('facebook_id')->nullable()->default(null)->nullable();
            $table->string('google_id')->nullable()->default(null)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('login_via')->default(null)->comment('1-normal,2-google,3-facebook')->nullable();
            $table->integer('role_id')->unsigned()->nullable()->default(2);
            $table->string('password_reset_code', 4)->nullable()->default('');
            $table->string('password');
            $table->boolean('notifications')->default(false)->nullable();
            $table->boolean('news')->default(false)->nullable();
            $table->boolean('terms')->default(false)->nullable();
            $table->boolean('is_verified')->default(false)->nullable();
            $table->enum('status', ['block', 'active'])->default('active')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
