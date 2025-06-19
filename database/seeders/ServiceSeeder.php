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
                    ['feature' => 'LMS (Learning Management System)', 'icon' => 'fa-check'],
                    ['feature' => 'Video Streaming Integration', 'icon' => 'fa-check'],
                    ['feature' => 'Progress Tracking & Analytics', 'icon' => 'fa-check'],
                ],
            ],
            [
                'name' => 'Landing Page UMKM',
                'slug' => 'landing-page-umkm',
                'icon' => 'fa-store',
                'description' => 'Desain landing page yang menarik dan conversion-focused untuk UMKM, dilengkapi dengan katalog produk, form pemesanan, dan integrasi WhatsApp Business.',
                'order' => 2,
                'features' => [
                    ['feature' => 'Responsive Design', 'icon' => 'fa-check'],
                    ['feature' => 'WhatsApp Integration', 'icon' => 'fa-check'],
                    ['feature' => 'SEO Optimized', 'icon' => 'fa-check'],
                ],
            ],
            [
                'name' => 'Website Company Profile',
                'slug' => 'website-company-profile',
                'icon' => 'fa-building',
                'description' => 'Website profesional untuk meningkatkan kredibilitas perusahaan dengan desain elegan, portfolio showcase, dan sistem manajemen konten yang mudah digunakan.',
                'order' => 3,
                'features' => [
                    ['feature' => 'Custom Design', 'icon' => 'fa-check'],
                    ['feature' => 'CMS Integration', 'icon' => 'fa-check'],
                    ['feature' => 'Portfolio Gallery', 'icon' => 'fa-check'],
                ],
            ],
            [
                'name' => 'Source Code Aplikasi',
                'slug' => 'source-code-aplikasi',
                'icon' => 'fa-code',
                'description' => 'Koleksi source code aplikasi siap pakai untuk berbagai kebutuhan bisnis seperti POS, Inventory Management, HRM, dan sistem informasi lainnya dengan dokumentasi lengkap.',
                'order' => 4,
                'features' => [
                    ['feature' => 'Ready-to-Use Applications', 'icon' => 'fa-check'],
                    ['feature' => 'Complete Documentation', 'icon' => 'fa-check'],
                    ['feature' => 'Lifetime Updates', 'icon' => 'fa-check'],
                ],
            ],
            [
                'name' => 'Hosting & Domain',
                'slug' => 'hosting-domain',
                'icon' => 'fa-server',
                'description' => 'Layanan hosting berkualitas tinggi dengan uptime 99.9%, shared hosting, VPS, dan registrasi domain .com/.id dengan harga kompetitif dan support 24/7.',
                'order' => 5,
                'features' => [
                    ['feature' => '99.9% Uptime Guarantee', 'icon' => 'fa-check'],
                    ['feature' => '24/7 Technical Support', 'icon' => 'fa-check'],
                    ['feature' => 'Free SSL Certificate', 'icon' => 'fa-check'],
                ],
            ],
            [
                'name' => 'Konsultasi Digital',
                'slug' => 'konsultasi-digital',
                'icon' => 'fa-lightbulb',
                'description' => 'Konsultasi strategis untuk transformasi digital bisnis Anda, analisis kebutuhan sistem, rekomendasi teknologi, dan roadmap pengembangan yang tepat sasaran.',
                'order' => 6,
                'features' => [
                    ['feature' => 'Digital Strategy Planning', 'icon' => 'fa-check'],
                    ['feature' => 'Technology Assessment', 'icon' => 'fa-check'],
                    ['feature' => 'Implementation Roadmap', 'icon' => 'fa-check'],
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
