@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-beige-500 text-start text-base font-medium text-navy-950 bg-beige-50 focus:outline-none focus:text-navy-950 focus:bg-beige-100 focus:border-beige-600 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-navy-700 hover:text-navy-950 hover:bg-beige-50 hover:border-beige-300 focus:outline-none focus:text-navy-950 focus:bg-beige-50 focus:border-beige-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
