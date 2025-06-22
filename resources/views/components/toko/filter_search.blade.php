<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12 animate-slide-up">
    <div class="lg:col-span-2">
        <div class="relative">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-white/60"></i>
            <input type="text" id="live-search" placeholder="Cari produk amazing..."
                class="w-full pl-12 pr-4 py-4 rounded-2xl glass text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300" />
        </div>
    </div>
    <div class="relative">
        <select id="technology-filter" class="w-full px-4 py-4 rounded-2xl glass text-white appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300">
            <option value="">🛠️ Semua Teknologi</option>
            @foreach($technologies as $tech)
            <option value="{{ $tech->name }}" class="bg-gray-800">{{ $tech->name }}</option>
            @endforeach
        </select>
        <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-white/60 pointer-events-none"></i>
    </div>
    <div>
        <button id="clear-filters" class="w-full px-4 py-4 rounded-2xl glass-button text-white font-semibold hover:scale-105 transition-all duration-300">
            <i class="fas fa-times mr-2"></i>Clear
        </button>
    </div>
</div>

