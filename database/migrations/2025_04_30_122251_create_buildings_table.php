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
        Schema::create('buildings', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('admin_id')->nullable()->constrained('users');
            $table->foreignUlid('campus_id')->nullable()->constrained('campuses');
            $table->string('name')->nullable();
            $table->integer('floor')->nullable();
            $table->text('description')->nullable();
            $table->string('images_path')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
