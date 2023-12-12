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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->foreignIdFor(\App\Models\Breed::class)->default(1)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('gender')->default('male');
            $table->string('age')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('sire')->nullable();
            $table->string('dam')->nullable();
            $table->string('awards')->nullable();
            $table->enum('type' , ['parent' , 'sibling' , 'grandparents'])->default('parent');
            $table->enum('who', ['father' , 'mother' , 'brother' , 'sister'])->default('father');
            $table->longText('health')->nullable();
            $table->longText('achievements_certificates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
