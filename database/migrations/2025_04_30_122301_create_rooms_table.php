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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('campus_id')->constrained('campuses');
            $table->foreignId('building_id')->constrained('buildings');
            $table->string('name')->unique();
            $table->string('slug');
            $table->integer('floor');
            $table->integer('area');
            $table->integer('capacity');
            $table->text('description');
            $table->json('images_path')->nullable();
            $table->json('documents_path')->nullable();
            $table->json('inventory')->nullable();
            $table->enum('category', ['class', 'office', 'laboratory', 'rentable', 'non_rentable']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
