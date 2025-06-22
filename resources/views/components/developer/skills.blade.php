<section class="py-16 glass-dark backdrop-blur-xl">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-white mb-12">Technical Skills</h2>
        <div class="flex flex-wrap justify-center gap-4 max-w-4xl mx-auto">
            @foreach($developer->skills as $skill)
            <div class="glass-card rounded-2xl p-4 flex items-center gap-3">
                @if($skill->technology->logo_url)
                <img src="{{ $skill->technology->logo_url }}" alt="{{ $skill->technology->name }}" class="w-8 h-8 object-contain">
                @endif
                <span class="text-white font-semibold">{{ $skill->technology->name }}</span>
                <div class="flex gap-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star text-{{ $i <= $skill->proficiency_level ? 'yellow' : 'gray' }}-400 text-sm"></i>
                        @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>