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
            $table->id();
            $table->string('name')->nullable();
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->foreignIdFor(\App\Models\Country::class)->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Plan::class)->default(1)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('program_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->longText('about_me')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type' , ['breeder' , 'client'])->default('client');
            $table->enum('status' , ['active' , 'not_active' , 'suspended', 'locked'])->default('active');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('is_verify')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
