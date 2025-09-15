<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-navy-950 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wide hover:bg-navy-800 focus:bg-navy-800 active:bg-navy-900 focus:outline-none focus:ring-2 focus:ring-beige-500 focus:ring-offset-2 shadow-lg hover:shadow-xl transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
