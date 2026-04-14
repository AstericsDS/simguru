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
            $table->uuid('id')->primary();
            $table->foreignUuid('admin_id')->constrained('users');
            $table->foreignUuid('campus_id')->constrained('campuses');
            $table->foreignUuid('building_id')->constrained('buildings');
            $table->string('name');
            $table->string('slug');
            $table->integer('floor');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->integer('capacity');
            $table->text('description')->nullable();
            $table->json('images_path')->nullable();
            $table->json('documents_path')->nullable();
            $table->json('inventory')->nullable();
            $table->enum('category', ['class', 'office', 'laboratory', 'general', 'open_space', 'internal_unj']);
            $table->boolean('rentable')->default(true);
            $table->boolean('show')->default(true);
            $table->softDeletes();
            $table->unique(['name', 'deleted_at']);
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
