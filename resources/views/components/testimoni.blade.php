<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    .testimonials-section {
        padding: 5rem 0;
        position: relative;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
    }

    .section-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff, #f0f9ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .testimonials-container {
        position: relative;
        overflow: hidden;
        padding: 2rem 0;
    }

    .testimonials-track {
        display: flex;
        gap: 2rem;
        transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        will-change: transform;
    }

    .testimonial-card {
        min-width: 400px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 24px;
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .testimonial-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
        background-size: 300% 100%;
        animation: gradient-shift 3s ease infinite;
    }

    @keyframes gradient-shift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .testimonial-card:hover {
        transform: translateY(-8px) scale(1.02);
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }

    .quote-icon {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        font-size: 2rem;
        color: rgba(255, 255, 255, 0.2);
        transform: rotate(180deg);
    }

    .testimonial-text {
        font-size: 1.1rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        word-break: break-word;
        overflow-wrap: break-word;
        font-style: italic;
        position: relative;
    }

    .client-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .client-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .testimonial-card:hover .client-avatar {
        border-color: rgba(255, 255, 255, 0.6);
        transform: scale(1.1);
    }

    .client-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .client-details h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.3rem;
    }

    .client-role {
        font-size: 0.9rem;
        color: #4ecdc4;
        font-weight: 500;
    }

    .client-company {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 0.2rem;
    }

    .rating {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        display: flex;
        gap: 0.2rem;
    }

    .star {
        color: #ffd700;
        font-size: 1.2rem;
        text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
    }

    .project-info {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .project-tag {
        display: inline-block;
        background: rgba(78, 205, 196, 0.2);
        color: #4ecdc4;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-right: 0.5rem;
    }

    .navigation {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-top: 3rem;
    }

    .nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .nav-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .nav-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .indicators {
        display: flex;
        gap: 0.5rem;
    }

    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .indicator.active {
        background: #4ecdc4;
        transform: scale(1.2);
        box-shadow: 0 0 10px rgba(78, 205, 196, 0.5);
    }

    .auto-play-toggle {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .auto-play-toggle:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .auto-play-toggle.active {
        background: rgba(78, 205, 196, 0.3);
        border-color: #4ecdc4;
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .floating-element {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        animation: float-random 8s ease-in-out infinite;
    }

    .floating-element:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 5%;
        animation-delay: -3s;
    }

    .floating-element:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 10%;
        left: 15%;
        animation-delay: -6s;
    }

    @keyframes float-random {

        0%,
        100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
        }

        25% {
            transform: translateY(-30px) translateX(20px) rotate(90deg);
        }

        50% {
            transform: translateY(-10px) translateX(-15px) rotate(180deg);
        }

        75% {
            transform: translateY(-40px) translateX(10px) rotate(270deg);
        }
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 2.5rem;
        }

        .testimonial-card {
            min-width: calc(100vw - 64px);
            max-width: calc(100vw - 64px);
            padding: 1.5rem;
            margin: 0 16px;
        }

        .testimonials-track {
            gap: 16px;
        }

        .navigation {
            flex-direction: column;
            gap: 1.5rem;
        }

        .container {
            padding: 0 1rem;
        }
    }

    .success-metrics {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin-top: 4rem;
        flex-wrap: wrap;
    }

    .metric-item {
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        min-width: 150px;
        transition: all 0.3s ease;
    }

    .metric-item:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.15);
    }

    .metric-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #4ecdc4;
        display: block;
        margin-bottom: 0.5rem;
    }

    .metric-label {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    @media (min-width: 640px) and (max-width: 1023px) {
        .testimonial-card {
            min-width: 320px;
            max-width: 80vw;
            padding: 2rem;
        }

        .testimonial-text {
            font-size: 1rem;
        }
    }

    @media (min-width: 1024px) {
        .testimonial-card {
            min-width: 500px;
            max-width: 600px;
            padding: 2.5rem 2.5rem;
        }
    }
</style>



<section class="testimonials-section">
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Kepercayaan klien adalah prioritas utama kami. Berikut testimoni dari berbagai perusahaan yang telah mempercayakan proyeknya kepada RBC.</p>
        </div>

        <div class="testimonials-container">
            <div class="testimonials-track" id="testimonialsTrack">

                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">
                        "RBC team benar-benar luar biasa! Mereka tidak hanya membangun website e-commerce kami, tapi juga memberikan insight bisnis yang sangat berharga. ROI kami meningkat 300% setelah launching."
                    </p>
                    <div class="client-info">
                        <div class="client-avatar">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=150&h=150&fit=crop&crop=face" alt="Ahmad Fauzi">
                        </div>
                        <div class="client-details">
                            <h4>Ahmad Fauzi</h4>
                            <p class="client-role">CEO & Founder</p>
                            <p class="client-company">TechStart Indonesia</p>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">E-Commerce</span>
                        <span class="project-tag">Mobile App</span>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">
                        "Profesionalisme dan kualitas kerja RBC sangat mengesankan. Dashboard analytics yang mereka buat membantu kami mengoptimalkan performa bisnis dengan data yang akurat dan real-time."
                    </p>
                    <div class="client-info">
                        <div class="client-avatar">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b332c2b1?w=150&h=150&fit=crop&crop=face" alt="Sarah Wijaya">
                        </div>
                        <div class="client-details">
                            <h4>Sarah Wijaya</h4>
                            <p class="client-role">Marketing Director</p>
                            <p class="client-company">Digital Solutions Corp</p>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">Dashboard</span>
                        <span class="project-tag">Analytics</span>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">
                        "Tim RBC sangat responsif dan memahami kebutuhan startup kami. Aplikasi mobile yang mereka develop telah didownload 50K+ users dan rating 4.8 di Play Store!"
                    </p>
                    <div class="client-info">
                        <div class="client-avatar">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Budi Santoso">
                        </div>
                        <div class="client-details">
                            <h4>Budi Santoso</h4>
                            <p class="client-role">Co-Founder</p>
                            <p class="client-company">InnovateTech</p>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">Mobile App</span>
                        <span class="project-tag">Startup</span>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="testimonial-card">
                    <div class="rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">
                        "Source code yang dibeli dari RBC berkualitas tinggi dan well-documented. Tim support mereka juga sangat membantu dalam proses customization. Worth every penny!"
                    </p>
                    <div class="client-info">
                        <div class="client-avatar">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" alt="Lisa Pratiwi">
                        </div>
                        <div class="client-details">
                            <h4>Lisa Pratiwi</h4>
                            <p class="client-role">Lead Developer</p>
                            <p class="client-company">CodeCraft Studio</p>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">Source Code</span>
                        <span class="project-tag">Support</span>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="testimonial-card">
                    <div class="rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">
                        "Website company profile yang dibuat RBC benar-benar mengangkat brand image perusahaan kami. Design yang modern dan performa yang cepat membuat client impression sangat positif."
                    </p>
                    <div class="client-info">
                        <div class="client-avatar">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Dika Pratama">
                        </div>
                        <div class="client-details">
                            <h4>Dika Pratama</h4>
                            <p class="client-role">Business Owner</p>
                            <p class="client-company">Pratama Consulting</p>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">Company Profile</span>
                        <span class="project-tag">Branding</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="navigation">
            <button class="nav-btn" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="indicators" id="indicators"></div>

            <button class="nav-btn" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="navigation">
            <button class="auto-play-toggle" id="autoPlayToggle">
                <i class="fas fa-play"></i> Auto Play
            </button>
        </div>

        <div class="success-metrics">
            <div class="metric-item">
                <span class="metric-number">98%</span>
                <span class="metric-label">Client Satisfaction</span>
            </div>
            <div class="metric-item">
                <span class="metric-number">200+</span>
                <span class="metric-label">Happy Clients</span>
            </div>
            <div class="metric-item">
                <span class="metric-number">350+</span>
                <span class="metric-label">Projects Completed</span>
            </div>
            <div class="metric-item">
                <span class="metric-number">24/7</span>
                <span class="metric-label">Support</span>
            </div>
        </div>
    </div>
</section>

<script>
    class TestimonialSlider {
        constructor() {
            this.track = document.getElementById('testimonialsTrack');
            this.cards = document.querySelectorAll('.testimonial-card');
            this.prevBtn = document.getElementById('prevBtn');
            this.nextBtn = document.getElementById('nextBtn');
            this.indicators = document.getElementById('indicators');
            this.autoPlayToggle = document.getElementById('autoPlayToggle');

            this.currentIndex = 0;
            this.isAutoPlay = false;
            this.autoPlayInterval = null;
            this.cardWidth = 400 + 32; // card width + gap

            this.init();
        }


        setCardWidth() {
            if (this.cards.length > 0) {
                const isMobile = window.innerWidth < 768;
                this.cardWidth = isMobile ? window.innerWidth - 32 : this.cards[0].offsetWidth + 32;
            }
        }

        setTrackWidth() {
            this.setCardWidth();
            const isMobile = window.innerWidth < 768;
            if (isMobile) {
                this.track.style.width = `${this.cards.length * this.cardWidth}px`;
            } else {
                this.track.style.width = `${this.cards.length * (400 + 32)}px`;
            }
        }

        init() {
            this.setTrackWidth();
            this.createIndicators();
            this.updateView();
            this.bindEvents();
            this.startAutoPlay();

            window.addEventListener('resize', () => {
                window.requestAnimationFrame(() => {
                    this.setTrackWidth();
                    this.updateView();
                });
            });
        }

        createIndicators() {
            this.cards.forEach((_, index) => {
                const indicator = document.createElement('div');
                indicator.className = 'indicator';
                indicator.addEventListener('click', () => this.goToSlide(index));
                this.indicators.appendChild(indicator);
            });
        }

        bindEvents() {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
            this.nextBtn.addEventListener('click', () => this.nextSlide());
            this.autoPlayToggle.addEventListener('click', () => this.toggleAutoPlay());

            // Touch/swipe support
            let startX = 0;
            let endX = 0;

            this.track.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            });

            this.track.addEventListener('touchend', (e) => {
                endX = e.changedTouches[0].clientX;
                const diff = startX - endX;

                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            });

            // Pause auto-play on hover
            this.track.addEventListener('mouseenter', () => {
                if (this.isAutoPlay) {
                    this.pauseAutoPlay();
                }
            });

            this.track.addEventListener('mouseleave', () => {
                if (this.isAutoPlay) {
                    this.startAutoPlay();
                }
            });
        }

        updateView() {
            const isMobile = window.innerWidth < 768;
            const offset = isMobile ? 
                -this.currentIndex * this.cardWidth : 
                -this.currentIndex * (this.cards[0].offsetWidth + 32);
            
            this.track.style.transform = `translateX(${offset}px)`;

            // Update indicators
            document.querySelectorAll('.indicator').forEach((indicator, index) => {
                indicator.classList.toggle('active', index === this.currentIndex);
            });

            // Update navigation buttons
            this.prevBtn.disabled = this.currentIndex === 0;
            this.nextBtn.disabled = this.currentIndex === this.cards.length - 1;
        }

        goToSlide(index) {
            this.currentIndex = Math.max(0, Math.min(index, this.cards.length - 1));
            this.updateView();
        }

        nextSlide() {
            if (this.currentIndex < this.cards.length - 1) {
                this.currentIndex++;
            } else {
                this.currentIndex = 0; // Loop back to start
            }
            this.updateView();
        }

        prevSlide() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            } else {
                this.currentIndex = this.cards.length - 1; // Loop to end
            }
            this.updateView();
        }

        toggleAutoPlay() {
            this.isAutoPlay = !this.isAutoPlay;

            if (this.isAutoPlay) {
                this.startAutoPlay();
                this.autoPlayToggle.innerHTML = '<i class="fas fa-pause"></i> Auto Play';
                this.autoPlayToggle.classList.add('active');
            } else {
                this.pauseAutoPlay();
                this.autoPlayToggle.innerHTML = '<i class="fas fa-play"></i> Auto Play';
                this.autoPlayToggle.classList.remove('active');
            }
        }

        startAutoPlay() {
            if (this.isAutoPlay) {
                this.autoPlayInterval = setInterval(() => {
                    this.nextSlide();
                }, 4000);
            }
        }

        pauseAutoPlay() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = null;
            }
        }
    }

    // Initialize slider when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new TestimonialSlider();
    });

    // Add scroll reveal animation
    const observerOptionsTestimoni = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observerTestimoni = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptionsTestimoni);

    // Animate testimonial cards on scroll
    document.querySelectorAll('.testimonial-card').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px)';
        card.style.transition = `all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) ${index * 0.1}s`;
        observerTestimoni.observe(card);
    });

    // Animate metrics
    document.querySelectorAll('.metric-item').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.5s ease ${index * 0.1}s`;
        observerTestimoni.observe(item);
    });
</script>