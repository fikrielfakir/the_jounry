@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,
    'loading' => false,
    'disabled' => false,
    'icon' => null,
    'iconPosition' => 'left'
])

@php
    $tag = $href ? 'a' : 'button';
    $baseClasses = 'btn';
    
    $variantClasses = [
        'primary' => 'btn-primary',
        'secondary' => 'btn-secondary',
        'outline' => 'btn-outline',
        'ghost' => 'btn-ghost',
    ];
    
    $sizeClasses = [
        'sm' => 'btn-sm',
        'md' => '',
        'lg' => 'btn-lg',
    ];
    
    $classes = collect([
        $baseClasses,
        $variantClasses[$variant] ?? $variantClasses['primary'],
        $sizeClasses[$size] ?? '',
    ])->filter()->implode(' ');
    
    // Build attributes array manually to avoid AttributeBag filter() issue
    $mergedAttributes = ['class' => $classes];
    
    if ($tag === 'button') {
        $mergedAttributes['type'] = $type;
    }
    
    if ($href) {
        $mergedAttributes['href'] = $href;
    }
    
    if ($disabled || $loading) {
        $mergedAttributes['disabled'] = true;
        $mergedAttributes['aria-disabled'] = 'true';
    }
    
    $attributes = $attributes->merge($mergedAttributes);
@endphp

<{{ $tag }} {{ $attributes }}>
    @if($loading)
        <div class="loading-spinner w-4 h-4 mr-2"></div>
        <span class="sr-only">Loading...</span>
    @elseif($icon && $iconPosition === 'left')
        <x-icon :name="$icon" class="w-4 h-4 mr-2" />
    @endif
    
    {{ $slot }}
    
    @if($icon && $iconPosition === 'right')
        <x-icon :name="$icon" class="w-4 h-4 ml-2" />
    @endif
</{{ $tag }}>