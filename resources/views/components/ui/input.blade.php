@props([
    'type' => 'text',
    'label' => null,
    'error' => null,
    'help' => null,
    'required' => false,
    'placeholder' => null,
])

@php
    $inputId = $attributes->get('id', 'input-' . uniqid());
    $hasError = !empty($error);
    
    $inputClasses = $hasError 
        ? 'form-input border-error-300 focus:border-error-500 focus:ring-error-500' 
        : 'form-input';
@endphp

<div class="form-group">
    @if($label)
        <label for="{{ $inputId }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="text-error-500 ml-1">*</span>
            @endif
        </label>
    @endif
    
    @if($type === 'textarea')
        <textarea
            id="{{ $inputId }}"
            {{ $attributes->merge([
                'class' => $inputClasses . ' form-textarea',
                'placeholder' => $placeholder,
                'required' => $required,
                'rows' => 4
            ]) }}
        >{{ $slot }}</textarea>
    @elseif($type === 'select')
        <select
            id="{{ $inputId }}"
            {{ $attributes->merge([
                'class' => $inputClasses . ' form-select',
                'required' => $required
            ]) }}
        >
            {{ $slot }}
        </select>
    @else
        <input
            type="{{ $type }}"
            id="{{ $inputId }}"
            {{ $attributes->merge([
                'class' => $inputClasses,
                'placeholder' => $placeholder,
                'required' => $required
            ]) }}
        />
    @endif
    
    @if($error)
        <p class="form-error mt-1">{{ $error }}</p>
    @endif
    
    @if($help)
        <p class="form-help mt-1">{{ $help }}</p>
    @endif
</div>