<!-- Add Product Modal -->
<div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50 animate-fadeInUp">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto glass-effect border border-red-500/20">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-red-500/20">
                <h3 class="text-2xl font-bold gradient-text">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Tambah Produk Baru
                </h3>
                <button type="button" class="text-gray-400 hover:text-red-400 transition-colors duration-300" onclick="closeAddProductModal()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="addProductForm" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <!-- Product Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-tag mr-2 text-red-400"></i>
                        Nama Produk
                    </label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-gray-400 transition-all duration-300"
                        placeholder="Masukkan nama produk...">
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-align-left mr-2 text-red-400"></i>
                        Deskripsi
                    </label>
                    <textarea name="description" rows="4" required
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-gray-400 transition-all duration-300 resize-none"
                        placeholder="Masukkan deskripsi produk..."></textarea>
                </div>

                <!-- Price -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-dollar-sign mr-2 text-red-400"></i>
                        Harga
                    </label>
                    <input type="number" name="price" step="0.01" min="0" required
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-gray-400 transition-all duration-300"
                        placeholder="0.00">
                </div>

                <!-- Category, Developer & Status Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-folder mr-2 text-red-400"></i>
                            Kategori
                        </label>
                        <select name="category_id" required
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white transition-all duration-300">
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>

                    <!-- Developer -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-user-tie mr-2 text-red-400"></i>
                            Developer
                        </label>
                        <select name="developer_id" required
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white transition-all duration-300">
                            <option value="">Pilih Developer</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-star mr-2 text-red-400"></i>
                            Status
                        </label>
                        <select name="status"
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white transition-all duration-300">
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
                        <i class="fas fa-cogs mr-2 text-red-400"></i>
                        Teknologi
                    </label>
                    <div id="technologiesContainer" class="grid grid-cols-2 md:grid-cols-3 gap-2 max-h-32 overflow-y-auto p-2 bg-gray-800 rounded-lg border border-gray-700">
                        <!-- Technologies will be loaded here -->
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-image mr-2 text-red-400"></i>
                        Gambar Produk
                    </label>
                    <div class="relative">
                        <input type="file" name="image" accept="image/*" id="productImage"
                            class="hidden">
                        <label for="productImage"
                            class="flex items-center justify-center w-full px-4 py-8 bg-gray-800 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer hover:border-red-500 transition-all duration-300 group">
                            <div class="text-center">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-red-400 transition-colors duration-300"></i>
                                <p class="mt-2 text-sm text-gray-400 group-hover:text-red-400 transition-colors duration-300">
                                    Klik untuk upload gambar
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                            </div>
                        </label>
                        <div id="imagePreview" class="hidden mt-4">
                            <img id="previewImg" class="w-full h-48 object-cover rounded-lg border border-gray-700">
                        </div>
                    </div>
                </div>

                <!-- Source Code Upload -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-file-archive mr-2 text-red-400"></i>
                        Source Code <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" name="source_code" accept=".zip,.rar" id="sourceCode" required
                            class="hidden">
                        <label for="sourceCode"
                            class="flex items-center justify-center w-full px-4 py-8 bg-gray-800 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer hover:border-red-500 transition-all duration-300 group">
                            <div class="text-center">
                                <i class="fas fa-code text-3xl text-gray-400 group-hover:text-red-400 transition-colors duration-300"></i>
                                <p class="mt-2 text-sm text-gray-400 group-hover:text-red-400 transition-colors duration-300">
                                    Klik untuk upload source code
                                </p>
                                <p class="text-xs text-gray-500">ZIP, RAR hingga 50MB</p>
                            </div>
                        </label>
                        <div id="sourceCodeInfo" class="hidden mt-4 p-3 bg-gray-700 rounded-lg border border-gray-600">
                            <div class="flex items-center text-green-400">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span id="sourceCodeName" class="text-sm"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preview URL -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300">
                        <i class="fas fa-external-link-alt mr-2 text-red-400"></i>
                        Preview URL
                    </label>
                    <input type="url" name="preview_url"
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-gray-400 transition-all duration-300"
                        placeholder="https://example.github.io/project atau https://demo.example.com">
                    <p class="text-xs text-gray-500">Link untuk live preview (GitHub Pages, Netlify, Vercel, dll)</p>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-red-500/20">
                    <button type="button" onclick="closeAddProductModal()"
                        class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <button type="submit" id="submitBtn"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 font-medium animate-glow">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .glass-effect {
        backdrop-filter: blur(16px);
        background: rgba(17, 24, 39, 0.9);
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .gradient-text {
        background: linear-gradient(45deg, #ef4444, #f87171, #fca5a5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes glow {

        0%,
        100% {
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        }

        50% {
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.5), 0 0 40px rgba(239, 68, 68, 0.3);
        }
    }

    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(55, 65, 81, 0.5);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(239, 68, 68, 0.5);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(239, 68, 68, 0.7);
    }
</style>

<script>
    function openAddProductModal() {
        console.log('Opening modal...');

        // Load form data
        fetch('/admin/products/create')
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Data received:', data);

                // Populate categories
                const categorySelect = document.querySelector('select[name="category_id"]');
                categorySelect.innerHTML = '<option value="">Pilih Kategori</option>';
                if (data.categories && data.categories.length > 0) {
                    data.categories.forEach(category => {
                        categorySelect.innerHTML += `<option value="${category.id}">${category.name}</option>`;
                    });
                }

                // Populate developers
                const developerSelect = document.querySelector('select[name="developer_id"]');
                developerSelect.innerHTML = '<option value="">Pilih Developer</option>';
                if (data.developers && data.developers.length > 0) {
                    data.developers.forEach(developer => {
                        developerSelect.innerHTML += `<option value="${developer.id}">${developer.name}</option>`;
                    });
                }

                // Populate technologies
                const techContainer = document.getElementById('technologiesContainer');
                techContainer.innerHTML = '';
                if (data.technologies && data.technologies.length > 0) {
                    data.technologies.forEach(tech => {
                        techContainer.innerHTML += `
                        <label class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 cursor-pointer">
                            <img src="${tech.logo_url}" alt="${tech.name}" class="w-6 h-6 object-contain">
                            <input type="checkbox" name="technologies[]" value="${tech.id}" 
                                   class="rounded border-gray-600 text-red-500 focus:ring-red-500 focus:ring-offset-gray-800">
                            <span class="text-sm text-gray-300">${tech.name}</span>
                        </label>
                    `;
                    });
                }
            })
            .catch(error => {
                console.error('Error loading modal data:', error);
                showToast('Gagal memuat data form!', 'error');
            });

        document.getElementById('addProductModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAddProductModal() {
        document.getElementById('addProductModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        document.getElementById('addProductForm').reset();
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('sourceCodeInfo').classList.add('hidden');
    }

    // Image preview
    document.getElementById('productImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Source code file info and auto-detect technologies
    document.getElementById('sourceCode').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            document.getElementById('sourceCodeName').textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)';
            document.getElementById('sourceCodeInfo').classList.remove('hidden');
            
            // Auto-detect technologies
            const formData = new FormData();
            formData.append('source_code', file);
            
            fetch('/admin/products/detect-technologies', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Auto-check detected technologies
                    data.technologies.forEach(tech => {
                        const checkbox = document.querySelector(`input[name="technologies[]"][value="${tech.id}"]`);
                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    });
                    showToast(`Terdeteksi ${data.technologies.length} teknologi`, 'success');
                }
            })
            .catch(error => {
                console.error('Error detecting technologies:', error);
            });
        }
    });

    // Form submission
    document.getElementById('addProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');

        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        submitBtn.disabled = true;

        const formData = new FormData(this);

        // Debug form data
        console.log('Form data:');
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            console.error('CSRF token not found!');
            showToast('CSRF token tidak ditemukan!', 'error');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            return;
        }

        fetch('/admin/products', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers);

                // Clone response to read it twice
                return response.clone().text().then(text => {
                    console.log('Raw response:', text);
                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.error('JSON parse error:', e);
                        throw new Error('Invalid JSON response');
                    }
                });
            })
            .then(data => {
                console.log('Parsed data:', data);
                if (data.success) {
                    showToast('Produk berhasil ditambahkan!', 'success');
                    closeAddProductModal();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    showToast(data.message || 'Gagal menambahkan produk!', 'error');
                    if (data.errors) {
                        console.log('Validation errors:', data.errors);
                        // Show validation errors
                        Object.keys(data.errors).forEach(field => {
                            console.log(`${field}: ${data.errors[field].join(', ')}`);
                        });
                    }
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                showToast('Terjadi kesalahan: ' + error.message, 'error');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
    });


</script>