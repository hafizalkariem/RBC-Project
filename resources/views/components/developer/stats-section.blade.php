<section class="py-16 bg-transparent">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="glass-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-blue-400 mb-2">{{ $developer->years_experience }}+</div>
                <div class="text-white/70">Years Experience</div>
            </div>
            <div class="glass-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-purple-400 mb-2">{{ number_format($developer->projects_completed) }}{{ $developer->projects_completed > 1000000 ? 'M+' : '+' }}</div>
                <div class="text-white/70">{{ $developer->projects_completed > 1000000 ? 'Requests Handled' : 'Projects Completed' }}</div>
            </div>
            <div class="glass-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-green-400 mb-2">{{ $developer->success_rate }}</div>
                <div class="text-white/70">{{ str_contains($developer->success_rate, '%') ? 'Success Rate' : 'Awards Won' }}</div>
            </div>
        </div>
    </div>
</section>