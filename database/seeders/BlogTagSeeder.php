<?php

namespace Database\Seeders;

use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Laravel', 'slug' => 'laravel', 'color' => 'red'],
            ['name' => 'PHP', 'slug' => 'php', 'color' => 'blue'],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'color' => 'yellow'],
            ['name' => 'React', 'slug' => 'react', 'color' => 'cyan'],
            ['name' => 'Vue.js', 'slug' => 'vuejs', 'color' => 'green'],
            ['name' => 'CSS', 'slug' => 'css', 'color' => 'blue'],
            ['name' => 'HTML', 'slug' => 'html', 'color' => 'orange'],
            ['name' => 'API', 'slug' => 'api', 'color' => 'purple'],
            ['name' => 'Database', 'slug' => 'database', 'color' => 'indigo'],
            ['name' => 'SEO', 'slug' => 'seo', 'color' => 'green'],
            ['name' => 'Performance', 'slug' => 'performance', 'color' => 'red'],
            ['name' => 'Security', 'slug' => 'security', 'color' => 'gray']
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }
    }
}