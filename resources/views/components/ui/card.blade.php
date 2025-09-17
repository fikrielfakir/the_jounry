@props([
    'variant' => 'default',
    'padding' => true,
    'hover' => true
])

@php
    $variantClasses = [
        'default' => 'card',
        'bordered' => 'card border-2',
        'elevated' => 'card shadow-large',
        'flat' => 'bg-white dark:bg-navy-800 rounded-2xl border border-navy-100 dark:border-navy-700',
    ];
    
    $hoverClass = $hover ? 'hover:shadow-medium' : '';
    
    $classes = collect([
        $variantClasses[$variant] ?? $variantClasses['default'],
        $hoverClass
    ])->filter()->implode(' ');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if(isset($header))
        <div class="card-header">
            {{ $header }}
        </div>
    @endif
    
    <div class="{{ $padding ? 'card-body' : '' }}">
        {{ $slot }}
    </div>
    
    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>