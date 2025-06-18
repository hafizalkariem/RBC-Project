<style>
    .tech-card {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.10) 0%, rgba(139, 92, 246, 0.08) 100%);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(59, 130, 246, 0.18);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .tech-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(59, 130, 246, 0.10);
        border-color: rgba(139, 92, 246, 0.25);
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.10), transparent);
        transition: left 0.6s;
    }

    .tech-card:hover::before {
        left: 100%;
    }

    .tech-logo {
        transition: all 0.3s ease;
        filter: drop-shadow(0 4px 8px rgba(59, 130, 246, 0.10));
    }

    .tech-card:hover .tech-logo {
        transform: scale(1.1) rotate(5deg);
        filter: drop-shadow(0 8px 16px rgba(59, 130, 246, 0.18));
    }

    .section-bg {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 40%, #06b6d4 80%, #8b5cf6 100%);
        position: relative;
        overflow: hidden;
    }

    .section-glass {
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(18px);
        border-radius: 2rem;
        border: 1px solid rgba(59, 130, 246, 0.10);
        box-shadow: 0 8px 32px 0 rgba(16, 24, 39, 0.15);
    }

    .code-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.03;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='50' font-size='12' fill='white' font-family='monospace'%3E%3C/html%3E %3Cdiv%3E %3Cscript%3E function() %7B %7D %3C/script%3E %3Cstyle%3E body %7B %7D %3C/style%3E%3C/text%3E%3C/svg%3E");
    }

    .floating-code {
        position: absolute;
        animation: float 15s infinite ease-in-out;
        opacity: 0.1;
        font-family: 'Courier New', monospace;
        color: white;
        font-size: 12px;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) translateX(0px);
        }

        25% {
            transform: translateY(-20px) translateX(10px);
        }

        50% {
            transform: translateY(-10px) translateX(-5px);
        }

        75% {
            transform: translateY(-30px) translateX(8px);
        }
    }

    .category-badge {
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.18), rgba(139, 92, 246, 0.10));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.18);
    }

    .pulse-dot {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .expertise-level {
        height: 4px;
        background: linear-gradient(90deg, #06b6d4, #3b82f6, #8b5cf6);
        border-radius: 2px;
        position: relative;
        overflow: hidden;
    }

    .expertise-level::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }
</style>
<section class="py-16 md:py-24 glass-dark backdrop-blur-xl relative">
    <div class="code-bg"></div>

    <!-- Floating Code Elements -->
    <div class="floating-code" style="top: 10%; left: 5%; animation-delay: 0s;">&lt;?php echo "Hello World"; ?&gt;</div>
    <div class="floating-code" style="top: 20%; right: 10%; animation-delay: 2s;">const app = new Vue({...})</div>
    <div class="floating-code" style="top: 60%; left: 8%; animation-delay: 4s;">SELECT * FROM users WHERE...</div>
    <div class="floating-code" style="bottom: 30%; right: 15%; animation-delay: 6s;">npm install react next.js</div>
    <div class="floating-code" style="bottom: 15%; left: 12%; animation-delay: 8s;">git commit -m "feature"</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-3 mb-6">
                <div class="pulse-dot w-2 h-2 bg-green-400 rounded-full"></div>
                <span class="text-white/90 text-sm font-medium">Teknologi Terdepan</span>
            </div>

            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 bg-clip-text text-transparent">
                    Stack Teknologi
                </span>
                <br />
                <span class="text-white">Yang Kami Kuasai</span>
            </h2>

            <p class="text-white/80 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-8">
                Dari frontend modern hingga backend yang scalable, kami menggunakan teknologi terbaik untuk membangun solusi digital yang powerful dan reliable
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <span class="category-badge rounded-full px-4 py-2 text-white/90 text-sm font-medium">15+ Bahasa Pemrograman</span>
                <span class="category-badge rounded-full px-4 py-2 text-white/90 text-sm font-medium">25+ Framework</span>
                <span class="category-badge rounded-full px-4 py-2 text-white/90 text-sm font-medium">10+ Database</span>
            </div>
        </div>

        <!-- Frontend Technologies -->
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                🎨 Frontend Development
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">HTML5</h4>
                    <p class="text-white/70 text-sm mb-3">Struktur Web Modern</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">CSS3</h4>
                    <p class="text-white/70 text-sm mb-3">Styling & Animation</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">JavaScript</h4>
                    <p class="text-white/70 text-sm mb-3">ES6+ & TypeScript</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">React.js</h4>
                    <p class="text-white/70 text-sm mb-3">Component Library</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" alt="Vue.js" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Vue.js</h4>
                    <p class="text-white/70 text-sm mb-3">Progressive Framework</p>
                    <div class="expertise-level"></div>
                </div>
            </div>
        </div>

        <!-- Backend Technologies -->
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                ⚙️ Backend Development
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">PHP</h4>
                    <p class="text-white/70 text-sm mb-3">Laravel, CodeIgniter</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" alt="Node.js" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Node.js</h4>
                    <p class="text-white/70 text-sm mb-3">Express, Fastify</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Python</h4>
                    <p class="text-white/70 text-sm mb-3">Django, FastAPI</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg" alt="Golang" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Golang</h4>
                    <p class="text-white/70 text-sm mb-3">Gin, Fiber</p>
                    <div class="expertise-level"></div>
                </div>
            </div>
        </div>

        <!-- Database & Cloud -->
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                🗄️ Database & Cloud
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">MySQL</h4>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg" alt="MongoDB" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">MongoDB</h4>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg" alt="Redis" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Redis</h4>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg" alt="AWS" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">AWS</h4>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" alt="Docker" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Docker</h4>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center p-3">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain.svg" alt="Kubernetes" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Kubernetes</h4>
                    <div class="expertise-level"></div>
                </div>
            </div>
        </div>

        <!-- Mobile & Tools -->
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                📱 Mobile & Tools
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-cyan-600 rounded-xl flex items-center justify-center text-white text-lg font-bold">
                        RN
                    </div>
                    <h4 class="text-white font-semibold mb-2">React Native</h4>
                    <p class="text-white/70 text-sm mb-3">Cross Platform</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-blue-500 rounded-xl flex items-center justify-center text-white text-lg font-bold">
                        Flutter
                    </div>
                    <h4 class="text-white font-semibold mb-2">Flutter</h4>
                    <p class="text-white/70 text-sm mb-3">Dart Framework</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gray-700 rounded-xl flex items-center justify-center text-white text-lg font-bold">
                        Git
                    </div>
                    <h4 class="text-white font-semibold mb-2">Git</h4>
                    <p class="text-white/70 text-sm mb-3">Version Control</p>
                    <div class="expertise-level"></div>
                </div>

                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-indigo-600 rounded-xl flex items-center justify-center text-white text-lg font-bold">
                        Figma
                    </div>
                    <h4 class="text-white font-semibold mb-2">Figma</h4>
                    <p class="text-white/70 text-sm mb-3">UI/UX Design</p>
                    <div class="expertise-level"></div>
                </div>
            </div>
        </div>

        <!-- AI & Agent Development -->
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                🤖 AI & Agent Development
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h4 class="text-white font-semibold mb-2">AI Agent</h4>
                    <p class="text-white/70 text-sm mb-3">Custom AI Chatbot & Automation</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Python AI</h4>
                    <p class="text-white/70 text-sm mb-3">LangChain, OpenAI, HuggingFace</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg" alt="TensorFlow" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">TensorFlow</h4>
                    <p class="text-white/70 text-sm mb-3">Deep Learning & Model Training</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-green-400 to-blue-400 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pytorch/pytorch-original.svg" alt="PyTorch" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">PyTorch</h4>
                    <p class="text-white/70 text-sm mb-3">AI Model & NLP</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-green-400 to-blue-400 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://raw.githubusercontent.com/n8n-io/n8n/master/assets/images/n8n-logo.png" alt="n8n" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">n8n</h4>
                    <p class="text-white/70 text-sm mb-3">Workflow Automation & Integration</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://seeklogo.com/images/O/openai-logo-8B9BFEDC26-seeklogo.com.png" alt="OpenAI" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">OpenAI API</h4>
                    <p class="text-white/70 text-sm mb-3">Integrasi GPT, ChatGPT, DALL-E, dsb</p>
                    <div class="expertise-level"></div>
                </div>
            </div>
        </div>


        <!-- Web Design Section -->
        <div class="mb-16">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 text-center">
                🎨 Web Design
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-pink-400 to-purple-500 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Figma</h4>
                    <p class="text-white/70 text-sm mb-3">UI/UX Design & Prototyping</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-400 to-blue-700 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/adobephotoshop/adobephotoshop-plain.svg" alt="Photoshop" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Adobe Photoshop</h4>
                    <p class="text-white/70 text-sm mb-3">Image Editing & Graphics</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/adobeillustrator/adobeillustrator-plain.svg" alt="Illustrator" class="w-10 h-10 object-contain">
                    </div>
                    <h4 class="text-white font-semibold mb-2">Adobe Illustrator</h4>
                    <p class="text-white/70 text-sm mb-3">Vector & Logo Design</p>
                    <div class="expertise-level"></div>
                </div>
                <div class="tech-card rounded-2xl p-6 text-center group">
                    <div class="tech-logo w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4 class="text-white font-semibold mb-2">Custom Web Design</h4>
                    <p class="text-white/70 text-sm mb-3">Desain Website Unik & Modern</p>
                    <div class="expertise-level"></div>
                </div>
            </div>
        </div>
        <!-- CTA Section -->
        <div class="text-center">
            <div class="tech-card rounded-3xl p-8 md:p-12 max-w-4xl mx-auto">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Siap Membangun Proyek Impian Anda?
                </h3>
                <p class="text-white/80 text-lg mb-8 max-w-2xl mx-auto">
                    Dengan stack teknologi terdepan dan tim developer berpengalaman, kami siap mewujudkan ide digital Anda menjadi kenyataan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        Konsultasi Gratis
                    </button>
                    <button class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/30 text-white font-bold py-4 px-8 rounded-full transition-all duration-300">
                        Lihat Portfolio
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>