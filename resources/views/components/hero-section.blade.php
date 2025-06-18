<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    #hero3d {
        background: transparent;
    }

    .floating-icon {
        animation: float 6s ease-in-out infinite;
    }

    .floating-icon:nth-child(2) {
        animation-delay: -2s;
    }

    .floating-icon:nth-child(3) {
        animation-delay: -4s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    .glow-effect {
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
    }
</style>


<!-- <body class="min-h-screen text-white overflow-hidden"> -->
<!-- Hero Section -->
<section class="min-h-screen flex items-center pt-24 pb-12 px-4 relative glass-dark backdrop-blur-xl">
    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Kiri: Teks -->
        <div class="text-left max-w-2xl w-full mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                <span class="text-gradient">Solusi Terbaik</span>
                <br>untuk Bisnis Modern
            </h1>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Solusi tepat pembuatan website cepat & profesional. RBC siap membantu kebutuhan digital Anda dengan teknologi terdepan dan desain yang memukau.
            </p>
            <div class="flex flex-row flex-wrap gap-3 sm:gap-4 mb-6 justify-center">
                <button class="bg-gradient-to-r from-blue-500 to-purple-600 px-5 py-3 sm:px-8 sm:py-4 rounded-xl text-white font-semibold text-sm sm:text-base hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                    <i class="fas fa-rocket mr-2"></i>Mulai Sekarang
                </button>
                <button class="glass-dark px-5 py-3 sm:px-8 sm:py-4 rounded-xl text-white font-semibold text-sm sm:text-base hover:bg-white/20 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-code mr-2"></i>
                    Jelajahi Source Code
                </button>
            </div>
            <!-- Stats -->
            <div class="flex flex-row flex-wrap gap-3 sm:gap-4 mt-6 justify-center">
                <div class="text-center min-w-[90px]">
                    <div class="text-xl sm:text-3xl font-bold text-blue-600 counter" data-count="500">0+</div>
                    <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Source Code</div>
                </div>
                <div class="text-center min-w-[90px]">
                    <div class="text-xl sm:text-3xl font-bold text-purple-600 counter" data-count="200">0+</div>
                    <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Project Selesai</div>
                </div>
                <div class="text-center min-w-[90px]">
                    <div class="text-xl sm:text-3xl font-bold text-green-600 counter" data-count="1000">0+</div>
                    <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Client Puas</div>
                </div>
            </div>
            <!-- ...existing code... -->
        </div>

        <!-- Kanan: 3D Animation -->
        <div class="flex justify-center relative">
            <div class="w-full max-w-md h-96 relative">
                <!-- 3D Canvas Container -->
                <div id="hero3d" class="w-full h-full rounded-3xl overflow-hidden relative glow-effect"></div>

                <!-- Floating Icons -->
                <div class="absolute inset-0 pointer-events-none">
                    <div class="floating-icon absolute top-4 left-4 w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center opacity-80">
                        <i class="fas fa-code text-white text-lg"></i>
                    </div>
                    <div class="floating-icon absolute top-4 right-4 w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center opacity-80">
                        <i class="fas fa-palette text-white text-lg"></i>
                    </div>
                    <div class="floating-icon absolute bottom-4 left-4 w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center opacity-80">
                        <i class="fas fa-mobile-alt text-white text-lg"></i>
                    </div>
                    <div class="floating-icon absolute bottom-4 right-4 w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center opacity-80">
                        <i class="fas fa-rocket text-white text-lg"></i>
                    </div>
                </div>

                <!-- Particle Effects -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none rounded-3xl">
                    <div class="particle absolute w-2 h-2 bg-blue-400 rounded-full opacity-60"></div>
                    <div class="particle absolute w-1 h-1 bg-purple-400 rounded-full opacity-80"></div>
                    <div class="particle absolute w-3 h-3 bg-cyan-400 rounded-full opacity-40"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // 3D Scene Setup
    const container = document.getElementById('hero3d');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({
        alpha: true,
        antialias: true
    });

    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);

    // Lighting
    const ambientLight = new THREE.AmbientLight(0x404040, 0.6);
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0x3b82f6, 1);
    directionalLight.position.set(5, 5, 5);
    scene.add(directionalLight);

    const pointLight = new THREE.PointLight(0x8b5cf6, 1, 100);
    pointLight.position.set(-5, 5, 5);
    scene.add(pointLight);

    // Create geometric shapes
    const shapes = [];

    // Central rotating cube with glass effect
    const cubeGeometry = new THREE.BoxGeometry(2, 2, 2);
    const cubeMaterial = new THREE.MeshPhysicalMaterial({
        color: 0x3b82f6,
        transparent: true,
        opacity: 0.7,
        roughness: 0.1,
        metalness: 0.1,
        clearcoat: 1,
        clearcoatRoughness: 0.1
    });
    const cube = new THREE.Mesh(cubeGeometry, cubeMaterial);
    scene.add(cube);
    shapes.push(cube);

    // Orbiting spheres
    for (let i = 0; i < 6; i++) {
        const sphereGeometry = new THREE.SphereGeometry(0.3, 16, 16);
        const sphereMaterial = new THREE.MeshPhysicalMaterial({
            color: new THREE.Color().setHSL((i * 60) / 360, 0.8, 0.6),
            transparent: true,
            opacity: 0.8,
            roughness: 0.2,
            metalness: 0.8
        });
        const sphere = new THREE.Mesh(sphereGeometry, sphereMaterial);

        const angle = (i / 6) * Math.PI * 2;
        sphere.position.x = Math.cos(angle) * 4;
        sphere.position.z = Math.sin(angle) * 4;
        sphere.position.y = Math.sin(angle * 2) * 1;

        scene.add(sphere);
        shapes.push(sphere);
    }

    // Floating rings
    for (let i = 0; i < 3; i++) {
        const ringGeometry = new THREE.RingGeometry(1 + i * 0.5, 1.2 + i * 0.5, 32);
        const ringMaterial = new THREE.MeshBasicMaterial({
            color: new THREE.Color().setHSL((i * 120) / 360, 0.7, 0.5),
            transparent: true,
            opacity: 0.4,
            side: THREE.DoubleSide
        });
        const ring = new THREE.Mesh(ringGeometry, ringMaterial);
        ring.position.y = i * 0.5 - 1;
        ring.rotation.x = Math.PI / 2;
        scene.add(ring);
        shapes.push(ring);
    }

    // Create particles
    const particleCount = 100;
    const particles = new THREE.BufferGeometry();
    const particlePositions = new Float32Array(particleCount * 3);
    const particleColors = new Float32Array(particleCount * 3);

    for (let i = 0; i < particleCount; i++) {
        particlePositions[i * 3] = (Math.random() - 0.5) * 20;
        particlePositions[i * 3 + 1] = (Math.random() - 0.5) * 20;
        particlePositions[i * 3 + 2] = (Math.random() - 0.5) * 20;

        const color = new THREE.Color().setHSL(Math.random(), 0.8, 0.6);
        particleColors[i * 3] = color.r;
        particleColors[i * 3 + 1] = color.g;
        particleColors[i * 3 + 2] = color.b;
    }

    particles.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
    particles.setAttribute('color', new THREE.BufferAttribute(particleColors, 3));

    const particleMaterial = new THREE.PointsMaterial({
        size: 0.1,
        vertexColors: true,
        transparent: true,
        opacity: 0.8
    });

    const particleSystem = new THREE.Points(particles, particleMaterial);
    scene.add(particleSystem);

    camera.position.z = 8;

    // Animation variables
    let time = 0;
    let mouseX = 0;
    let mouseY = 0;

    // Mouse interaction
    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX / window.innerWidth) * 2 - 1;
        mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
    });

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);
        time += 0.01;

        // Rotate central cube
        cube.rotation.x = time * 0.5;
        cube.rotation.y = time * 0.3;
        cube.rotation.z = time * 0.2;

        // Animate orbiting spheres
        shapes.slice(1, 7).forEach((sphere, index) => {
            const angle = time + (index * Math.PI * 2) / 6;
            sphere.position.x = Math.cos(angle) * 4;
            sphere.position.z = Math.sin(angle) * 4;
            sphere.position.y = Math.sin(angle * 2) * 1;
            sphere.rotation.y = time * 2;
        });

        // Animate rings
        shapes.slice(7).forEach((ring, index) => {
            ring.rotation.z = time * (0.5 + index * 0.2);
        });

        // Animate particles
        const positions = particleSystem.geometry.attributes.position.array;
        for (let i = 0; i < particleCount; i++) {
            positions[i * 3 + 1] = Math.sin(time + i * 0.1) * 2;
        }
        particleSystem.geometry.attributes.position.needsUpdate = true;
        particleSystem.rotation.y = time * 0.1;

        // Mouse interaction
        scene.rotation.y = mouseX * 0.1;
        scene.rotation.x = mouseY * 0.1;

        // Camera movement
        camera.position.x = Math.sin(time * 0.1) * 2;
        camera.position.y = Math.cos(time * 0.15) * 1;
        camera.lookAt(scene.position);

        renderer.render(scene, camera);
    }

    animate();

    // Handle window resize
    window.addEventListener('resize', () => {
        const width = container.clientWidth;
        const height = container.clientHeight;

        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    });

    // Particle animation for floating effects
    function animateParticles() {
        const particles = document.querySelectorAll('.particle');
        particles.forEach((particle, index) => {
            const startX = Math.random() * 100;
            const startY = Math.random() * 100;
            const duration = 3000 + Math.random() * 2000;

            particle.style.left = startX + '%';
            particle.style.top = startY + '%';

            particle.animate([{
                    transform: 'translateY(0px) scale(0)',
                    opacity: 0
                },
                {
                    transform: 'translateY(-100px) scale(1)',
                    opacity: 1
                },
                {
                    transform: 'translateY(-200px) scale(0)',
                    opacity: 0
                }
            ], {
                duration: duration,
                iterations: Infinity,
                delay: index * 1000
            });
        });
    }

    animateParticles();

    function animateCounter(element, target, duration = 1200) {
        let start = 0;
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.textContent = Math.floor(progress * (target - start) + start) + '+';
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                element.textContent = target + '+';
            }
        };
        window.requestAnimationFrame(step);
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.counter').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'), 10);
            animateCounter(counter, target);
        });
    });
</script>
<!-- </body> -->