@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
])

@php
    $variantClasses = [
        'primary' => 'badge-primary',
        'secondary' => 'badge-secondary',
        'success' => 'badge-success',
        'warning' => 'badge-warning',
        'error' => 'badge-error',
    ];
    
    $sizeClasses = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-3 py-1 text-xs',
        'lg' => 'px-4 py-1.5 text-sm',
    ];
    
    $classes = collect([
        'badge',
        $variantClasses[$variant] ?? $variantClasses['primary'],
        $sizeClasses[$size] ?? $sizeClasses['md'],
    ])->filter()->implode(' ');
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <x-icon :name="$icon" class="w-3 h-3 mr-1" />
    @endif
    {{ $slot }}
</span>