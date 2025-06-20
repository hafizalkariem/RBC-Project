<footer class="glass-dark mt-20 relative z-10">
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid md:grid-cols-4 gap-8 mb-12">
            <!-- Brand -->
            <div class="col-span-1">
                <x-brand />
                <p class="text-gray-400 leading-relaxed mb-6 mt-4">
                    Solusi Website Cepat & Profesional. RBC siap membantu kebutuhan digital Anda dengan teknologi terdepan.
                </p>
                <div class="grid grid-cols-4 gap-3 w-max mb-2">
                    <x-social-icon icon="facebook" color="blue-400" />
                    <x-social-icon icon="instagram" color="pink-400" />
                    <x-social-icon icon="linkedin" color="blue-400" />
                    <x-social-icon icon="twitter" color="cyan-400" />
                    <x-social-icon icon="youtube" color="red-400" />
                    <x-social-icon icon="github" color="gray-300" />
                    <x-social-icon icon="tiktok" color="black" />
                    <x-social-icon icon="telegram" color="blue-300" />
                </div>
            </div>
            <!-- Menu -->
            <div class="col-span-1">
                <h6 class="text-xl font-bold text-white mb-6">Menu</h6>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a></li>
                    <li><a href="{{ route('toko') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Toko Source Code</a></li>
                    <li><a href="{{ route('service') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Jasa Website</a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Portofolio</a></li>
                    <li><a href="{{ route('blog') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Blog</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                </ul>
            </div>
            <!-- Services -->
            <div class="col-span-1">

                <h6 class="text-xl font-bold text-white mb-6">Layanan</h6>
                <ul class="space-y-3">
                    @foreach ($services as $service)
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">{{ $service->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- Contact -->
            <div class="col-span-1">
                <h6 class="text-xl font-bold text-white mb-6">Kontak</h6>
                <div class="space-y-4">
                    <x-contact-item icon="envelope" color="blue-400" bg="blue-500/20" text="info@rbc.co.id" />
                    <x-contact-item icon="whatsapp" color="green-400" bg="green-500/20" text="0812-3456-7890" />
                    <x-contact-item icon="map-marker-alt" color="purple-400" bg="purple-500/20" text="Jakarta, Indonesia" />
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-400 text-sm mb-4 md:mb-0">
                    Copyright © 2025 RBC. All Rights Reserved.
                </div>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </div>
</footer>