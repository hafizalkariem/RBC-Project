@props(['icon', 'color', 'bg', 'text'])

@php
$brandIcons = ['facebook','instagram','linkedin','twitter','youtube','github','tiktok','telegram','whatsapp'];
$prefix = in_array($icon, $brandIcons) ? 'fab' : 'fas';
@endphp

<div class="flex items-center space-x-3">
    <div class="w-8 h-8 {{ $bg }} rounded-lg flex items-center justify-center">
        <i class="{{ $prefix }} fa-{{ $icon }} text-{{ $color }}"></i>
    </div>
    <span class="text-gray-400">{{ $text }}</span>
</div>