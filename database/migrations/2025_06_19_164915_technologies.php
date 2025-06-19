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
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tech_category_id')->constrained('tech_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('logo_url')->nullable();
            $table->tinyInteger('expertise_level')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
