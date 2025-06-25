@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<style>
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

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    @keyframes slideIn {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
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

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .animate-pulse-custom {
        animation: pulse 2s infinite;
    }

    .animate-slideIn {
        animation: slideIn 0.8s ease-out forwards;
    }

    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }

    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .btn-hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
    }

    .tech-tag {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-tag::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tech-tag:hover::before {
        left: 100%;
    }

    .tech-tag:hover {
        transform: scale(1.1);
    }

    .table-row {
        transition: all 0.3s ease;
        position: relative;
    }



    .table-row:hover {
        background: rgba(239, 68, 68, 0.05);
        transform: translateX(5px);
    }

    .stat-card {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(139, 69, 19, 0.1));
        border: 1px solid rgba(239, 68, 68, 0.2);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c, #ef4444);
        border-radius: inherit;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .floating {
        animation: float 3s ease-in-out infinite;
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

    .glass-effect {
        backdrop-filter: blur(16px);
        background: rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .gradient-text {
        background: linear-gradient(45deg, #ef4444, #f87171, #fca5a5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .progress-bar {
        height: 4px;
        background: rgba(239, 68, 68, 0.2);
        border-radius: 2px;
        overflow: hidden;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #ef4444, #f87171);
        border-radius: 2px;
        transition: width 1s ease-in-out;
        position: relative;
    }

    .progress-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    /* Toast Notification Styles */
    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        max-width: 400px;
        padding: 16px 20px;
        border-radius: 12px;
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        transform: translateX(400px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
    }

    .toast.show {
        transform: translateX(0);
        opacity: 1;
    }

    .toast.success {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.9), rgba(22, 163, 74, 0.9));
        border-color: rgba(34, 197, 94, 0.3);
    }

    .toast.error {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.9), rgba(220, 38, 38, 0.9));
        border-color: rgba(239, 68, 68, 0.3);
    }
</style>

<!-- Header with Add Button -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold gradient-text mb-2">
            <i class="fas fa-box-open mr-3"></i>
            Manajemen Produk
        </h1>
        <p class="text-gray-400">Kelola semua produk dalam sistem</p>
    </div>
    <button onclick="openAddProductModal()"
        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 font-medium animate-glow btn-hover-lift">
        <i class="fas fa-plus mr-2"></i>
        Tambah Produk
    </button>
</div>

<!-- Header Stats Section -->
<div data-aos="fade-up">
    <x-admin.products.header :products="$products" :allProducts="$allProducts" :categories="$categories" />
</div>

<!-- Main Products Section -->
<div data-aos="fade-up" data-aos-delay="200">
    <x-admin.products.main-products :products="$products" :categories="$categories" />
</div>

<!-- Categories & Technologies Section -->
<div data-aos="fade-up" data-aos-delay="400">
    <x-admin.products.categories-technology :categories="$categories" :technologies="$technologies" :products="$products" />
</div>

<!-- Quick Actions Section -->
<div data-aos="fade-up" data-aos-delay="600">
    <x-admin.products.quick-actions :products="$products" :stats="$stats" />
</div>

<!-- Charts Section -->
<div data-aos="fade-up" data-aos-delay="800">
    <x-admin.products.charts :categories="$categories" :allProducts="$allProducts" :technologies="$technologies" />
</div>

<!-- Top Selling Products Section -->
<div data-aos="fade-up" data-aos-delay="1000">
    <x-admin.products.top-selling :products="$products" />
</div>

<!-- Add Product Modal -->
<x-admin.products.add-product-modal />

<!-- Edit Product Modal -->
<x-admin.products.edit-product-modal />

<!-- Add Category Modal -->
<x-admin.products.add-category-modal />

<!-- Add Technology Modal -->
<x-admin.products.add-technology-modal />

<!-- Technology Stats Modal -->
<x-admin.products.tech-stats-modal />

<script>
    // Add some interactive animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate progress bars on load
        setTimeout(() => {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 200);
            });
        }, 500);

        // Add hover effects to table rows
        const tableRows = document.querySelectorAll('.table-row');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Add click ripple effect to buttons
        const buttons = document.querySelectorAll('button');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });

    // Add ripple effect styles
    const style = document.createElement('style');
    style.textContent = `
.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: scale(0);
    animation: ripple-animation 0.6s linear;
    pointer-events: none;
}

@keyframes ripple-animation {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

.tech-tag:hover {
    transform: scale(1.1) rotate(2deg);
}

.stat-card:hover .gradient-text {
    animation: pulse 1s infinite;
}

.floating:nth-child(2) {
    animation-delay: -1s;
}

.floating:nth-child(3) {
    animation-delay: -2s;
}

.floating:nth-child(4) {
    animation-delay: -0.5s;
}
`;
    document.head.appendChild(style);

    // Toast Notification Function
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;

        const icon = type === 'success' ? 'fas fa-check-circle' :
            type === 'error' ? 'fas fa-times-circle' : 'fas fa-info-circle';

        toast.innerHTML = `
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <i class="${icon} text-xl text-white"></i>
            </div>
            <div class="flex-1">
                <p class="text-white font-medium">${message}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-white/70 hover:text-white transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('show');
        }, 100);

        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 400);
        }, 4000);
    }

    // Edit Product Modal Functions
    function openEditProductModal(productId) {
        fetch(`/admin/products/${productId}/edit`)
            .then(response => response.json())
            .then(data => {
                const product = data.product;

                // Fill form fields
                document.getElementById('editProductId').value = product.id;
                document.getElementById('editProductName').value = product.name;
                document.getElementById('editProductDescription').value = product.description;
                document.getElementById('editProductPrice').value = product.price;

                // Fill categories
                const categorySelect = document.getElementById('editProductCategory');
                categorySelect.innerHTML = '<option value="">Pilih Kategori</option>';
                data.categories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    option.selected = category.id == product.category_id;
                    categorySelect.appendChild(option);
                });

                // Fill developers
                const developerSelect = document.getElementById('editProductDeveloper');
                developerSelect.innerHTML = '<option value="">Pilih Developer</option>';
                data.developers.forEach(developer => {
                    const option = document.createElement('option');
                    option.value = developer.id;
                    option.textContent = developer.name;
                    option.selected = developer.id == product.developer_id;
                    developerSelect.appendChild(option);
                });

                // Fill status
                document.getElementById('editProductStatus').value = product.status || '';

                // Fill technologies
                const techContainer = document.getElementById('editTechnologiesContainer');
                techContainer.innerHTML = '';
                data.technologies.forEach(tech => {
                    const isSelected = product.technologies.some(pt => pt.id === tech.id);
                    const techDiv = document.createElement('div');
                    techDiv.className = 'flex items-center space-x-2';
                    techDiv.innerHTML = `
                    <input type="checkbox" name="technologies[]" value="${tech.id}" id="edit_tech_${tech.id}" 
                           class="rounded border-gray-600 bg-gray-700 text-blue-500 focus:ring-blue-500" 
                           ${isSelected ? 'checked' : ''}>
                    <label for="edit_tech_${tech.id}" class="text-sm text-gray-300 flex items-center space-x-1">
                        <img src="${tech.logo_url}" alt="${tech.name}" class="w-4 h-4">
                        <span>${tech.name}</span>
                    </label>
                `;
                    techContainer.appendChild(techDiv);
                });

                document.getElementById('editProductModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Gagal memuat data produk', 'error');
            });
    }

    function closeEditProductModal() {
        document.getElementById('editProductModal').classList.add('hidden');
        document.getElementById('editProductForm').reset();
    }

    // Handle edit form submission
    document.getElementById('editProductForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const productId = document.getElementById('editProductId').value;

        fetch(`/admin/products/${productId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    closeEditProductModal();
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Terjadi kesalahan saat mengupdate produk', 'error');
            });
    });

    // Handle edit image preview
    document.getElementById('editProductImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('editPreviewImg').src = e.target.result;
                document.getElementById('editImagePreview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle edit source code info
    document.getElementById('editSourceCode').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            document.getElementById('editSourceCodeName').textContent = file.name;
            document.getElementById('editSourceCodeInfo').classList.remove('hidden');
        }
    });

    // Live Search and Filter Functions
    let searchTimeout;

    function performSearch(page = 1) {
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const statusFilter = document.getElementById('statusFilter');

        const search = searchInput ? searchInput.value : '';
        const category = categoryFilter ? categoryFilter.value : '';
        const status = statusFilter ? statusFilter.value : '';

        const params = new URLSearchParams();
        if (search) params.append('search', search);
        if (category) params.append('category', category);
        if (status) params.append('status', status);
        if (page > 1) params.append('page', page);

        fetch(`/admin/products/search?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('productsTableBody');
                const paginationContainer = document.getElementById('paginationContainer');

                if (tableBody && data.html) {
                    tableBody.innerHTML = data.html;
                }
                if (paginationContainer && data.pagination) {
                    paginationContainer.innerHTML = data.pagination;
                }
            })
            .catch(error => {
                console.error('Search error:', error);
                showToast('Terjadi kesalahan saat mencari produk', 'error');
            });
    }

    // Live search on input
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => performSearch(), 300);
        });
    }

    // Filter on change
    const categoryFilter = document.getElementById('categoryFilter');
    if (categoryFilter) {
        categoryFilter.addEventListener('change', () => performSearch());
    }

    const statusFilter = document.getElementById('statusFilter');
    if (statusFilter) {
        statusFilter.addEventListener('change', () => performSearch());
    }

    // Clear filters
    function clearFilters() {
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const statusFilter = document.getElementById('statusFilter');

        if (searchInput) searchInput.value = '';
        if (categoryFilter) categoryFilter.value = '';
        if (statusFilter) statusFilter.value = '';

        performSearch();
    }

    // Pagination
    function changePage(page) {
        performSearch(page);
    }

    // Category Modal Functions
    function openAddCategoryModal() {
        document.getElementById('addCategoryModal').classList.remove('hidden');
    }

    function closeAddCategoryModal() {
        document.getElementById('addCategoryModal').classList.add('hidden');
        document.getElementById('addCategoryForm').reset();
    }

    // Technology Modal Functions
    function openAddTechnologyModal() {
        // Load tech categories
        fetch('/admin/products/create')
            .then(response => response.json())
            .then(data => {
                const techCategorySelect = document.getElementById('techCategorySelect');
                techCategorySelect.innerHTML = '<option value="">Pilih Kategori Teknologi</option>';
                if (data.techCategories) {
                    data.techCategories.forEach(category => {
                        techCategorySelect.innerHTML += `<option value="${category.id}">${category.name}</option>`;
                    });
                }
            })
            .catch(error => console.error('Error loading tech categories:', error));

        document.getElementById('addTechnologyModal').classList.remove('hidden');
    }

    function closeAddTechnologyModal() {
        document.getElementById('addTechnologyModal').classList.add('hidden');
        document.getElementById('addTechnologyForm').reset();
    }

    // Handle category form submission
    document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/admin/categories', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    closeAddCategoryModal();
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Terjadi kesalahan saat menambah kategori', 'error');
            });
    });

    // Handle technology form submission
    document.getElementById('addTechnologyForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/admin/technologies', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    closeAddTechnologyModal();
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Terjadi kesalahan saat menambah teknologi', 'error');
            });
    });

    // Technology Stats Modal Functions
    function showTechModal(techId) {
        document.getElementById('currentTechId').value = techId;
        fetch(`/admin/technologies/${techId}/stats`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('techModalTitle').textContent = data.technology.name;
                document.getElementById('techModalLogo').src = data.technology.logo_url;
                document.getElementById('techUsageCount').textContent = data.usage_count;
                document.getElementById('techCategoryCount').textContent = data.categories.length;

                // Fill categories
                const categoriesList = document.getElementById('techCategoriesList');
                categoriesList.innerHTML = '';
                data.categories.forEach(category => {
                    categoriesList.innerHTML += `
                    <div class="flex justify-between items-center p-2 bg-slate-700/50 rounded-lg">
                        <span class="text-gray-300">${category.name}</span>
                        <span class="text-blue-400 text-sm">${category.products_count} products</span>
                    </div>
                `;
                });

                // Fill products
                const productsList = document.getElementById('techProductsList');
                productsList.innerHTML = '';
                data.products.forEach(product => {
                    productsList.innerHTML += `
                    <div class="flex items-center space-x-3 p-2 bg-slate-700/50 rounded-lg">
                        <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <i class="${product.category.icon} text-blue-400 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-white text-sm">${product.name}</div>
                            <div class="text-gray-400 text-xs">${product.category.name}</div>
                        </div>
                        <div class="text-green-400 text-sm">Rp ${new Intl.NumberFormat('id-ID').format(product.price)}</div>                    </div>
                `;
                });

                document.getElementById('techStatsModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Gagal memuat statistik teknologi', 'error');
            });
    }

    function closeTechModal() {
        document.getElementById('techStatsModal').classList.add('hidden');
    }

    // Delete Technology Function
    function deleteTechnology() {
        const techId = document.getElementById('currentTechId').value;
        const techName = document.getElementById('techModalTitle').textContent;
        
        showDeleteConfirmation(
            'Hapus Teknologi',
            `Apakah Anda yakin ingin menghapus teknologi "${techName}"?\n\nTindakan ini akan:\n• Menghapus teknologi dari semua produk\n• Tidak dapat dibatalkan`,
            () => {
                fetch(`/admin/technologies/${techId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, 'success');
                        closeTechModal();
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        showToast(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Terjadi kesalahan saat menghapus teknologi', 'error');
                });
            }
        );
    }

    // Custom Delete Confirmation Modal
    function showDeleteConfirmation(title, message, onConfirm) {
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-[60] flex items-center justify-center p-4';
        modal.innerHTML = `
            <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-md border border-red-500/20 animate-fadeInUp">
                <div class="p-6 border-b border-red-500/20">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-red-400">${title}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-300 whitespace-pre-line">${message}</p>
                </div>
                <div class="flex items-center justify-end space-x-4 p-6 border-t border-red-500/20">
                    <button onclick="this.closest('.fixed').remove()" class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium">
                        Batal
                    </button>
                    <button id="confirmDeleteBtn" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-300 font-medium">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        
        // Add event listener to confirm button
        modal.querySelector('#confirmDeleteBtn').addEventListener('click', function() {
            modal.remove();
            onConfirm();
        });
    }

    // Delete Product Function
    function deleteProduct(productId, productName) {
        if (confirm(`Apakah Anda yakin ingin menghapus produk "${productName}"?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua file terkait.`)) {
            fetch(`/admin/products/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Terjadi kesalahan saat menghapus produk', 'error');
            });
        }
    }
</script>

<!-- AOS Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });
</script>

@endsection