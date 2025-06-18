<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .form-input {
        transition: all 0.3s ease;
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.18);
        color: #fff;
    }

    .form-input:focus {
        background: rgba(30, 41, 59, 0.7);
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .send-button {
        background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 50%, #8b5cf6 100%);
        color: #fff;
        transition: all 0.3s ease;
        border: none;
    }

    .send-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.18);
        background: linear-gradient(135deg, #2563eb 0%, #06b6d4 50%, #7c3aed 100%);
    }

    .contact-gradient {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 40%, #06b6d4 80%, #8b5cf6 100%);
    }

    .map-container {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .map-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.08), rgba(139, 92, 246, 0.08));
        pointer-events: none;
        z-index: 1;
    }

    .contact-info-card {
        background: rgba(30, 41, 59, 0.55);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.13);
        transition: all 0.3s ease;
    }

    .contact-info-card:hover {
        transform: translateY(-2px);
        background: rgba(30, 41, 59, 0.7);
        border-color: rgba(139, 92, 246, 0.18);
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

    .pulse-animation {
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.05);
            opacity: 0.8;
        }
    }
</style>

<section class="glass-dark backdrop-blur-xl py-20">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 fade-in">
                Hubungi Kami
            </h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto fade-in stagger-1">
                Siap membantu mewujudkan visi digital Anda. Kunjungi kantor kami atau kirim pesan untuk konsultasi gratis.
            </p>
        </div>

        <!-- Contact Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Left Side - Map & Contact Info -->
            <div class="space-y-8">
                <!-- Google Maps Embed -->
                <div class="map-container fade-in stagger-2">
                    <div class="map-overlay"></div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4942.180690914655!2d107.25819508507281!3d-6.245441345003729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6982f5a56c950d%3A0xe95bfdf1e9a490f9!2sMI%20Al-Ikhlas!5e1!3m2!1sen!2sid!4v1750281936011!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Contact Information Cards -->
                <div class="space-y-4">
                    <!-- Address -->
                    <div class="contact-info-card rounded-xl p-6 fade-in stagger-3">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 floating-animation">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-lg mb-2">Alamat Kantor</h3>
                                <p class="text-white/80 leading-relaxed">
                                    Jl. Sudirman No. 123, Blok A-15<br>
                                    Jakarta Selatan, DKI Jakarta 12190<br>
                                    Indonesia
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="contact-info-card rounded-xl p-6 fade-in stagger-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 pulse-animation">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-lg mb-2">Telepon & WhatsApp</h3>
                                <p class="text-white/80 leading-relaxed">
                                    <a href="tel:+6281234567890" class="hover:text-white transition-colors">+62 812-3456-7890</a><br>
                                    <a href="https://wa.me/6281234567890" class="hover:text-white transition-colors flex items-center mt-1">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        WhatsApp Business
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <!-- Right Side - Contact Form -->
            <div class="fade-in stagger-3">
                <div class="contact-info-card rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                        <i class="fas fa-paper-plane mr-3"></i>
                        Kirim Pesan
                    </h3>

                    <form id="contactForm" class="space-y-6">
                        <!-- Name & Email Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white/90 font-medium mb-2">Nama Lengkap</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Masukkan nama lengkap"
                                    class="form-input w-full px-4 py-3 rounded-lg text-white placeholder-white/70 focus:outline-none"
                                    required>
                            </div>
                            <div>
                                <label class="block text-white/90 font-medium mb-2">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="nama@email.com"
                                    class="form-input w-full px-4 py-3 rounded-lg text-white placeholder-white/70 focus:outline-none"
                                    required>
                            </div>
                        </div>

                        <!-- Phone & Subject Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white/90 font-medium mb-2">No. Telepon</label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    placeholder="+62 812-3456-7890"
                                    class="form-input w-full px-4 py-3 rounded-lg text-white placeholder-white/70 focus:outline-none"
                                    required>
                            </div>
                            <div>
                                <label class="block text-white/90 font-medium mb-2">Layanan yang Diminati</label>
                                <select
                                    id="service"
                                    name="service"
                                    class="form-input w-full px-4 py-3 rounded-lg text-white focus:outline-none"
                                    required>
                                    <option value="" class="text-gray-800">Pilih Layanan</option>
                                    <option value="website-elearning" class="text-gray-800">Website E-Learning</option>
                                    <option value="landing-page-umkm" class="text-gray-800">Landing Page UMKM</option>
                                    <option value="company-profile" class="text-gray-800">Website Company Profile</option>
                                    <option value="source-code" class="text-gray-800">Source Code Aplikasi</option>
                                    <option value="hosting-domain" class="text-gray-800">Hosting & Domain</option>
                                    <option value="konsultasi" class="text-gray-800">Konsultasi Digital</option>
                                    <option value="lainnya" class="text-gray-800">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-white/90 font-medium mb-2">Pesan</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Ceritakan kebutuhan proyek Anda..."
                                class="form-input w-full px-4 py-3 rounded-lg text-white placeholder-white/70 focus:outline-none resize-none"
                                required></textarea>
                        </div>

                        <!-- Budget Range -->
                        <div>
                            <label class="block text-white/90 font-medium mb-2">Estimasi Budget</label>
                            <select
                                id="budget"
                                name="budget"
                                class="form-input w-full px-4 py-3 rounded-lg text-white focus:outline-none">
                                <option value="" class="text-gray-800">Pilih Range Budget (Opsional)</option>
                                <option value="under-5jt" class="text-gray-800">Di bawah Rp 5 Juta</option>
                                <option value="5-15jt" class="text-gray-800">Rp 5 - 15 Juta</option>
                                <option value="15-50jt" class="text-gray-800">Rp 15 - 50 Juta</option>
                                <option value="above-50jt" class="text-gray-800">Di atas Rp 50 Juta</option>
                            </select>
                        </div>

                        <!-- Privacy Policy -->
                        <div class="flex items-start space-x-3">
                            <input
                                type="checkbox"
                                id="privacy"
                                class="mt-1 w-4 h-4 text-purple-600 border-white/30 rounded focus:ring-purple-500"
                                required>
                            <label for="privacy" class="text-white/80 text-sm">
                                Saya setuju dengan <a href="#" class="text-white hover:underline">Kebijakan Privasi</a>
                                dan <a href="#" class="text-white hover:underline">Syarat & Ketentuan</a> yang berlaku.
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="send-button w-full py-4 px-6 bg-white text-purple-600 font-bold rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-purple-500/30 transition-all duration-300 flex items-center justify-center space-x-2">
                            <i class="fas fa-paper-plane"></i>
                            <span>Kirim Pesan</span>
                        </button>

                        <!-- Response Time Info -->
                        <div class="text-center text-white/70 text-sm">
                            <i class="fas fa-clock mr-2"></i>
                            Kami akan merespons dalam 24 jam kerja
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</section>

<script>
    // Form submission handling
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const submitButton = this.querySelector('button[type="submit"]');
        const originalContent = submitButton.innerHTML;

        // Show loading state
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i><span>Mengirim...</span>';
        submitButton.disabled = true;

        // Simulate form submission (replace with actual form handling)
        setTimeout(() => {
            // Success state
            submitButton.innerHTML = '<i class="fas fa-check mr-2"></i><span>Terkirim!</span>';
            submitButton.classList.add('bg-green-500', 'hover:bg-green-600');
            submitButton.classList.remove('bg-white', 'text-purple-600');

            // Reset form
            this.reset();

            // Show success message
            showNotification('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.', 'success');

            // Reset button after 3 seconds
            setTimeout(() => {
                submitButton.innerHTML = originalContent;
                submitButton.disabled = false;
                submitButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                submitButton.classList.add('bg-white', 'text-purple-600');
            }, 3000);

        }, 2000);
    });

    // Form validation
    const inputs = document.querySelectorAll('input[required], select[required], textarea[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('border-red-400');
            } else {
                this.classList.remove('border-red-400');
            }
        });
    });

    // Email validation
    document.getElementById('email').addEventListener('input', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(this.value)) {
            this.classList.add('border-red-400');
        } else {
            this.classList.remove('border-red-400');
        }
    });

    // Phone number formatting
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.startsWith('62')) {
            value = '+' + value;
        } else if (value.startsWith('0')) {
            value = '+62' + value.substring(1);
        } else if (value.length > 0 && !value.startsWith('+')) {
            value = '+62' + value;
        }
        e.target.value = value;
    });

    // Notification system
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500' : 'bg-blue-500'
            } text-white`;
        notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Animate out and remove
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 5000);
    }

    // Animate elements on scroll
    const observerOptionsContact = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observerContact = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptionsContact);

    // Observe all elements with fade-in class
    document.addEventListener('DOMContentLoaded', () => {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach(el => observerContact.observe(el));
    });
</script>