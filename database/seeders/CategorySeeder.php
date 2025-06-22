<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Dashboard Admin', 'slug' => 'dashboard-admin', 'icon' => 'fas fa-tachometer-alt', 'description' => 'Template dashboard untuk admin panel'],
            ['name' => 'Website UMKM', 'slug' => 'website-umkm', 'icon' => 'fas fa-store', 'description' => 'Template website untuk usaha kecil menengah'],
            ['name' => 'Portfolio', 'slug' => 'portfolio', 'icon' => 'fas fa-user', 'description' => 'Template portfolio personal dan profesional'],
            ['name' => 'E-Commerce', 'slug' => 'e-commerce', 'icon' => 'fas fa-shopping-cart', 'description' => 'Template toko online dan marketplace'],
            ['name' => 'Landing Page', 'slug' => 'landing-page', 'icon' => 'fas fa-rocket', 'description' => 'Template halaman landing untuk marketing'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}