@props([
    'name' => 'modal',
    'size' => 'md',
    'closeable' => true,
])

@php
    $sizeClasses = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'full' => 'max-w-full mx-4',
    ];
    
    $maxWidth = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

<div 
    x-data="{ 
        show: false, 
        open() { 
            this.show = true; 
            document.body.style.overflow = 'hidden'; 
            this.$nextTick(() => {
                const firstFocusable = this.$el.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex=\"-1\"])');
                if (firstFocusable) firstFocusable.focus();
            });
        }, 
        close() { 
            this.show = false; 
            document.body.style.overflow = '';
        },
        trapFocus(e) {
            if (e.key !== 'Tab') return;
            const focusableElements = this.$el.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex=\"-1\"])');
            const firstFocusable = focusableElements[0];
            const lastFocusable = focusableElements[focusableElements.length - 1];
            if (e.shiftKey && document.activeElement === firstFocusable) {
                e.preventDefault();
                lastFocusable.focus();
            } else if (!e.shiftKey && document.activeElement === lastFocusable) {
                e.preventDefault();
                firstFocusable.focus();
            }
        }
    }"
    x-show="show"
    x-cloak
    x-on:keydown.escape.window="show && close()"
    x-on:keydown="trapFocus"
    data-modal="{{ $name }}"
    class="fixed inset-0 z-50 overflow-y-auto"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    aria-labelledby="{{ $name }}-title"
    aria-modal="true"
    role="dialog"
    style="display: none;"
>
    <!-- Backdrop -->
    <div 
        class="fixed inset-0 bg-black bg-opacity-50"
        x-on:click="close()"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        aria-hidden="true"
    ></div>

    <!-- Modal Content -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div 
            class="relative w-full {{ $maxWidth }} transform overflow-hidden rounded-2xl bg-white dark:bg-navy-800 shadow-large"
            x-on:click.stop
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            @if($closeable)
                <button 
                    type="button"
                    class="absolute right-4 top-4 z-10 rounded-lg p-2 text-navy-400 hover:bg-navy-100 hover:text-navy-600 dark:text-navy-500 dark:hover:bg-navy-700 dark:hover:text-navy-300"
                    x-on:click="close()"
                    aria-label="Close modal"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif

            @if(isset($title))
                <div class="border-b border-navy-100 dark:border-navy-700 px-6 py-4">
                    <h3 class="text-lg font-semibold text-navy-900 dark:text-navy-100" id="{{ $name }}-title">
                        {{ $title }}
                    </h3>
                </div>
            @endif

            <div class="p-6">
                {{ $slot }}
            </div>

            @if(isset($footer))
                <div class="border-t border-navy-100 dark:border-navy-700 bg-navy-50 dark:bg-navy-800/50 px-6 py-4 rounded-b-2xl">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>