<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-beige-50 border border-beige-300 rounded-lg font-semibold text-sm text-navy-950 uppercase tracking-wide shadow-sm hover:bg-beige-100 focus:outline-none focus:ring-2 focus:ring-navy-500 focus:ring-offset-2 hover:shadow-md disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
