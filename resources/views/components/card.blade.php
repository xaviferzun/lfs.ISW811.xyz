@props(['href' => null])

@if($href)
    <a href="{{ $href }}" {{ $attributes(['class' => 'block border border-border rounded-lg bg-card p-4 md:text-sm hover:border-primary/50 transition-colors']) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes(['class' => 'border border-border rounded-lg bg-card p-4 md:text-sm']) }}>
        {{ $slot }}
    </div>
@endif