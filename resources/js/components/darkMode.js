/**
 * Dark mode toggle with system preference detection
 */

export class DarkMode {
    constructor() {
        this.init();
    }

    init() {
        // Check for saved theme preference or default to system preference
        const savedTheme = localStorage.getItem('theme');
        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        
        this.currentTheme = savedTheme || systemTheme;
        this.applyTheme(this.currentTheme);
        this.bindEvents();
    }

    bindEvents() {
        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem('theme')) {
                this.setTheme(e.matches ? 'dark' : 'light');
            }
        });

        // Bind toggle buttons
        document.querySelectorAll('[data-theme-toggle]').forEach(toggle => {
            toggle.addEventListener('click', () => {
                this.toggle();
            });
        });
    }

    toggle() {
        const newTheme = this.currentTheme === 'light' ? 'dark' : 'light';
        this.setTheme(newTheme);
    }

    setTheme(theme) {
        this.currentTheme = theme;
        localStorage.setItem('theme', theme);
        this.applyTheme(theme);
        this.updateToggleButtons();
        
        // Dispatch custom event for other components
        window.dispatchEvent(new CustomEvent('themeChanged', { 
            detail: { theme } 
        }));
    }

    applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    updateToggleButtons() {
        document.querySelectorAll('[data-theme-toggle]').forEach(toggle => {
            const lightIcon = toggle.querySelector('[data-theme-icon="light"]');
            const darkIcon = toggle.querySelector('[data-theme-icon="dark"]');
            
            if (lightIcon && darkIcon) {
                if (this.currentTheme === 'dark') {
                    lightIcon.classList.remove('hidden');
                    darkIcon.classList.add('hidden');
                } else {
                    lightIcon.classList.add('hidden');
                    darkIcon.classList.remove('hidden');
                }
            }
        });
    }

    getCurrentTheme() {
        return this.currentTheme;
    }

    static init() {
        return new DarkMode();
    }
}

// Auto-initialization removed - handled by app.js