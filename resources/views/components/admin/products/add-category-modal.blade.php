<!-- Add Category Modal -->
<div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-md glass-effect border border-green-500/20">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-green-500/20">
                <h3 class="text-2xl font-bold text-green-400">
                    <i class="fas fa-folder-plus mr-2"></i>
                    Tambah Kategori
                </h3>
                <button type="button" class="text-gray-400 hover:text-green-400 transition-colors duration-300" onclick="closeAddCategoryModal()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="addCategoryForm" class="p-6 space-y-4">
                @csrf
                
                <!-- Category Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-tag mr-2 text-green-400"></i>
                        Nama Kategori
                    </label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="Masukkan nama kategori...">
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-align-left mr-2 text-green-400"></i>
                        Deskripsi
                    </label>
                    <textarea name="description" rows="3"
                              class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-white placeholder-gray-400 transition-all duration-300 resize-none"
                              placeholder="Masukkan deskripsi kategori..."></textarea>
                </div>

                <!-- Icon -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-icons mr-2 text-green-400"></i>
                        Icon (FontAwesome)
                    </label>
                    <input type="text" name="icon"
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="box, laptop, mobile-alt, etc...">
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-green-500/20">
                    <button type="button" onclick="closeAddCategoryModal()"
                            class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-300 font-medium">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>