<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<style>
    .dev-section-bg {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 40%, #06b6d4 80%, #8b5cf6 100%);
        position: relative;
        overflow: hidden;
        padding: 0 0 4rem 0;
    }

    .dev-section-glass {
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(18px);
        border-radius: 2rem;
        border: 1px solid rgba(59, 130, 246, 0.10);
        box-shadow: 0 8px 32px 0 rgba(16, 24, 39, 0.15);
        position: relative;
        z-index: 1;
        padding: 2rem 2rem 4rem 2rem;
        margin: 0 auto;
        max-width: 1400px;
    }

    .dev-floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }

    .dev-shape {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.18) 0%, transparent 70%);
        animation: float 8s ease-in-out infinite;
    }

    .dev-shape:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 15%;
        left: 8%;
        animation-delay: 0s;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.18) 0%, transparent 70%);
    }

    .dev-shape:nth-child(2) {
        width: 140px;
        height: 140px;
        top: 60%;
        right: 10%;
        animation-delay: -2s;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
    }

    .dev-shape:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 18%;
        left: 18%;
        animation-delay: -4s;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.15) 0%, transparent 70%);
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

    .dev-section-title {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(90deg, #3b82f6, #06b6d4, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .dev-section-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 600px;
        margin: 0 auto 2.5rem auto;
        line-height: 1.6;
    }

    @media (min-width: 640px) {
        .dev-team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            justify-items: center;
        }
    }

    @media (max-width: 639px) {
        .dev-team-grid {
            display: none !important;
        }
    }

    .dev-team-card {
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(59, 130, 246, 0.13);
        border-radius: 24px;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        width: 100%;
        max-width: 380px;
        box-shadow: 0 8px 32px 0 rgba(16, 24, 39, 0.10);
    }

    .dev-team-card:hover {
        transform: translateY(-10px) scale(1.02);
        background: rgba(30, 41, 59, 0.65);
        border-color: rgba(59, 130, 246, 0.22);
        box-shadow: 0 25px 50px rgba(59, 130, 246, 0.10);
    }

    .dev-member-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 1.5rem;
        overflow: hidden;
        border: 4px solid rgba(59, 130, 246, 0.18);
        transition: all 0.3s ease;
    }

    .dev-team-card:hover .dev-member-photo {
        border-color: rgba(139, 92, 246, 0.25);
        transform: scale(1.08);
    }

    .dev-member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .dev-team-card:hover .dev-member-photo img {
        transform: scale(1.13);
    }

    .dev-member-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 0.5rem;
        letter-spacing: -0.01em;
    }

    .dev-member-role {
        font-size: 1rem;
        background: linear-gradient(90deg, #06b6d4, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
        letter-spacing: 0.5px;
    }

    .dev-member-description {
        font-size: 0.97rem;
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .dev-member-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .dev-skill-tag {
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.18), rgba(139, 92, 246, 0.13));
        color: #fff;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .dev-skill-logo {
        width: 16px;
        height: 16px;
        object-fit: contain;
        filter: brightness(1.2);
    }

    .dev-team-card:hover .dev-skill-tag {
        background: linear-gradient(90deg, rgba(139, 92, 246, 0.22), rgba(59, 130, 246, 0.18));
        transform: translateY(-2px);
    }

    .dev-member-stats {
        display: flex;
        justify-content: space-around;
        margin-bottom: 1.5rem;
    }

    .dev-stat-item {
        text-align: center;
    }

    .dev-stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #3b82f6;
        display: block;
    }

    .dev-stat-label {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .dev-social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .dev-social-link {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.13);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .dev-social-link:hover {
        background: #3b82f6;
        color: #fff;
        transform: translateY(-3px) scale(1.1);
    }

    @media (max-width: 768px) {
        .dev-section-title {
            font-size: 2.2rem;
        }

        .dev-team-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .dev-team-card {
            max-width: 100%;
        }
    }

    /* Swiper custom styles */
    .swiper-button-next,
    .swiper-button-prev {
        color: #3b82f6 !important;
        background: rgba(59, 130, 246, 0.1);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        backdrop-filter: blur(10px);
    }

    .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.5) !important;
    }

    .swiper-pagination-bullet-active {
        background: #3b82f6 !important;
    }
</style>

<section class=" py-16 md:py-24 glass-dark backdrop-blur-xl relative">
    <div class="dev-floating-shapes">
        <div class="dev-shape"></div>
        <div class="dev-shape"></div>
        <div class="dev-shape"></div>
    </div>
    <!-- <div class="dev-section-glass"> -->
    <div class="text-center mb-16">
        <h2 class="dev-section-title">Meet Our Team</h2>
        <p class="dev-section-subtitle">Tim developer berbakat yang siap mewujudkan visi digital Anda dengan keahlian terdepan dalam pengembangan website dan solusi teknologi inovatif.</p>
    </div>
    <div class="hidden sm:grid dev-team-grid sm:mx-8 md:mx-12">
        @foreach($developers as $developer)
        <div class="dev-team-card" onclick="window.location.href='{{ route('developer.profile', $developer->id) }}';" style="cursor: pointer;">
            <div class="dev-member-photo">
                <img src="{{ $developer->photo_url }}" alt="{{ $developer->name }}">
            </div>
            <h3 class="dev-member-name">{{ $developer->name }}</h3>
            <p class="dev-member-role">{{ $developer->role }}</p>
            <div class="dev-member-stats">
                <div class="dev-stat-item">
                    <span class="dev-stat-number">{{ $developer->years_experience }}+</span>
                    <span class="dev-stat-label">Years</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">{{ number_format($developer->projects_completed) }}{{ $developer->projects_completed > 1000000 ? 'M+' : '+' }}</span>
                    <span class="dev-stat-label">{{ $developer->projects_completed > 1000000 ? 'Requests' : 'Projects' }}</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">{{ $developer->success_rate }}</span>
                    <span class="dev-stat-label">{{ str_contains($developer->success_rate, '%') ? 'Success' : 'Awards' }}</span>
                </div>
            </div>
            <p class="dev-member-description">{{ $developer->description }}</p>
            <div class="dev-member-skills">
                @foreach($developer->skills as $skill)
                <div class="dev-skill-tag">
                    @if($skill->technology->logo_url)
                    <img src="{{ $skill->technology->logo_url }}" alt="{{ $skill->technology->name }}" class="dev-skill-logo">
                    @endif
                    <span>{{ $skill->technology->name }}</span>
                </div>
                @endforeach
            </div>
            <div class="dev-social-links">
                @if($developer->github_url)
                <a href="{{ $developer->github_url }}" class="dev-social-link" target="_blank" onclick="event.stopPropagation();"><i class="fab fa-github"></i></a>
                @endif
                @if($developer->linkedin_url)
                <a href="{{ $developer->linkedin_url }}" class="dev-social-link" target="_blank" onclick="event.stopPropagation();"><i class="fab fa-linkedin"></i></a>
                @endif
                @if($developer->portfolio_url)
                <a href="{{ $developer->portfolio_url }}" class="dev-social-link" target="_blank" onclick="event.stopPropagation();"><i class="fas fa-globe"></i></a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="block sm:hidden mx-4">
        <div class="swiper" id="devSwiper">
            <div class="swiper-wrapper">
                @foreach($developers as $developer)
                <div class="swiper-slide">
                    <div class="dev-team-card mx-2" onclick="window.location.href='{{ route('developer.profile', $developer->id) }}';" style="cursor: pointer;">
                        <div class="dev-member-photo">
                            <img src="{{ $developer->photo_url }}" alt="{{ $developer->name }}">
                        </div>
                        <h3 class="dev-member-name">{{ $developer->name }}</h3>
                        <p class="dev-member-role">{{ $developer->role }}</p>
                        <div class="dev-member-stats">
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">{{ $developer->years_experience }}+</span>
                                <span class="dev-stat-label">Years</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">{{ number_format($developer->projects_completed) }}{{ $developer->projects_completed > 1000000 ? 'M+' : '+' }}</span>
                                <span class="dev-stat-label">{{ $developer->projects_completed > 1000000 ? 'Requests' : 'Projects' }}</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">{{ $developer->success_rate }}</span>
                                <span class="dev-stat-label">{{ str_contains($developer->success_rate, '%') ? 'Success' : 'Awards' }}</span>
                            </div>
                        </div>
                        <p class="dev-member-description">{{ $developer->description }}</p>
                        <div class="dev-member-skills">
                            @foreach($developer->skills as $skill)
                            <div class="dev-skill-tag">
                                @if($skill->technology->logo_url)
                                <img src="{{ $skill->technology->logo_url }}" alt="{{ $skill->technology->name }}" class="dev-skill-logo">
                                @endif
                                <span>{{ $skill->technology->name }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="dev-social-links">
                            @if($developer->github_url)
                            <a href="{{ $developer->github_url }}" class="dev-social-link" target="_blank" onclick="event.stopPropagation();"><i class="fab fa-github"></i></a>
                            @endif
                            @if($developer->linkedin_url)
                            <a href="{{ $developer->linkedin_url }}" class="dev-social-link" target="_blank" onclick="event.stopPropagation();"><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if($developer->portfolio_url)
                            <a href="{{ $developer->portfolio_url }}" class="dev-social-link" target="_blank" onclick="event.stopPropagation();"><i class="fas fa-globe"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper for mobile
        const devSwiper = new Swiper('#devSwiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    enabled: false,
                }
            }
        });
    });
</script>