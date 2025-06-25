@if($status)
<span class="px-3 py-1 
@if($status == 'hot') bg-green-500/80 
@elseif($status == 'premium') bg-purple-500/80 
@elseif($status == 'best') bg-pink-500/80 
@else bg-blue-500/80 @endif 
text-white text-sm rounded-full backdrop-blur-sm">
    <i class="
    @if($status == 'hot') fas fa-fire 
    @elseif($status == 'premium') fas fa-crown 
    @elseif($status == 'best') fas fa-star 
    @else fas fa-bolt @endif 
    mr-1"></i>{{ ucfirst($status) }}
</span>
@endif