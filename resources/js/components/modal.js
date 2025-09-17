/**
 * Modal component with accessibility features
 */

export class Modal {
    constructor(element) {
        this.modal = element;
        this.backdrop = this.modal.querySelector('[data-modal-backdrop]');
        this.closeButtons = this.modal.querySelectorAll('[data-modal-close]');
        this.focusableElements = this.modal.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        this.firstFocusableElement = this.focusableElements[0];
        this.lastFocusableElement = this.focusableElements[this.focusableElements.length - 1];
        
        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        // Close on backdrop click
        if (this.backdrop) {
            this.backdrop.addEventListener('click', (e) => {
                if (e.target === this.backdrop) {
                    this.close();
                }
            });
        }

        // Close on close button click
        this.closeButtons.forEach(button => {
            button.addEventListener('click', () => this.close());
        });

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isOpen()) {
                this.close();
            }
        });

        // Trap focus within modal
        this.modal.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                this.trapFocus(e);
            }
        });
    }

    open() {
        this.modal.classList.remove('hidden');
        this.modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Focus first element
        setTimeout(() => {
            if (this.firstFocusableElement) {
                this.firstFocusableElement.focus();
            }
        }, 100);

        // Add animation classes
        requestAnimationFrame(() => {
            this.modal.classList.add('animate-fade-in');
            const content = this.modal.querySelector('[data-modal-content]');
            if (content) {
                content.classList.add('animate-scale-in');
            }
        });
    }

    close() {
        this.modal.classList.add('hidden');
        this.modal.classList.remove('flex', 'animate-fade-in');
        document.body.style.overflow = '';
        
        const content = this.modal.querySelector('[data-modal-content]');
        if (content) {
            content.classList.remove('animate-scale-in');
        }
    }

    isOpen() {
        return !this.modal.classList.contains('hidden');
    }

    trapFocus(e) {
        if (e.shiftKey) {
            if (document.activeElement === this.firstFocusableElement) {
                this.lastFocusableElement.focus();
                e.preventDefault();
            }
        } else {
            if (document.activeElement === this.lastFocusableElement) {
                this.firstFocusableElement.focus();
                e.preventDefault();
            }
        }
    }

    static init() {
        document.querySelectorAll('[data-modal]').forEach(modal => {
            new Modal(modal);
        });

        // Initialize modal triggers
        document.querySelectorAll('[data-modal-open]').forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = trigger.getAttribute('data-modal-open');
                const modal = document.querySelector(`[data-modal="${modalId}"]`);
                if (modal) {
                    const modalInstance = modal._modalInstance || new Modal(modal);
                    modal._modalInstance = modalInstance;
                    modalInstance.open();
                }
            });
        });
    }
}

// Auto-initialize
document.addEventListener('DOMContentLoaded', () => {
    Modal.init();
});