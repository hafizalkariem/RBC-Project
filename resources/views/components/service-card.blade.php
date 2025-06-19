<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .service-card {
        transition: all 0.3s ease;
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(59, 130, 246, 0.13);
        color: #fff;
        box-shadow: 0 8px 32px 0 rgba(16, 24, 39, 0.10);
    }

    .service-card:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: rgba(59, 130, 246, 0.22);
        box-shadow: 0 25px 50px rgba(59, 130, 246, 0.10);
        background: rgba(30, 41, 59, 0.65);
    }

    .service-icon {
        background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 50%, #8b5cf6 100%);
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px 0 rgba(59, 130, 246, 0.18);
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        box-shadow: 0 8px 24px 0 rgba(139, 92, 246, 0.18);
    }

    .hero-gradient {
        background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 50%, #8b5cf6 100%);
    }

    .cta-button {
        background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 50%, #8b5cf6 100%);
        color: #fff;
        transition: all 0.3s ease;
        border: none;
    }

    .cta-button:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.18);
    }

    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeIn 0.8s ease forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stagger-1 {
        animation-delay: 0.1s;
    }

    .stagger-2 {
        animation-delay: 0.2s;
    }

    .stagger-3 {
        animation-delay: 0.3s;
    }

    .stagger-4 {
        animation-delay: 0.4s;
    }

    .stagger-5 {
        animation-delay: 0.5s;
    }

    .stagger-6 {
        animation-delay: 0.6s;
    }

    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* Tambahan: Ubah warna teks dan icon pada list */
    .service-card h3 {
        color: #fff;
    }

    .service-card p,
    .service-card ul,
    .service-card li {
        color: #e0e7ef;
    }

    .service-card ul li i {
        color: #06b6d4;
    }
</style>

<section class="py-20 bg-transparent">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-400 via-cyan-400 to-purple-400 bg-clip-text text-transparent mb-6 fade-in">
                Apa yang Kami Tawarkan
            </h2>
            <p class="text-xl text-white/80 max-w-2xl mx-auto fade-in stagger-1">
                Kami menyediakan berbagai layanan digital profesional untuk membantu bisnis Anda berkembang di era digital dengan solusi yang tepat sasaran dan berkualitas tinggi.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <div class="service-card rounded-2xl p-8 fade-in stagger-{{ $index+1 }}">
                <div class="service-icon w-16 h-16 rounded-full flex items-center justify-center mb-6 floating-animation">
                    <i class="fas {{ $service->icon }} text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">{{ $service->name }}</h3>
                <p class="mb-6 leading-relaxed">
                    {{ $service->description }}
                </p>
                <ul class="text-sm space-y-2">
                    @foreach($service->features as $feature)
                    <li class="flex items-center">
                        <i class="fas {{ $feature->icon ?? 'fa-check' }} mr-2"></i>
                        {{ $feature->feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us -->


<!-- CTA Section -->





<script>
    // Animate elements on scroll
    const observerOptionsService = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observerService = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptionsService);

    // Observe all elements with fade-in class
    document.addEventListener('DOMContentLoaded', () => {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach(el => observerService.observe(el));
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading states to CTA buttons
    document.querySelectorAll('.cta-button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menghubungkan...';
            this.style.pointerEvents = 'none';

            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.pointerEvents = 'auto';
                // Here you would typically redirect to the actual contact page
                alert('Terima kasih! Kami akan segera menghubungi Anda.');
            }, 2000);
        });
    });
</script>