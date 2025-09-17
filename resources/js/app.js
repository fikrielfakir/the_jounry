import './bootstrap';

import Alpine from 'alpinejs';

// Import custom components (removed Modal since it's now pure Alpine.js)
import { AnimationManager } from './components/animations';
import { DarkMode } from './components/darkMode';
import { Toast } from './components/toast';

// Make Alpine available globally
window.Alpine = Alpine;

// Initialize components on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize animation manager
    window.AnimationManager = new AnimationManager();
    
    // Initialize dark mode
    window.DarkMode = DarkMode.init();
    
    // Initialize toast system
    window.Toast = Toast.init();
    
    console.log('UI components initialized successfully');
});

// Start Alpine.js
Alpine.start();
