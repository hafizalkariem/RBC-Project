<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('featured_image');
            $table->string('author_name', 100);
            $table->string('author_avatar')->nullable();
            $table->foreignId('blog_category_id')->constrained()->onDelete('cascade');
            $table->string('read_time', 20);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            
            $table->index(['is_published', 'published_at']);
            $table->index('blog_category_id');
            $table->index('views_count');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_articles');
    }
};