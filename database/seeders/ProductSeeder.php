<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Dashboard Admin
            [
                'name' => 'Dashboard Admin Modern',
                'description' => 'Dashboard responsif dengan UI/UX modern, chart interaktif, dan fitur lengkap untuk manajemen data.',
                'price' => 250000,
                'original_price' => 350000,
                'image_url' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400&h=250&fit=crop&crop=center',
                'category_id' => 1,
                'status' => 'hot',
                'technologies' => ['HTML5', 'CSS3', 'JavaScript']
            ],
            [
                'name' => 'Admin Panel Laravel',
                'description' => 'Admin panel lengkap dengan Laravel, authentication, role management, dan CRUD generator.',
                'price' => 320000,
                'original_price' => 450000,
                'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=250&fit=crop&crop=center',
                'category_id' => 1,
                'status' => 'premium',
                'technologies' => ['PHP', 'MySQL', 'JavaScript']
            ],
            [
                'name' => 'React Admin Dashboard',
                'description' => 'Dashboard admin dengan React.js, Redux, Material-UI, dan integrasi API yang powerful.',
                'price' => 380000,
                'original_price' => null,
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=250&fit=crop&crop=center',
                'category_id' => 1,
                'status' => 'best',
                'technologies' => ['React.js', 'Node.js', 'MongoDB']
            ],
            
            // Website UMKM
            [
                'name' => 'Website UMKM Complete',
                'description' => 'Template website lengkap untuk UMKM dengan sistem katalog, kontak, dan landing page yang converting.',
                'price' => 180000,
                'original_price' => null,
                'image_url' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=250&fit=crop&crop=center',
                'category_id' => 2,
                'status' => 'premium',
                'technologies' => ['CSS3', 'PHP']
            ],
            [
                'name' => 'Toko Online UMKM',
                'description' => 'Website toko online untuk UMKM dengan keranjang belanja, payment gateway, dan manajemen produk.',
                'price' => 280000,
                'original_price' => 350000,
                'image_url' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=250&fit=crop&crop=center',
                'category_id' => 2,
                'status' => 'hot',
                'technologies' => ['PHP', 'MySQL', 'JavaScript']
            ],
            [
                'name' => 'Landing Page Bisnis',
                'description' => 'Landing page modern untuk bisnis dengan conversion optimization dan WhatsApp integration.',
                'price' => 120000,
                'original_price' => 180000,
                'image_url' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=400&h=250&fit=crop&crop=center',
                'category_id' => 2,
                'status' => null,
                'technologies' => ['HTML5', 'CSS3', 'JavaScript']
            ],
            
            // Portfolio
            [
                'name' => 'Portfolio Personal Pro',
                'description' => 'Template portfolio modern dengan animasi smooth, responsive design, dan optimized untuk SEO.',
                'price' => 150000,
                'original_price' => 200000,
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=250&fit=crop&crop=center',
                'category_id' => 3,
                'status' => 'best',
                'technologies' => ['React.js', 'CSS3']
            ],
            [
                'name' => 'Portfolio Developer',
                'description' => 'Portfolio khusus developer dengan showcase project, skill timeline, dan contact form.',
                'price' => 200000,
                'original_price' => null,
                'image_url' => 'https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?w=400&h=250&fit=crop&crop=center',
                'category_id' => 3,
                'status' => 'premium',
                'technologies' => ['Vue.js', 'CSS3', 'Node.js']
            ],
            [
                'name' => 'Creative Portfolio',
                'description' => 'Portfolio kreatif untuk designer dan artist dengan gallery interaktif dan animasi menarik.',
                'price' => 175000,
                'original_price' => 250000,
                'image_url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=250&fit=crop&crop=center',
                'category_id' => 3,
                'status' => 'hot',
                'technologies' => ['HTML5', 'CSS3', 'JavaScript']
            ],
            
            // E-Commerce
            [
                'name' => 'E-Commerce Full Stack',
                'description' => 'Platform e-commerce lengkap dengan multi-vendor, payment gateway, dan admin dashboard.',
                'price' => 450000,
                'original_price' => 650000,
                'image_url' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=250&fit=crop&crop=center',
                'category_id' => 4,
                'status' => 'premium',
                'technologies' => ['PHP', 'MySQL', 'React.js']
            ],
            [
                'name' => 'Marketplace Script',
                'description' => 'Script marketplace dengan sistem vendor, commission, rating review, dan payment integration.',
                'price' => 520000,
                'original_price' => 750000,
                'image_url' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=250&fit=crop&crop=center',
                'category_id' => 4,
                'status' => 'best',
                'technologies' => ['PHP', 'MySQL', 'JavaScript']
            ],
            [
                'name' => 'Mini E-Commerce',
                'description' => 'E-commerce sederhana untuk startup dengan fitur essential dan mudah dikustomisasi.',
                'price' => 280000,
                'original_price' => null,
                'image_url' => 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=400&h=250&fit=crop&crop=center',
                'category_id' => 4,
                'status' => 'hot',
                'technologies' => ['PHP', 'MySQL', 'CSS3']
            ],
            
            // Landing Page
            [
                'name' => 'Landing Page SaaS',
                'description' => 'Landing page untuk produk SaaS dengan pricing table, testimonial, dan conversion optimization.',
                'price' => 220000,
                'original_price' => 300000,
                'image_url' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=400&h=250&fit=crop&crop=center',
                'category_id' => 5,
                'status' => 'premium',
                'technologies' => ['HTML5', 'CSS3', 'JavaScript']
            ],
            [
                'name' => 'Landing Page App',
                'description' => 'Landing page untuk mobile app dengan app store links, screenshot gallery, dan feature showcase.',
                'price' => 180000,
                'original_price' => 250000,
                'image_url' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&h=250&fit=crop&crop=center',
                'category_id' => 5,
                'status' => 'hot',
                'technologies' => ['HTML5', 'CSS3', 'JavaScript']
            ],
            [
                'name' => 'Corporate Landing',
                'description' => 'Landing page corporate dengan design profesional, contact form, dan company profile.',
                'price' => 160000,
                'original_price' => null,
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=250&fit=crop&crop=center',
                'category_id' => 5,
                'status' => null,
                'technologies' => ['HTML5', 'CSS3', 'PHP']
            ],
        ];

        foreach ($products as $productData) {
            $technologies = $productData['technologies'];
            unset($productData['technologies']);
            
            $product = Product::create($productData);
            
            foreach ($technologies as $techName) {
                $technology = Technology::where('name', $techName)->first();
                if ($technology) {
                    $product->technologies()->attach($technology->id);
                }
            }
        }
    }
}