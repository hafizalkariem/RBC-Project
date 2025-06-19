<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechCategory;
use App\Models\Technology;

class TechStackSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Frontend Development
        $frontend = TechCategory::create([
            'name' => 'Frontend Development',
            'icon' => '🎨',
            'order' => 1,
        ]);
        Technology::insert([
            [
                'tech_category_id' => $frontend->id,
                'name' => 'HTML5',
                'description' => 'Struktur Web Modern',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg',
                'expertise_level' => 5,
                'order' => 1,
            ],
            [
                'tech_category_id' => $frontend->id,
                'name' => 'CSS3',
                'description' => 'Styling & Animation',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg',
                'expertise_level' => 5,
                'order' => 2,
            ],
            [
                'tech_category_id' => $frontend->id,
                'name' => 'JavaScript',
                'description' => 'ES6+ & TypeScript',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg',
                'expertise_level' => 5,
                'order' => 3,
            ],
            [
                'tech_category_id' => $frontend->id,
                'name' => 'React.js',
                'description' => 'Component Library',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
                'expertise_level' => 4,
                'order' => 4,
            ],
            [
                'tech_category_id' => $frontend->id,
                'name' => 'Vue.js',
                'description' => 'Progressive Framework',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg',
                'expertise_level' => 4,
                'order' => 5,
            ],
        ]);

        // 2. Backend Development
        $backend = TechCategory::create([
            'name' => 'Backend Development',
            'icon' => '⚙️',
            'order' => 2,
        ]);
        Technology::insert([
            [
                'tech_category_id' => $backend->id,
                'name' => 'PHP',
                'description' => 'Laravel, CodeIgniter',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg',
                'expertise_level' => 5,
                'order' => 1,
            ],
            [
                'tech_category_id' => $backend->id,
                'name' => 'Node.js',
                'description' => 'Express, Fastify',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg',
                'expertise_level' => 4,
                'order' => 2,
            ],
            [
                'tech_category_id' => $backend->id,
                'name' => 'Python',
                'description' => 'Django, FastAPI',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg',
                'expertise_level' => 4,
                'order' => 3,
            ],
            [
                'tech_category_id' => $backend->id,
                'name' => 'Golang',
                'description' => 'Gin, Fiber',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg',
                'expertise_level' => 3,
                'order' => 4,
            ],
        ]);

        // 3. Database & Cloud
        $database = TechCategory::create([
            'name' => 'Database & Cloud',
            'icon' => '🗄️',
            'order' => 3,
        ]);
        Technology::insert([
            [
                'tech_category_id' => $database->id,
                'name' => 'MySQL',
                'description' => 'Relational Database',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg',
                'expertise_level' => 5,
                'order' => 1,
            ],
            [
                'tech_category_id' => $database->id,
                'name' => 'MongoDB',
                'description' => 'NoSQL Document Store',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg',
                'expertise_level' => 4,
                'order' => 2,
            ],
            [
                'tech_category_id' => $database->id,
                'name' => 'Redis',
                'description' => 'In-memory Cache',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg',
                'expertise_level' => 3,
                'order' => 3,
            ],
            [
                'tech_category_id' => $database->id,
                'name' => 'AWS',
                'description' => 'Cloud Infrastructure',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg',
                'expertise_level' => 3,
                'order' => 4,
            ],
            [
                'tech_category_id' => $database->id,
                'name' => 'Docker',
                'description' => 'Containerization',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg',
                'expertise_level' => 4,
                'order' => 5,
            ],
            [
                'tech_category_id' => $database->id,
                'name' => 'Kubernetes',
                'description' => 'Container Orchestration',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain.svg',
                'expertise_level' => 3,
                'order' => 6,
            ],
        ]);

        // 4. Mobile & Tools
        $mobile = TechCategory::create([
            'name' => 'Mobile & Tools',
            'icon' => '📱',
            'order' => 4,
        ]);
        Technology::insert([
            [
                'tech_category_id' => $mobile->id,
                'name' => 'React Native',
                'description' => 'Cross Platform',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
                'expertise_level' => 4,
                'order' => 1,
            ],
            [
                'tech_category_id' => $mobile->id,
                'name' => 'Flutter',
                'description' => 'Dart Framework',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg',
                'expertise_level' => 4,
                'order' => 2,
            ],
            [
                'tech_category_id' => $mobile->id,
                'name' => 'Java',
                'description' => 'Android & Enterprise Apps',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg',
                'expertise_level' => 3,
                'order' => 3,
            ],
            [
                'tech_category_id' => $mobile->id,
                'name' => 'Kotlin',
                'description' => 'Android Development',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg',
                'expertise_level' => 3,
                'order' => 4,
            ],
            [
                'tech_category_id' => $mobile->id,
                'name' => 'Swift',
                'description' => 'iOS Development',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg',
                'expertise_level' => 3,
                'order' => 5,
            ],
        ]);

        // 5. AI & Agent Development
        $ai = TechCategory::create([
            'name' => 'AI & Agent Development',
            'icon' => '🤖',
            'order' => 5,
        ]);
        Technology::insert([
            [
                'tech_category_id' => $ai->id,
                'name' => 'AI Agent',
                'description' => 'Custom AI Chatbot & Automation',
                'logo_url' => null, // pakai icon font-awesome di blade
                'expertise_level' => 3,
                'order' => 1,
            ],
            [
                'tech_category_id' => $ai->id,
                'name' => 'Python AI',
                'description' => 'LangChain, OpenAI, HuggingFace',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg',
                'expertise_level' => 4,
                'order' => 2,
            ],
            [
                'tech_category_id' => $ai->id,
                'name' => 'TensorFlow',
                'description' => 'Deep Learning & Model Training',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg',
                'expertise_level' => 3,
                'order' => 3,
            ],
            [
                'tech_category_id' => $ai->id,
                'name' => 'PyTorch',
                'description' => 'AI Model & NLP',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pytorch/pytorch-original.svg',
                'expertise_level' => 3,
                'order' => 4,
            ],
            [
                'tech_category_id' => $ai->id,
                'name' => 'n8n',
                'description' => 'Workflow Automation & Integration',
                'logo_url' => 'https://raw.githubusercontent.com/n8n-io/n8n/master/assets/images/n8n-logo.png',
                'expertise_level' => 3,
                'order' => 5,
            ],
            [
                'tech_category_id' => $ai->id,
                'name' => 'OpenAI API',
                'description' => 'Integrasi GPT, ChatGPT, DALL-E, dsb',
                'logo_url' => 'https://seeklogo.com/images/O/openai-logo-8B9BFEDC26-seeklogo.com.png',
                'expertise_level' => 3,
                'order' => 6,
            ],
        ]);

        // 6. Web Design
        $design = TechCategory::create([
            'name' => 'Web Design',
            'icon' => '🎨',
            'order' => 6,
        ]);
        Technology::insert([
            [
                'tech_category_id' => $design->id,
                'name' => 'Figma',
                'description' => 'UI/UX Design & Prototyping',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg',
                'expertise_level' => 4,
                'order' => 1,
            ],
            [
                'tech_category_id' => $design->id,
                'name' => 'Adobe Photoshop',
                'description' => 'Image Editing & Graphics',
                'logo_url' => 'images/tech/photo-shop.png',
                'expertise_level' => 3,
                'order' => 2,
            ],
            [
                'tech_category_id' => $design->id,
                'name' => 'Adobe Illustrator',
                'description' => 'Vector & Logo Design',
                'logo_url' => 'images/tech/adobe-illustrator.png',
                'expertise_level' => 3,
                'order' => 3,
            ],
            [
                'tech_category_id' => $design->id,
                'name' => 'Canva',
                'description' => 'Desain Grafis & Konten Visual',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/canva/canva-original.svg',
                'expertise_level' => 3,
                'order' => 4,
            ],
        ]);
    }
}
