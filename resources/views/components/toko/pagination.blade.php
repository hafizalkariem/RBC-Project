@if($products->hasPages())
<div class="flex justify-center animate-fade-in">
    <nav class="glass rounded-2xl p-2 shadow-lg">
        <div class="flex items-center gap-2">
            {{ $products->appends(request()->query())->links('pagination::simple-tailwind') }}
        </div>
    </nav>
</div>
@endif