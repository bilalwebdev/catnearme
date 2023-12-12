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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->foreignIdFor(\App\Models\Breed::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('keywords')->nullable();
            $table->string('pt')->nullable();
            $table->decimal('price' , 9)->nullable();
            $table->decimal('price_breeding' , 9)->nullable();
            $table->boolean('cb')->default(false);
            $table->boolean('pedigree')->default(false);
            $table->boolean('ns')->default(false);
            $table->dateTimeTz('ready')->nullable();
            $table->dateTimeTz('birthday')->nullable();
            $table->string('color')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->integer('renew')->default(0);
            $table->integer('views')->default(0);
            $table->enum('status' , ['active' , 'not_active' , 'locked'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
