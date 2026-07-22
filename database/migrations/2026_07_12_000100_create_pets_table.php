<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 140)->unique();
            $table->enum('animal_type', ['dog', 'cat']);
            $table->string('breed', 100)->nullable()->index();
            $table->date('date_of_birth')->nullable();
            $table->enum('age_group', ['baby', 'young', 'adult', 'senior'])->index();
            $table->enum('gender', ['male', 'female', 'unknown'])->index();
            $table->enum('status', ['available', 'adopted', 'fostered'])->default('available')->index();
            $table->boolean('is_spayed_neutered')->default(false);
            $table->boolean('is_vaccinated')->default(false);
            $table->text('health_info')->nullable();
            $table->text('description');
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['animal_type', 'status', 'is_published']);
        });

        Schema::create('pet_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->string('alt_text', 160)->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
            $table->index(['pet_id', 'is_primary']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_images');
        Schema::dropIfExists('pets');
    }
};
