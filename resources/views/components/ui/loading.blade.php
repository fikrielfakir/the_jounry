@props([
    'type' => 'spinner',
    'size' => 'md',
    'text' => null
])

@php
    $sizeClasses = [
        'sm' => 'w-4 h-4',
        'md' => 'w-6 h-6',
        'lg' => 'w-8 h-8',
        'xl' => 'w-12 h-12',
    ];
    
    $spinnerSize = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center justify-center']) }}>
    @if($type === 'spinner')
        <div class="loading-spinner {{ $spinnerSize }}"></div>
    @elseif($type === 'dots')
        <div class="flex space-x-1">
            <div class="w-2 h-2 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
            <div class="w-2 h-2 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
            <div class="w-2 h-2 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
        </div>
    @elseif($type === 'pulse')
        <div class="w-8 h-8 bg-primary-600 rounded-full animate-pulse-soft"></div>
    @endif
    
    @if($text)
        <span class="ml-2 text-sm text-navy-600 dark:text-navy-400">{{ $text }}</span>
    @endif
</div>