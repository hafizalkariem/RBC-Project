<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BlogCategorySeeder::class,
            BlogTagSeeder::class,
            BlogArticleSeeder::class,
            BlogCommentSeeder::class,
        ]);
    }
}