<!-- Technology Stats Modal -->
<div id="techStatsModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-2xl shadow-2xl w-full max-w-lg glass-effect border border-blue-500/20">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-blue-500/20">
                <div class="flex items-center space-x-3">
                    <img id="techModalLogo" src="" alt="" class="w-8 h-8">
                    <h3 id="techModalTitle" class="text-2xl font-bold text-blue-400"></h3>
                </div>
                <button type="button" class="text-gray-400 hover:text-blue-400 transition-colors duration-300" onclick="closeTechModal()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-6">
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center p-4 bg-slate-800/50 rounded-lg">
                        <div id="techUsageCount" class="text-2xl font-bold text-blue-400 mb-1">0</div>
                        <div class="text-gray-400 text-sm">Used in Products</div>
                    </div>
                    <div class="text-center p-4 bg-slate-800/50 rounded-lg">
                        <div id="techCategoryCount" class="text-2xl font-bold text-green-400 mb-1">0</div>
                        <div class="text-gray-400 text-sm">Categories</div>
                    </div>
                </div>

                <!-- Categories List -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-3">Product Categories</h4>
                    <div id="techCategoriesList" class="space-y-2">
                        <!-- Categories will be loaded here -->
                    </div>
                </div>

                <!-- Products List -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-3">Products Using This Technology</h4>
                    <div id="techProductsList" class="space-y-2 max-h-40 overflow-y-auto">
                        <!-- Products will be loaded here -->
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-between p-6 border-t border-blue-500/20">
                <button type="button" id="deleteTechBtn" onclick="deleteTechnology()" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-300 font-medium">
                    <i class="fas fa-trash mr-2"></i>Hapus
                </button>
                <button type="button" onclick="closeTechModal()"
                        class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium">
                    Close
                </button>
            </div>
            <input type="hidden" id="currentTechId" value="">
        </div>
    </div>
</div>