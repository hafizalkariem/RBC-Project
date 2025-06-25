<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class UpdateTechnologyTypesSeeder extends Seeder
{
    public function run(): void
    {
        $typeMapping = [
            // Languages
            'HTML5' => 'language',
            'CSS3' => 'language',
            'JavaScript' => 'language',
            'TypeScript' => 'language',
            'PHP' => 'language',
            'Python' => 'language',
            'Golang' => 'language',
            'Java' => 'language',
            'Kotlin' => 'language',
            'Swift' => 'language',
            'Python AI' => 'language',
            
            // Frameworks
            'React.js' => 'framework',
            'Vue.js' => 'framework',
            'Tailwind CSS' => 'framework',
            'Bootstrap' => 'framework',
            'Laravel' => 'framework',
            'Express.js' => 'framework',
            'CodeIgniter' => 'framework',
            'Django' => 'framework',
            'FastAPI' => 'framework',
            'Spring Boot' => 'framework',
            'ASP.NET Core' => 'framework',
            'Ruby on Rails' => 'framework',
            'React Native' => 'framework',
            'Flutter' => 'framework',
            'TensorFlow' => 'framework',
            'PyTorch' => 'framework',
            'Symfony' => 'framework',
            
            // Libraries
            'jQuery' => 'library',
            
            // Databases
            'MySQL' => 'database',
            'MongoDB' => 'database',
            'Redis' => 'database',
            
            // Tools
            'SASS' => 'tool',
            'Docker' => 'tool',
            'Kubernetes' => 'tool',
            'Figma' => 'tool',
            'Adobe Photoshop' => 'tool',
            'Adobe Illustrator' => 'tool',
            'Canva' => 'tool',
            'n8n' => 'tool',
            
            // Platforms
            'AWS' => 'platform',
            'Node.js' => 'platform',
            
            // Services
            'AI Agent' => 'service',
            'OpenAI API' => 'service',
        ];

        foreach ($typeMapping as $techName => $type) {
            Technology::where('name', $techName)->update(['type' => $type]);
        }
    }
}