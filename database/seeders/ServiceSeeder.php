<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\ServiceFeature;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kategori utama (bisa dikembangkan sesuai kebutuhan)
        $webCategory = ServiceCategory::create([
            'name' => 'Web & Digital',
            'order' => 1,
        ]);

        // 2. Data layanan utama
        $services = [
            [
                'name' => 'Website E-Learning',
                'slug' => 'website-e-learning',
                'icon' => 'fa-graduation-cap',
                'description' => 'Platform pembelajaran online lengkap dengan sistem manajemen kursus, video streaming, quiz interaktif, dan sertifikat digital untuk institusi pendidikan modern.',
                'order' => 1,
                'features' => [
                    ['feature' => 'LMS (Learning Management System)', 'icon' => 'fa-book'],
                    ['feature' => 'Video Streaming Integration', 'icon' => 'fa-play-circle'],
                    ['feature' => 'Progress Tracking & Analytics', 'icon' => 'fa-chart-line'],
                    ['feature' => 'Digital Certificate System', 'icon' => 'fa-certificate'],
                    ['feature' => 'Multi-language Support', 'icon' => 'fa-globe'],
                ],
            ],
            [
                'name' => 'Landing Page UMKM',
                'slug' => 'landing-page-umkm',
                'icon' => 'fa-store',
                'description' => 'Desain landing page yang menarik dan conversion-focused untuk UMKM, dilengkapi dengan katalog produk, form pemesanan, dan integrasi WhatsApp Business.',
                'order' => 2,
                'features' => [
                    ['feature' => 'Responsive Mobile Design', 'icon' => 'fa-mobile-alt'],
                    ['feature' => 'WhatsApp Business Integration', 'icon' => 'fa-whatsapp'],
                    ['feature' => 'SEO Optimized Content', 'icon' => 'fa-search'],
                    ['feature' => 'Fast Loading Speed', 'icon' => 'fa-bolt'],
                    ['feature' => 'Social Media Integration', 'icon' => 'fa-share-alt'],
                ],
            ],
            [
                'name' => 'Website Company Profile',
                'slug' => 'website-company-profile',
                'icon' => 'fa-building',
                'description' => 'Website profesional untuk meningkatkan kredibilitas perusahaan dengan desain elegan, portfolio showcase, dan sistem manajemen konten yang mudah digunakan.',
                'order' => 3,
                'features' => [
                    ['feature' => 'Custom Professional Design', 'icon' => 'fa-paint-brush'],
                    ['feature' => 'Content Management System', 'icon' => 'fa-edit'],
                    ['feature' => 'Portfolio & Gallery', 'icon' => 'fa-images'],
                    ['feature' => 'Contact Form Integration', 'icon' => 'fa-envelope'],
                    ['feature' => 'Google Maps Integration', 'icon' => 'fa-map-marker-alt'],
                ],
            ],
            [
                'name' => 'E-Commerce Website',
                'slug' => 'e-commerce-website',
                'icon' => 'fa-shopping-cart',
                'description' => 'Toko online lengkap dengan sistem pembayaran, manajemen produk, inventory tracking, dan dashboard admin untuk mengelola bisnis online Anda.',
                'order' => 4,
                'features' => [
                    ['feature' => 'Payment Gateway Integration', 'icon' => 'fa-credit-card'],
                    ['feature' => 'Inventory Management', 'icon' => 'fa-boxes'],
                    ['feature' => 'Order Tracking System', 'icon' => 'fa-truck'],
                    ['feature' => 'Customer Dashboard', 'icon' => 'fa-user-circle'],
                    ['feature' => 'Multi-vendor Support', 'icon' => 'fa-users'],
                ],
            ],
            [
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'icon' => 'fa-mobile-alt',
                'description' => 'Pengembangan aplikasi mobile native dan hybrid untuk iOS dan Android dengan performa optimal dan user experience yang menawan.',
                'order' => 5,
                'features' => [
                    ['feature' => 'Cross-platform Development', 'icon' => 'fa-code'],
                    ['feature' => 'Push Notification System', 'icon' => 'fa-bell'],
                    ['feature' => 'Offline Mode Support', 'icon' => 'fa-wifi'],
                    ['feature' => 'App Store Optimization', 'icon' => 'fa-star'],
                    ['feature' => 'Analytics Integration', 'icon' => 'fa-chart-bar'],
                ],
            ],
            [
                'name' => 'Source Code Premium',
                'slug' => 'source-code-premium',
                'icon' => 'fa-code',
                'description' => 'Koleksi source code aplikasi siap pakai untuk berbagai kebutuhan bisnis seperti POS, Inventory Management, HRM, dan sistem informasi lainnya.',
                'order' => 6,
                'features' => [
                    ['feature' => 'Ready-to-Deploy Applications', 'icon' => 'fa-rocket'],
                    ['feature' => 'Complete Documentation', 'icon' => 'fa-file-alt'],
                    ['feature' => 'Lifetime Updates', 'icon' => 'fa-sync'],
                    ['feature' => 'Technical Support', 'icon' => 'fa-headset'],
                    ['feature' => 'Customization Service', 'icon' => 'fa-cogs'],
                ],
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'icon' => 'fa-bullhorn',
                'description' => 'Strategi pemasaran digital komprehensif untuk meningkatkan brand awareness, engagement, dan konversi melalui berbagai channel online.',
                'order' => 7,
                'features' => [
                    ['feature' => 'Social Media Management', 'icon' => 'fa-hashtag'],
                    ['feature' => 'Google Ads Campaign', 'icon' => 'fa-google'],
                    ['feature' => 'Content Marketing Strategy', 'icon' => 'fa-pen-fancy'],
                    ['feature' => 'SEO & SEM Optimization', 'icon' => 'fa-search-plus'],
                    ['feature' => 'Performance Analytics', 'icon' => 'fa-analytics'],
                ],
            ],
            [
                'name' => 'Cloud Hosting & Domain',
                'slug' => 'cloud-hosting-domain',
                'icon' => 'fa-cloud',
                'description' => 'Layanan hosting cloud berkualitas tinggi dengan uptime 99.9%, auto-scaling, backup otomatis, dan registrasi domain dengan harga kompetitif.',
                'order' => 8,
                'features' => [
                    ['feature' => '99.9% Uptime SLA', 'icon' => 'fa-shield-alt'],
                    ['feature' => 'Auto-scaling Resources', 'icon' => 'fa-expand-arrows-alt'],
                    ['feature' => 'Daily Backup System', 'icon' => 'fa-save'],
                    ['feature' => '24/7 Technical Support', 'icon' => 'fa-phone'],
                    ['feature' => 'Free SSL Certificate', 'icon' => 'fa-lock'],
                ],
            ],
            [
                'name' => 'Konsultasi IT & Digital',
                'slug' => 'konsultasi-it-digital',
                'icon' => 'fa-lightbulb',
                'description' => 'Konsultasi strategis untuk transformasi digital bisnis, analisis kebutuhan sistem, rekomendasi teknologi, dan roadmap pengembangan yang tepat sasaran.',
                'order' => 9,
                'features' => [
                    ['feature' => 'Digital Transformation Strategy', 'icon' => 'fa-route'],
                    ['feature' => 'Technology Assessment', 'icon' => 'fa-clipboard-check'],
                    ['feature' => 'Implementation Roadmap', 'icon' => 'fa-map'],
                    ['feature' => 'Risk Analysis & Mitigation', 'icon' => 'fa-exclamation-triangle'],
                    ['feature' => 'ROI Calculation & Forecasting', 'icon' => 'fa-calculator'],
                ],
            ],
        ];

        foreach ($services as $index => $srv) {
            $service = Service::create([
                'service_category_id' => $webCategory->id,
                'name' => $srv['name'],
                'slug' => $srv['slug'],
                'icon' => $srv['icon'],
                'description' => $srv['description'],
                'order' => $srv['order'],
            ]);
            foreach ($srv['features'] as $fIndex => $feature) {
                ServiceFeature::create([
                    'service_id' => $service->id,
                    'feature' => $feature['feature'],
                    'icon' => $feature['icon'],
                    'order' => $fIndex + 1,
                ]);
            }
        }
    }
}
