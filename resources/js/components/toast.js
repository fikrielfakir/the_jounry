/**
 * Toast notification system
 */

export class Toast {
    constructor() {
        this.container = this.createContainer();
        this.toasts = new Map();
        this.init();
    }

    init() {
        document.body.appendChild(this.container);
        this.bindEvents();
    }

    createContainer() {
        const container = document.createElement('div');
        container.className = 'fixed top-4 right-4 z-50 space-y-2 pointer-events-none';
        container.setAttribute('aria-live', 'polite');
        container.setAttribute('aria-atomic', 'true');
        return container;
    }

    bindEvents() {
        // Listen for custom toast events
        document.addEventListener('showToast', (e) => {
            this.show(e.detail.message, e.detail.type, e.detail.duration);
        });
    }

    show(message, type = 'info', duration = 5000) {
        const toast = this.createToast(message, type);
        const toastId = Date.now().toString();
        
        this.toasts.set(toastId, toast);
        this.container.appendChild(toast);

        // Animate in
        requestAnimationFrame(() => {
            toast.classList.add('animate-slide-in-right');
            toast.style.pointerEvents = 'auto';
        });

        // Auto remove
        if (duration > 0) {
            setTimeout(() => {
                this.remove(toastId);
            }, duration);
        }

        return toastId;
    }

    createToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `max-w-md w-full shadow-large rounded-lg pointer-events-auto overflow-hidden transform transition-all duration-300 ${this.getTypeClasses(type)}`;

        const icon = this.getIcon(type);
        
        toast.innerHTML = `
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        ${icon}
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium">${message}</p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button class="rounded-md inline-flex focus:outline-none focus:ring-2 focus:ring-offset-2" data-toast-close>
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `;

        // Bind close button
        const closeButton = toast.querySelector('[data-toast-close]');
        closeButton.addEventListener('click', () => {
            this.removeToast(toast);
        });

        return toast;
    }

    getTypeClasses(type) {
        const classes = {
            success: 'bg-success-50 dark:bg-success-900 text-success-800 dark:text-success-200',
            error: 'bg-error-50 dark:bg-error-900 text-error-800 dark:text-error-200',
            warning: 'bg-warning-50 dark:bg-warning-900 text-warning-800 dark:text-warning-200',
            info: 'bg-info-50 dark:bg-info-900 text-info-800 dark:text-info-200'
        };
        return classes[type] || classes.info;
    }

    getIcon(type) {
        const icons = {
            success: `<svg class="h-6 w-6 text-success-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>`,
            error: `<svg class="h-6 w-6 text-error-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>`,
            warning: `<svg class="h-6 w-6 text-warning-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
            </svg>`,
            info: `<svg class="h-6 w-6 text-info-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>`
        };
        return icons[type] || icons.info;
    }

    remove(toastId) {
        const toast = this.toasts.get(toastId);
        if (toast) {
            this.removeToast(toast);
            this.toasts.delete(toastId);
        }
    }

    removeToast(toast) {
        toast.classList.remove('animate-slide-in-right');
        toast.classList.add('animate-fade-out');
        
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }

    // Static methods for easy usage
    static success(message, duration = 5000) {
        document.dispatchEvent(new CustomEvent('showToast', {
            detail: { message, type: 'success', duration }
        }));
    }

    static error(message, duration = 7000) {
        document.dispatchEvent(new CustomEvent('showToast', {
            detail: { message, type: 'error', duration }
        }));
    }

    static warning(message, duration = 6000) {
        document.dispatchEvent(new CustomEvent('showToast', {
            detail: { message, type: 'warning', duration }
        }));
    }

    static info(message, duration = 5000) {
        document.dispatchEvent(new CustomEvent('showToast', {
            detail: { message, type: 'info', duration }
        }));
    }

    static init() {
        return new Toast();
    }
}

// Auto-initialization removed - handled by app.js