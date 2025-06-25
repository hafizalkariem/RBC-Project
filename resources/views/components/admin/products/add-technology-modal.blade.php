<!-- Add Technology Modal -->
<div id="addTechnologyModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-md glass-effect border border-blue-500/20">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-blue-500/20">
                <h3 class="text-2xl font-bold text-blue-400">
                    <i class="fas fa-cogs mr-2"></i>
                    Tambah Teknologi
                </h3>
                <button type="button" class="text-gray-400 hover:text-blue-400 transition-colors duration-300" onclick="closeAddTechnologyModal()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="addTechnologyForm" class="p-6 space-y-4">
                @csrf
                
                <!-- Technology Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-tag mr-2 text-blue-400"></i>
                        Nama Teknologi
                    </label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="Masukkan nama teknologi...">
                </div>

                <!-- Tech Category -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-folder mr-2 text-blue-400"></i>
                        Kategori Teknologi
                    </label>
                    <select name="tech_category_id" id="techCategorySelect" required
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white transition-all duration-300">
                        <option value="">Pilih Kategori Teknologi</option>
                    </select>
                </div>

                <!-- Technology Type -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-layer-group mr-2 text-blue-400"></i>
                        Tipe Teknologi
                    </label>
                    <select name="type" required
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white transition-all duration-300">
                        <option value="">Pilih Tipe Teknologi</option>
                        <option value="language">Language - Bahasa Pemrograman</option>
                        <option value="framework">Framework - Kerangka Kerja</option>
                        <option value="library">Library - Pustaka</option>
                        <option value="database">Database - Basis Data</option>
                        <option value="tool" selected>Tool - Alat Bantu</option>
                        <option value="platform">Platform - Platform</option>
                        <option value="service">Service - Layanan</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-align-left mr-2 text-blue-400"></i>
                        Deskripsi
                    </label>
                    <textarea name="description" rows="3"
                              class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300 resize-none"
                              placeholder="Masukkan deskripsi teknologi..."></textarea>
                </div>

                <!-- Logo URL -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-image mr-2 text-blue-400"></i>
                        Logo URL
                    </label>
                    <input type="url" name="logo_url"
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="https://example.com/logo.png">
                </div>

                <!-- Expertise Level -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-chart-line mr-2 text-blue-400"></i>
                        Level Keahlian (1-5)
                    </label>
                    <select name="expertise_level"
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white transition-all duration-300">
                        <option value="1">1 - Beginner</option>
                        <option value="2">2 - Basic</option>
                        <option value="3" selected>3 - Intermediate</option>
                        <option value="4">4 - Advanced</option>
                        <option value="5">5 - Expert</option>
                    </select>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-blue-500/20">
                    <button type="button" onclick="closeAddTechnologyModal()"
                            class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 font-medium">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>