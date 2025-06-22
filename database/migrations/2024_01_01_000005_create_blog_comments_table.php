<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_article_id')->constrained()->onDelete('cascade');
            $table->string('name', 100);
            $table->string('email', 150);
            $table->text('comment');
            $table->boolean('is_approved')->default(false);
            $table->foreignId('parent_id')->nullable()->constrained('blog_comments')->onDelete('cascade');
            $table->timestamps();
            
            $table->index(['blog_article_id', 'is_approved']);
            $table->index('parent_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};