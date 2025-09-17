@props([
    'size' => 'md'
])

@php
    $sizeClasses = [
        'sm' => 'p-1.5',
        'md' => 'p-2',
        'lg' => 'p-3',
    ];
    
    $classes = collect([
        'rounded-lg text-navy-500 hover:text-navy-700 hover:bg-navy-100 dark:text-navy-400 dark:hover:text-navy-200 dark:hover:bg-navy-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2',
        $sizeClasses[$size] ?? $sizeClasses['md']
    ])->implode(' ');
@endphp

<button 
    type="button"
    data-theme-toggle
    {{ $attributes->merge(['class' => $classes]) }}
    aria-label="Toggle dark mode"
>
    <!-- Light mode icon (shown in dark mode) -->
    <x-ui.icon 
        name="sun" 
        class="w-5 h-5 hidden" 
        data-theme-icon="light"
    />
    
    <!-- Dark mode icon (shown in light mode) -->
    <x-ui.icon 
        name="moon" 
        class="w-5 h-5" 
        data-theme-icon="dark"
    />
</button>