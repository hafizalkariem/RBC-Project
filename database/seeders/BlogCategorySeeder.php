<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Artikel tentang pengembangan web dan teknologi terkini',
                'color' => 'blue',
                'is_active' => true
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'design',
                'description' => 'Tips dan tren desain antarmuka pengguna',
                'color' => 'purple',
                'is_active' => true
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Strategi pemasaran digital dan SEO',
                'color' => 'green',
                'is_active' => true
            ],
            [
                'name' => 'Tutorial',
                'slug' => 'tutorial',
                'description' => 'Tutorial step-by-step untuk developer',
                'color' => 'yellow',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}