<?php

namespace Database\Seeders;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BlogArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Panduan Lengkap Laravel 10: Fitur Terbaru dan Best Practices',
                'slug' => 'panduan-lengkap-laravel-10',
                'excerpt' => 'Pelajari fitur-fitur terbaru Laravel 10 dan bagaimana mengimplementasikan best practices dalam pengembangan aplikasi web modern.',
                'content' => $this->getLaravelContent(),
                'featured_image' => 'https://via.placeholder.com/800x400/1e293b/3b82f6?text=Laravel+10',
                'author_name' => 'Admin RBC',
                'author_avatar' => 'https://via.placeholder.com/40x40/3b82f6/ffffff?text=A',
                'blog_category_id' => 1,
                'read_time' => '8 menit',
                'views_count' => 150,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'tags' => ['Laravel', 'PHP', 'API']
            ],
            [
                'title' => 'Tren UI/UX Design 2024: Minimalism Meets Functionality',
                'slug' => 'tren-ui-ux-design-2024',
                'excerpt' => 'Eksplorasi tren desain terbaru yang menggabungkan estetika minimalis dengan fungsionalitas maksimal untuk pengalaman pengguna yang optimal.',
                'content' => $this->getDesignContent(),
                'featured_image' => 'https://via.placeholder.com/800x400/1e293b/8b5cf6?text=UI+UX+Design',
                'author_name' => 'Sarah Design',
                'author_avatar' => 'https://via.placeholder.com/40x40/8b5cf6/ffffff?text=S',
                'blog_category_id' => 2,
                'read_time' => '6 menit',
                'views_count' => 89,
                'is_published' => true,
                'published_at' => now()->subDays(8),
                'tags' => ['CSS', 'HTML', 'Performance']
            ],
            [
                'title' => 'SEO Strategy 2024: Optimasi Website untuk Mesin Pencari',
                'slug' => 'seo-strategy-2024',
                'excerpt' => 'Strategi SEO terkini untuk meningkatkan ranking website Anda di Google dengan teknik white-hat yang efektif dan sustainable.',
                'content' => $this->getSeoContent(),
                'featured_image' => 'https://via.placeholder.com/800x400/1e293b/10b981?text=SEO+Strategy',
                'author_name' => 'Marketing Team',
                'author_avatar' => 'https://via.placeholder.com/40x40/10b981/ffffff?text=M',
                'blog_category_id' => 3,
                'read_time' => '10 menit',
                'views_count' => 234,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'tags' => ['SEO', 'Performance']
            ],
            [
                'title' => 'Tutorial: Membuat API RESTful dengan Laravel dan Sanctum',
                'slug' => 'tutorial-api-laravel-sanctum',
                'excerpt' => 'Step-by-step tutorial lengkap untuk membuat API RESTful yang aman menggunakan Laravel Sanctum untuk autentikasi token-based.',
                'content' => $this->getApiContent(),
                'featured_image' => 'https://via.placeholder.com/800x400/1e293b/f59e0b?text=API+Tutorial',
                'author_name' => 'Dev Team',
                'author_avatar' => 'https://via.placeholder.com/40x40/f59e0b/ffffff?text=D',
                'blog_category_id' => 4,
                'read_time' => '15 menit',
                'views_count' => 312,
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'tags' => ['Laravel', 'API', 'Security']
            ]
        ];

        foreach ($articles as $articleData) {
            $tags = $articleData['tags'];
            unset($articleData['tags']);
            
            $article = BlogArticle::create($articleData);
            
            $tagIds = BlogTag::whereIn('name', $tags)->pluck('id');
            $article->tags()->attach($tagIds);
        }
    }

    private function getLaravelContent(): string
    {
        return '<h2>Fitur Terbaru Laravel 10</h2>
        <p>Laravel 10 membawa sejumlah peningkatan signifikan yang akan memudahkan developer dalam membangun aplikasi web yang robust dan scalable.</p>
        <h3>1. Process Interaction</h3>
        <p>Laravel 10 memperkenalkan Process Interaction yang memungkinkan Anda untuk berinteraksi dengan proses sistem operasi dengan cara yang lebih elegan.</p>
        <h3>2. Test Profiling</h3>
        <p>Fitur Test Profiling membantu developer mengidentifikasi test yang berjalan lambat.</p>';
    }

    private function getDesignContent(): string
    {
        return '<h2>Tren Design 2024</h2>
        <p>Tahun 2024 membawa tren design yang fokus pada minimalism dan functionality.</p>
        <h3>Minimalist Design</h3>
        <p>Less is more - prinsip ini semakin relevan dalam design modern.</p>';
    }

    private function getSeoContent(): string
    {
        return '<h2>SEO Strategy Modern</h2>
        <p>SEO di tahun 2024 lebih fokus pada user experience dan content quality.</p>
        <h3>Core Web Vitals</h3>
        <p>Google semakin memprioritaskan performa website dalam ranking.</p>';
    }

    private function getApiContent(): string
    {
        return '<h2>Membuat API dengan Laravel</h2>
        <p>Tutorial step-by-step membuat API RESTful yang aman dan scalable.</p>
        <h3>Setup Laravel Sanctum</h3>
        <p>Sanctum menyediakan sistem autentikasi yang ringan untuk SPA dan mobile apps.</p>';
    }
}