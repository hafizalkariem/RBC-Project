<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\DeveloperSkill;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    public function run(): void
    {
        $developers = [
            [
                'name' => 'Ahmad Hapizhudin',
                'role' => 'Lead Full-Stack Developer',
                'description' => 'Spesialis dalam React, Node.js, dan cloud architecture. Berpengalaman memimpin tim pengembangan aplikasi enterprise dan startup unicorn.',
                'photo_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
                'years_experience' => 5,
                'projects_completed' => 150,
                'success_rate' => '98%',
                'github_url' => 'https://github.com/ahmad-hapizhudin',
                'linkedin_url' => 'https://linkedin.com/in/ahmad-hapizhudin',
                'portfolio_url' => 'https://ahmad-hapizhudin.dev',
                'order' => 1,
                'skills' => ['React', 'Node.js', 'AWS', 'Docker']
            ],
            [
                'name' => 'Nurul Akbar',
                'role' => 'UI/UX Designer & Frontend Dev',
                'description' => 'Desainer kreatif dengan keahlian coding. Ahli dalam menciptakan pengalaman user yang menawan dan interface yang responsif.',
                'photo_url' => 'https://images.unsplash.com/photo-1494790108755-2616b332c2b1?w=150&h=150&fit=crop&crop=face',
                'years_experience' => 4,
                'projects_completed' => 200,
                'success_rate' => '15 Awards',
                'github_url' => 'https://github.com/nurul-akbar',
                'linkedin_url' => 'https://linkedin.com/in/nurul-akbar',
                'portfolio_url' => 'https://nurul-akbar.design',
                'order' => 2,
                'skills' => ['Figma', 'Vue.js', 'SASS', 'Animation']
            ],
            [
                'name' => 'M Dzaki Abiyyu',
                'role' => 'Backend Architect & DevOps',
                'description' => 'Arsitek sistem yang handal dalam membangun infrastruktur scalable. Expert dalam microservices dan cloud optimization.',
                'photo_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
                'years_experience' => 6,
                'projects_completed' => 50000000, // 50M+ requests handled
                'success_rate' => '99.9%',
                'github_url' => 'https://github.com/dzaki-abiyyu',
                'linkedin_url' => 'https://linkedin.com/in/dzaki-abiyyu',
                'portfolio_url' => 'https://dzaki-abiyyu.dev',
                'order' => 3,
                'skills' => ['Python', 'Kubernetes', 'PostgreSQL', 'Redis']
            ],
        ];

        foreach ($developers as $devData) {
            $skills = $devData['skills'];
            unset($devData['skills']);
            
            $developer = Developer::create($devData);
            
            foreach ($skills as $index => $skillName) {
                $technology = \App\Models\Technology::where('name', $skillName)->first();
                if ($technology) {
                    DeveloperSkill::create([
                        'developer_id' => $developer->id,
                        'technology_id' => $technology->id,
                        'proficiency_level' => 5,
                        'order' => $index + 1,
                    ]);
                }
            }
        }
        
        // Assign developers to products
        $products = \App\Models\Product::all();
        $developerIds = [1, 2, 3]; // Ahmad, Nurul, Dzaki
        
        foreach ($products as $product) {
            $product->update([
                'developer_id' => $developerIds[array_rand($developerIds)]
            ]);
        }
    }
}