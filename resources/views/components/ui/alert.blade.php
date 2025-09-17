@props([
    'type' => 'info',
    'dismissible' => false,
    'icon' => true,
    'title' => null
])

@php
    $typeClasses = [
        'success' => 'bg-success-50 border-success-200 text-success-800 dark:bg-success-900/20 dark:border-success-800 dark:text-success-200',
        'error' => 'bg-error-50 border-error-200 text-error-800 dark:bg-error-900/20 dark:border-error-800 dark:text-error-200',
        'warning' => 'bg-warning-50 border-warning-200 text-warning-800 dark:bg-warning-900/20 dark:border-warning-800 dark:text-warning-200',
        'info' => 'bg-info-50 border-info-200 text-info-800 dark:bg-info-900/20 dark:border-info-800 dark:text-info-200',
    ];
    
    $iconNames = [
        'success' => 'check',
        'error' => 'x', 
        'warning' => 'x',
        'info' => 'x',
    ];
    
    $classes = collect([
        'border rounded-lg p-4',
        $typeClasses[$type] ?? $typeClasses['info']
    ])->implode(' ');
@endphp

<div 
    {{ $attributes->merge(['class' => $classes]) }}
    @if($dismissible) x-data="{ show: true }" x-show="show" x-transition @endif
>
    <div class="flex">
        @if($icon)
            <div class="flex-shrink-0">
                <x-ui.icon :name="$iconNames[$type] ?? 'information-circle'" class="w-5 h-5" />
            </div>
        @endif
        
        <div class="{{ $icon ? 'ml-3' : '' }} flex-1">
            @if($title)
                <h3 class="text-sm font-medium mb-1">{{ $title }}</h3>
            @endif
            
            <div class="text-sm">
                {{ $slot }}
            </div>
        </div>
        
        @if($dismissible)
            <div class="ml-auto pl-3">
                <button 
                    type="button" 
                    class="inline-flex rounded-md p-1.5 hover:bg-black/5 focus:outline-none focus:ring-2 focus:ring-offset-2"
                    @click="show = false"
                >
                    <span class="sr-only">Dismiss</span>
                    <x-ui.icon name="x" class="w-4 h-4" />
                </button>
            </div>
        @endif
    </div>
</div>