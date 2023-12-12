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
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Pet::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('tica')->default(false);
            $table->boolean('acfa')->default(false);
            $table->boolean('ccc_nsw')->default(false);
            $table->boolean('cfa')->default(false);
            $table->boolean('gccf')->default(false);
            $table->boolean('wcf')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
