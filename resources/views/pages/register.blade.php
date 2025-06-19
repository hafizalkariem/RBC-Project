<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - CodeShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    backdropBlur: {
                        xs: '2px',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                        'wiggle': 'wiggle 0.5s ease-in-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px) rotate(0deg)'
                            },
                            '50%': {
                                transform: 'translateY(-20px) rotate(10deg)'
                            },
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 20px rgba(59, 130, 246, 0.3)'
                            },
                            '100%': {
                                boxShadow: '0 0 40px rgba(59, 130, 246, 0.6)'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(30px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'scale(0.9)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'scale(1)'
                            },
                        },
                        pulseGlow: {
                            '0%, 100%': {
                                boxShadow: '0 0 20px rgba(139, 92, 246, 0.3)'
                            },
                            '50%': {
                                boxShadow: '0 0 40px rgba(139, 92, 246, 0.6)'
                            },
                        },
                        wiggle: {
                            '0%, 100%': {
                                transform: 'rotate(0deg)'
                            },
                            '25%': {
                                transform: 'rotate(-3deg)'
                            },
                            '75%': {
                                transform: 'rotate(3deg)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .glass-button {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.4), rgba(147, 51, 234, 0.4));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .glass-button:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.6), rgba(147, 51, 234, 0.6));
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .dark-gradient-bg {
            background: linear-gradient(135deg, #0d1a2b 0%, #1a3d5b 100%);
        }

        .floating-shapes::before {
            content: '';
            position: absolute;
            top: 15%;
            right: 15%;
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.08), rgba(147, 51, 234, 0.08));
            border-radius: 50%;
            animation: float 10s ease-in-out infinite;
        }

        .floating-shapes::after {
            content: '';
            position: absolute;
            bottom: 15%;
            left: 10%;
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, rgba(236, 72, 153, 0.08), rgba(59, 130, 246, 0.08));
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: float 8s ease-in-out infinite reverse;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .strength-weak {
            color: #ef4444;
        }

        .strength-medium {
            color: #f59e0b;
        }

        .strength-strong {
            color: #10b981;
        }

        .form-group {
            position: relative;
        }

        .form-group .icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            z-index: 10;
        }

        .form-group input {
            padding-left: 48px;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: rgba(255, 255, 255, 0.6);
            z-index: 10;
        }

        .social-button {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .social-button:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .checkbox-custom {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            position: relative;
            cursor: pointer;
        }

        .checkbox-custom:checked {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-color: #3b82f6;
        }

        .checkbox-custom:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body class="dark:bg-gray-900 glass-dark min-h-screen transition-colors duration-300 overflow-x-hidden">
    <!-- Background with floating shapes -->
    <div class="fixed inset-0 dark-gradient-bg floating-shapes overflow-hidden">
        <!-- Additional floating elements -->
        <div class="absolute top-1/4 left-1/4 w-16 h-16 bg-blue-500/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/3 w-24 h-24 bg-purple-500/10 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 right-1/4 w-20 h-20 bg-pink-500/10 rounded-full blur-xl animate-pulse delay-500"></div>
        <div class="absolute bottom-1/3 left-1/3 w-12 h-12 bg-cyan-500/10 rounded-full blur-xl animate-pulse delay-700"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8 animate-fade-in">
                <div class="inline-flex items-center justify-center w-16 h-16 glass rounded-2xl mb-4 animate-pulse-glow">
                    <x-brand class="text-3xl text-white" />
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">
                    Bergabung dengan <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">RBC</span>
                </h1>
                <p class="text-white/70">Mulai perjalanan coding Anda bersama kami</p>
            </div>

            <!-- Register Form -->
            <div class="glass-card rounded-3xl p-8 shadow-2xl animate-slide-up">
                <form id="registerForm" class="space-y-6">
                    <!-- Name Input -->
                    <div class="form-group">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text"
                            id="fullName"
                            placeholder="Nama Lengkap"
                            class="w-full py-4 rounded-2xl glass-input text-white placeholder-white/60 focus:outline-none transition-all duration-300"
                            required>
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="email"
                            id="email"
                            placeholder="Email Address"
                            class="w-full py-4 rounded-2xl glass-input text-white placeholder-white/60 focus:outline-none transition-all duration-300"
                            required>
                        <div id="emailError" class="text-red-400 text-sm mt-1 hidden">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            Email tidak valid
                        </div>
                    </div>

                    <!-- Username Input -->
                    <div class="form-group">
                        <div class="icon">
                            <i class="fas fa-at"></i>
                        </div>
                        <input type="text"
                            id="username"
                            placeholder="Username"
                            class="w-full py-4 rounded-2xl glass-input text-white placeholder-white/60 focus:outline-none transition-all duration-300"
                            required>
                        <div id="usernameStatus" class="text-sm mt-1 hidden">
                            <i class="fas fa-check-circle text-green-400 mr-1"></i>
                            Username tersedia
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password"
                            id="password"
                            placeholder="Password"
                            class="w-full py-4 rounded-2xl glass-input text-white placeholder-white/60 focus:outline-none transition-all duration-300"
                            required>
                        <div class="toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye" id="passwordEye"></i>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div id="passwordStrength" class="mt-2 hidden">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-sm text-white/70">Kekuatan Password:</span>
                                <span id="strengthText" class="text-sm font-semibold">Lemah</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2 overflow-hidden">
                                <div id="strengthBar" class="h-full transition-all duration-300 bg-red-500 w-1/3"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="form-group">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password"
                            id="confirmPassword"
                            placeholder="Konfirmasi Password"
                            class="w-full py-4 rounded-2xl glass-input text-white placeholder-white/60 focus:outline-none transition-all duration-300"
                            required>
                        <div class="toggle-password" onclick="togglePassword('confirmPassword')">
                            <i class="fas fa-eye" id="confirmPasswordEye"></i>
                        </div>
                        <div id="passwordMatch" class="text-sm mt-1 hidden">
                            <i class="fas fa-times-circle text-red-400 mr-1"></i>
                            Password tidak cocok
                        </div>
                    </div>

                    <!-- Phone Input -->
                    <div class="form-group">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <input type="tel"
                            id="phone"
                            placeholder="Nomor Telepon (Opsional)"
                            class="w-full py-4 rounded-2xl glass-input text-white placeholder-white/60 focus:outline-none transition-all duration-300">
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start gap-3">
                        <input type="checkbox" id="terms" class="checkbox-custom mt-1" required>
                        <label for="terms" class="text-sm text-white/80 leading-relaxed cursor-pointer">
                            Saya setuju dengan
                            <a href="#" class="text-blue-400 hover:text-blue-300 underline">Syarat & Ketentuan</a>
                            dan
                            <a href="#" class="text-blue-400 hover:text-blue-300 underline">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Newsletter Subscription -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="newsletter" class="checkbox-custom">
                        <label for="newsletter" class="text-sm text-white/80 cursor-pointer">
                            Saya ingin menerima update dan penawaran khusus
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        id="submitBtn"
                        class="w-full py-4 rounded-2xl glass-button text-white font-semibold transition-all duration-300 hover:scale-105 focus:outline-none relative overflow-hidden">
                        <span id="submitText">
                            <i class="fas fa-user-plus mr-2"></i>
                            Daftar Sekarang
                        </span>
                        <div id="loadingSpinner" class="hidden absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-spinner animate-spin mr-2"></i>
                            Mendaftar...
                        </div>
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center my-8">
                    <div class="flex-1 h-px bg-white/20"></div>
                    <span class="px-4 text-white/60 text-sm">atau</span>
                    <div class="flex-1 h-px bg-white/20"></div>
                </div>

                <!-- Social Login -->
                <div class="space-y-3">
                    <button class="w-full py-3 rounded-xl social-button text-white font-medium flex items-center justify-center gap-3">
                        <i class="fab fa-google text-red-400"></i>
                        Daftar dengan Google
                    </button>
                    <button class="w-full py-3 rounded-xl social-button text-white font-medium flex items-center justify-center gap-3">
                        <i class="fab fa-github text-gray-300"></i>
                        Daftar dengan GitHub
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-8">
                    <p class="text-white/70">
                        Sudah punya akun?
                        <a href="#" class="text-blue-400 hover:text-blue-300 font-semibold underline transition-colors">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-white/50 text-sm animate-fade-in">
                <p>© 2025 CodeShop. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="glass-card rounded-3xl p-8 max-w-md mx-4 text-center animate-fade-in">
            <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-green-400 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-2">Pendaftaran Berhasil!</h3>
            <p class="text-white/70 mb-6">Akun Anda telah berhasil dibuat. Silakan cek email untuk verifikasi.</p>
            <button onclick="closeModal()" class="glass-button px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300">
                <i class="fas fa-arrow-right mr-2"></i>
                Lanjutkan
            </button>
        </div>
    </div>

    <script>
        // Form validation and interaction
        const form = document.getElementById('registerForm');
        const emailInput = document.getElementById('email');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const submitBtn = document.getElementById('submitBtn');

        // Email validation
        emailInput.addEventListener('blur', function() {
            const email = this.value;
            const emailError = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email && !emailRegex.test(email)) {
                emailError.classList.remove('hidden');
                this.classList.add('border-red-400');
            } else {
                emailError.classList.add('hidden');
                this.classList.remove('border-red-400');
            }
        });

        // Username availability check (mock)
        usernameInput.addEventListener('blur', function() {
            const username = this.value;
            const usernameStatus = document.getElementById('usernameStatus');

            if (username.length >= 3) {
                // Simulate API call
                setTimeout(() => {
                    usernameStatus.classList.remove('hidden');
                    usernameStatus.innerHTML = '<i class="fas fa-check-circle text-green-400 mr-1"></i>Username tersedia';
                }, 500);
            } else {
                usernameStatus.classList.add('hidden');
            }
        });

        // Password strength checker
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');

            if (password.length > 0) {
                strengthIndicator.classList.remove('hidden');

                let strength = 0;
                let strengthLabel = 'Lemah';
                let strengthColor = 'bg-red-500';

                // Check password criteria
                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/\d/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                if (strength >= 3) {
                    strengthLabel = 'Sedang';
                    strengthColor = 'bg-yellow-500';
                    strengthBar.style.width = '66%';
                }
                if (strength >= 4) {
                    strengthLabel = 'Kuat';
                    strengthColor = 'bg-green-500';
                    strengthBar.style.width = '100%';
                }

                strengthText.textContent = strengthLabel;
                strengthText.className = `text-sm font-semibold strength-${strengthLabel.toLowerCase()}`;
                strengthBar.className = `h-full transition-all duration-300 ${strengthColor}`;
            } else {
                strengthIndicator.classList.add('hidden');
            }
        });

        // Password match validation
        confirmPasswordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const confirmPassword = this.value;
            const passwordMatch = document.getElementById('passwordMatch');

            if (confirmPassword.length > 0) {
                if (password !== confirmPassword) {
                    passwordMatch.classList.remove('hidden');
                    passwordMatch.innerHTML = '<i class="fas fa-times-circle text-red-400 mr-1"></i>Password tidak cocok';
                    this.classList.add('border-red-400');
                } else {
                    passwordMatch.classList.add('hidden');
                    passwordMatch.innerHTML = '<i class="fas fa-check-circle text-green-400 mr-1"></i>Password cocok';
                    passwordMatch.classList.remove('hidden');
                    this.classList.remove('border-red-400');
                    setTimeout(() => passwordMatch.classList.add('hidden'), 2000);
                }
            } else {
                passwordMatch.classList.add('hidden');
            }
        });

        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + 'Eye');

            if (field.type === 'password') {
                field.type = 'text';
                eye.className = 'fas fa-eye-slash';
            } else {
                field.type = 'password';
                eye.className = 'fas fa-eye';
            }
        }

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Show loading state
            submitText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');
            submitBtn.disabled = true;

            // Simulate registration process
            setTimeout(() => {
                document.getElementById('successModal').classList.remove('hidden');

                // Reset form
                submitText.classList.remove('hidden');
                loadingSpinner.classList.add('hidden');
                submitBtn.disabled = false;
            }, 2000);
        });

        // Close modal
        function closeModal() {
            document.getElementById('successModal').classList.add('hidden');
            form.reset();
        }

        // Input focus effects
        const inputs = document.querySelectorAll('.glass-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('animate-glow');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('animate-glow');
            });
        });

        // Add floating animation to form elements
        const formElements = document.querySelectorAll('.form-group');
        formElements.forEach((element, index) => {
            element.style.animationDelay = `${index * 0.1}s`;
            element.classList.add('animate-slide-up');
        });

        // Parallax effect for background shapes
        document.addEventListener('mousemove', function(e) {
            const shapes = document.querySelectorAll('.floating-shapes::before, .floating-shapes::after');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;

            shapes.forEach(shape => {
                const speed = 0.05;
                const xOffset = (x - 0.5) * speed * 100;
                const yOffset = (y - 0.5) * speed * 100;

                shape.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
            });
        });
    </script>
</body>

</html>