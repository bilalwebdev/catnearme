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
        Schema::create('vactinations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Pet::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('fnv')->default(false);
            $table->boolean('fcv')->default(false);
            $table->boolean('fpv')->default(false);
            $table->boolean('rabies')->default(false);
            $table->boolean('felv')->default(false);
            $table->boolean('chlamydia')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vactinations');
    }
};
