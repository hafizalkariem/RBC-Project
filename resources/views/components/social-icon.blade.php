@props(['icon', 'color'])

@php
$colorClass = match($icon) {
'facebook' => 'text-blue-400 hover:bg-blue-400/20',
'instagram' => 'text-pink-400 hover:bg-pink-400/20',
'linkedin' => 'text-blue-400 hover:bg-blue-400/20',
'twitter' => 'text-cyan-400 hover:bg-cyan-400/20',
'youtube' => 'text-red-400 hover:bg-red-400/20',
'github' => 'text-gray-300 hover:bg-gray-300/20',
'tiktok' => 'text-black hover:bg-black/20',
'telegram' => 'text-blue-300 hover:bg-blue-300/20',
default => 'text-gray-400 hover:bg-gray-400/20'
};
@endphp

<a href="#" class="w-10 h-10 glass rounded-lg flex items-center justify-center transition-all duration-300 {{ $colorClass }}">
    <i class="fab fa-{{ $icon }}"></i>
</a>