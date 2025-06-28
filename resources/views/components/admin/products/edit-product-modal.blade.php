<!-- Edit Product Modal -->
<div id="editProductModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50 animate-fadeInUp">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto glass-effect border border-blue-500/20">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-blue-500/20">
                <h3 class="text-2xl font-bold text-blue-400">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Produk
                </h3>
                <button type="button" class="text-gray-400 hover:text-blue-400 transition-colors duration-300" onclick="closeEditProductModal()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="editProductForm" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                <input type="hidden" id="editProductId" name="product_id">
                
                <!-- Product Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-tag mr-2 text-blue-400"></i>
                        Nama Produk
                    </label>
                    <input type="text" name="name" id="editProductName" required
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300">
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-align-left mr-2 text-blue-400"></i>
                        Deskripsi
                    </label>
                    <textarea name="description" id="editProductDescription" rows="4" required
                              class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300 resize-none"></textarea>
                </div>

                <!-- Price -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-dollar-sign mr-2 text-blue-400"></i>
                        Harga
                    </label>
                    <input type="number" name="price" id="editProductPrice" step="0.01" min="0" required
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300">
                </div>

                <!-- Category, Developer & Status Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-folder mr-2 text-blue-400"></i>
                            Kategori
                        </label>
                        <select name="category_id" id="editProductCategory" required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white transition-all duration-300">
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>

                    <!-- Developer -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-user-tie mr-2 text-blue-400"></i>
                            Developer
                        </label>
                        <select name="developer_id" id="editProductDeveloper" required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white transition-all duration-300">
                            <option value="">Pilih Developer</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-star mr-2 text-blue-400"></i>
                            Status
                        </label>
                        <select name="status" id="editProductStatus"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white transition-all duration-300">
                            <option value="">Tanpa Status</option>
                            <option value="hot">🔥 Hot</option>
                            <option value="premium">👑 Premium</option>
                            <option value="best">⭐ Best</option>
                            <option value="new">✨ New</option>
                        </select>
                    </div>
                </div>

                <!-- Technologies -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-cogs mr-2 text-blue-400"></i>
                        Teknologi
                    </label>
                    <div id="editTechnologiesContainer" class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-32 overflow-y-auto p-2 bg-gray-800 rounded-lg border border-gray-700">
                        <!-- Technologies will be loaded here -->
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-image mr-2 text-blue-400"></i>
                        Gambar Produk
                    </label>
                    <div class="relative">
                        <input type="file" name="image" accept="image/*" id="editProductImage" class="hidden">
                        <label for="editProductImage" 
                               class="flex items-center justify-center w-full px-4 py-8 bg-gray-800 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer hover:border-blue-500 transition-all duration-300 group">
                            <div class="text-center">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-blue-400 transition-colors duration-300"></i>
                                <p class="mt-2 text-sm text-gray-400 group-hover:text-blue-400 transition-colors duration-300">
                                    Klik untuk upload gambar baru
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                            </div>
                        </label>
                        <div id="editImagePreview" class="mt-4">
                            <p class="text-sm text-gray-400 mb-2">Gambar saat ini:</p>
                            <img id="editPreviewImg" class="w-full h-48 object-cover rounded-lg border border-gray-700">
                        </div>
                    </div>
                </div>

                <!-- Source Code Upload -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-file-archive mr-2 text-blue-400"></i>
                        Source Code
                    </label>
                    <div class="relative">
                        <input type="file" name="source_code" accept=".zip,.rar" id="editSourceCode" class="hidden">
                        <label for="editSourceCode" 
                               class="flex items-center justify-center w-full px-4 py-8 bg-gray-800 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer hover:border-blue-500 transition-all duration-300 group">
                            <div class="text-center">
                                <i class="fas fa-code text-3xl text-gray-400 group-hover:text-blue-400 transition-colors duration-300"></i>
                                <p class="mt-2 text-sm text-gray-400 group-hover:text-blue-400 transition-colors duration-300">
                                    Klik untuk upload source code baru
                                </p>
                                <p class="text-xs text-gray-500">.ZIP, .RAR hingga 10MB</p>
                            </div>
                        </label>
                        <div id="editSourceCodeInfo" class="mt-4">
                            <p class="text-sm text-gray-400 mb-2">Source code saat ini: <span id="currentSourceCodeName" class="text-blue-400"></span></p>
                        </div>
                    </div>
                </div>

                <!-- Preview URL -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-external-link-alt mr-2 text-blue-400"></i>
                        Preview URL
                    </label>
                    <input type="url" name="preview_url" id="editPreviewUrl"
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-gray-400 transition-all duration-300 break-all"
                        placeholder="https://example.github.io/project atau https://demo.example.com">
                    <p class="text-xs text-gray-500">Link untuk live preview (GitHub Pages, Netlify, Vercel, dll)</p>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-blue-500/20">
                    <button type="button" onclick="closeEditProductModal()"
                            class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 font-medium">
                        <i class="fas fa-save mr-2"></i>
                        Update Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>