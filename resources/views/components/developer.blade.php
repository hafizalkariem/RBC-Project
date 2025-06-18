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
        <!-- Team Member 1 -->
        <div class="dev-team-card">
            <div class="dev-member-photo">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Rizki Pratama">
            </div>
            <h3 class="dev-member-name">Ahmad Hapizhudin</h3>
            <p class="dev-member-role">Lead Full-Stack Developer</p>
            <div class="dev-member-stats">
                <div class="dev-stat-item">
                    <span class="dev-stat-number">5+</span>
                    <span class="dev-stat-label">Years</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">150+</span>
                    <span class="dev-stat-label">Projects</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">98%</span>
                    <span class="dev-stat-label">Success</span>
                </div>
            </div>
            <p class="dev-member-description">Spesialis dalam React, Node.js, dan cloud architecture. Berpengalaman memimpin tim pengembangan aplikasi enterprise dan startup unicorn.</p>
            <div class="dev-member-skills">
                <span class="dev-skill-tag">React</span>
                <span class="dev-skill-tag">Node.js</span>
                <span class="dev-skill-tag">AWS</span>
                <span class="dev-skill-tag">Docker</span>
            </div>
            <div class="dev-social-links">
                <a href="#" class="dev-social-link"><i class="fab fa-github"></i></a>
                <a href="#" class="dev-social-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="dev-social-link"><i class="fas fa-globe"></i></a>
            </div>
        </div>
        <!-- Team Member 2 -->
        <div class="dev-team-card">
            <div class="dev-member-photo">
                <img src="https://images.unsplash.com/photo-1494790108755-2616b332c2b1?w=150&h=150&fit=crop&crop=face" alt="Bella Sari">
            </div>
            <h3 class="dev-member-name">Nurul Akbar</h3>
            <p class="dev-member-role">UI/UX Designer & Frontend Dev</p>
            <div class="dev-member-stats">
                <div class="dev-stat-item">
                    <span class="dev-stat-number">4+</span>
                    <span class="dev-stat-label">Years</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">200+</span>
                    <span class="dev-stat-label">Designs</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">15</span>
                    <span class="dev-stat-label">Awards</span>
                </div>
            </div>
            <p class="dev-member-description">Desainer kreatif dengan keahlian coding. Ahli dalam menciptakan pengalaman user yang menawan dan interface yang responsif.</p>
            <div class="dev-member-skills">
                <span class="dev-skill-tag">Figma</span>
                <span class="dev-skill-tag">Vue.js</span>
                <span class="dev-skill-tag">SASS</span>
                <span class="dev-skill-tag">Animation</span>
            </div>
            <div class="dev-social-links">
                <a href="#" class="dev-social-link"><i class="fab fa-github"></i></a>
                <a href="#" class="dev-social-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="dev-social-link"><i class="fas fa-palette"></i></a>
            </div>
        </div>
        <!-- Team Member 3 -->
        <div class="dev-team-card">
            <div class="dev-member-photo">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Cahyo Nugroho">
            </div>
            <h3 class="dev-member-name">M Dzaki Abiyyu</h3>
            <p class="dev-member-role">Backend Architect & DevOps</p>
            <div class="dev-member-stats">
                <div class="dev-stat-item">
                    <span class="dev-stat-number">6+</span>
                    <span class="dev-stat-label">Years</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">99.9%</span>
                    <span class="dev-stat-label">Uptime</span>
                </div>
                <div class="dev-stat-item">
                    <span class="dev-stat-number">50M+</span>
                    <span class="dev-stat-label">Requests</span>
                </div>
            </div>
            <p class="dev-member-description">Arsitek sistem yang handal dalam membangun infrastruktur scalable. Expert dalam microservices dan cloud optimization.</p>
            <div class="dev-member-skills">
                <span class="dev-skill-tag">Python</span>
                <span class="dev-skill-tag">Kubernetes</span>
                <span class="dev-skill-tag">PostgreSQL</span>
                <span class="dev-skill-tag">Redis</span>
            </div>
            <div class="dev-social-links">
                <a href="#" class="dev-social-link"><i class="fab fa-github"></i></a>
                <a href="#" class="dev-social-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="dev-social-link"><i class="fas fa-server"></i></a>
            </div>
        </div>
    </div>
    <div class="block sm:hidden mx-4">
        <div class="swiper" id="devSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="dev-team-card mx-2">
                        <div class="dev-member-photo">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Rizki Pratama">
                        </div>
                        <h3 class="dev-member-name">Ahmad Hapizhudin</h3>
                        <p class="dev-member-role">Lead Full-Stack Developer</p>
                        <div class="dev-member-stats">
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">5+</span>
                                <span class="dev-stat-label">Years</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">150+</span>
                                <span class="dev-stat-label">Projects</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">98%</span>
                                <span class="dev-stat-label">Success</span>
                            </div>
                        </div>
                        <p class="dev-member-description">Spesialis dalam React, Node.js, dan cloud architecture. Berpengalaman memimpin tim pengembangan aplikasi enterprise dan startup unicorn.</p>
                        <div class="dev-member-skills">
                            <span class="dev-skill-tag">React</span>
                            <span class="dev-skill-tag">Node.js</span>
                            <span class="dev-skill-tag">AWS</span>
                            <span class="dev-skill-tag">Docker</span>
                        </div>
                        <div class="dev-social-links">
                            <a href="#" class="dev-social-link"><i class="fab fa-github"></i></a>
                            <a href="#" class="dev-social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="dev-social-link"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="dev-team-card mx-2">
                        <div class="dev-member-photo">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Rizki Pratama">
                        </div>
                        <h3 class="dev-member-name">Ahmad Hapizhudin</h3>
                        <p class="dev-member-role">Lead Full-Stack Developer</p>
                        <div class="dev-member-stats">
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">5+</span>
                                <span class="dev-stat-label">Years</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">150+</span>
                                <span class="dev-stat-label">Projects</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">98%</span>
                                <span class="dev-stat-label">Success</span>
                            </div>
                        </div>
                        <p class="dev-member-description">Spesialis dalam React, Node.js, dan cloud architecture. Berpengalaman memimpin tim pengembangan aplikasi enterprise dan startup unicorn.</p>
                        <div class="dev-member-skills">
                            <span class="dev-skill-tag">React</span>
                            <span class="dev-skill-tag">Node.js</span>
                            <span class="dev-skill-tag">AWS</span>
                            <span class="dev-skill-tag">Docker</span>
                        </div>
                        <div class="dev-social-links">
                            <a href="#" class="dev-social-link"><i class="fab fa-github"></i></a>
                            <a href="#" class="dev-social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="dev-social-link"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="dev-team-card mx-2">
                        <div class="dev-member-photo">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Rizki Pratama">
                        </div>
                        <h3 class="dev-member-name">Ahmad Hapizhudin</h3>
                        <p class="dev-member-role">Lead Full-Stack Developer</p>
                        <div class="dev-member-stats">
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">5+</span>
                                <span class="dev-stat-label">Years</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">150+</span>
                                <span class="dev-stat-label">Projects</span>
                            </div>
                            <div class="dev-stat-item">
                                <span class="dev-stat-number">98%</span>
                                <span class="dev-stat-label">Success</span>
                            </div>
                        </div>
                        <p class="dev-member-description">Spesialis dalam React, Node.js, dan cloud architecture. Berpengalaman memimpin tim pengembangan aplikasi enterprise dan startup unicorn.</p>
                        <div class="dev-member-skills">
                            <span class="dev-skill-tag">React</span>
                            <span class="dev-skill-tag">Node.js</span>
                            <span class="dev-skill-tag">AWS</span>
                            <span class="dev-skill-tag">Docker</span>
                        </div>
                        <div class="dev-social-links">
                            <a href="#" class="dev-social-link"><i class="fab fa-github"></i></a>
                            <a href="#" class="dev-social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="dev-social-link"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth < 640) {
            new Swiper('#devSwiper', {
                slidesPerView: 1,
                spaceBetween: 16,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }
    });
</script>