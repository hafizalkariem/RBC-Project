<?php

namespace Database\Seeders;

use App\Models\BlogComment;
use App\Models\BlogArticle;
use Illuminate\Database\Seeder;

class BlogCommentSeeder extends Seeder
{
    public function run(): void
    {
        $articles = BlogArticle::all();

        $comments = [
            [
                'name' => 'John Developer',
                'email' => 'john@example.com',
                'comment' => 'Artikel yang sangat informatif! Laravel 10 memang membawa banyak peningkatan yang signifikan. Terima kasih untuk penjelasan yang detail.',
                'is_approved' => true
            ],
            [
                'name' => 'Sarah Ahmad',
                'email' => 'sarah@example.com',
                'comment' => 'Best practices yang dijelaskan sangat membantu. Saya akan coba implementasikan di proyek selanjutnya.',
                'is_approved' => true
            ],
            [
                'name' => 'Mike Wilson',
                'email' => 'mike@example.com',
                'comment' => 'Tutorial yang mudah diikuti. Apakah ada rencana untuk membuat tutorial lanjutan?',
                'is_approved' => true
            ],
            [
                'name' => 'Lisa Chen',
                'email' => 'lisa@example.com',
                'comment' => 'Penjelasan tentang SEO sangat komprehensif. Sangat membantu untuk optimasi website saya.',
                'is_approved' => true
            ]
        ];

        foreach ($articles as $article) {
            foreach ($comments as $index => $commentData) {
                if ($index < 2) {
                    $comment = BlogComment::create([
                        'blog_article_id' => $article->id,
                        'name' => $commentData['name'],
                        'email' => $commentData['email'],
                        'comment' => $commentData['comment'],
                        'is_approved' => $commentData['is_approved'],
                        'created_at' => now()->subDays(rand(1, 5))
                    ]);

                    // Add reply to first comment
                    if ($index === 0) {
                        BlogComment::create([
                            'blog_article_id' => $article->id,
                            'parent_id' => $comment->id,
                            'name' => 'Admin RBC',
                            'email' => 'admin@rbc.com',
                            'comment' => 'Terima kasih atas feedback positifnya! Kami akan terus berusaha memberikan konten berkualitas.',
                            'is_approved' => true,
                            'created_at' => now()->subDays(rand(1, 3))
                        ]);
                    }
                }
            }
        }
    }
}