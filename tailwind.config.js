import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
                playfair: ['Playfair Display', ...defaultTheme.fontFamily.serif],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                // Enhanced Navy palette
                navy: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                    950: '#112250',
                },
                // Enhanced Beige/Warm palette
                beige: {
                    50: '#fefdfb',
                    100: '#fdf9f1',
                    200: '#faf2e1',
                    300: '#f5e6c8',
                    400: '#eed5a3',
                    500: '#d8c18d',
                    600: '#c5a873',
                    700: '#a8895c',
                    800: '#8a6f4d',
                    900: '#705c42',
                    950: '#3d3022',
                },
                // Semantic colors
                primary: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                    950: '#112250',
                    DEFAULT: '#112250',
                },
                secondary: {
                    50: '#fefdfb',
                    100: '#fdf9f1',
                    200: '#faf2e1',
                    300: '#f5e6c8',
                    400: '#eed5a3',
                    500: '#d8c18d',
                    600: '#c5a873',
                    700: '#a8895c',
                    800: '#8a6f4d',
                    900: '#705c42',
                    950: '#3d3022',
                    DEFAULT: '#d8c18d',
                },
                // Status colors
                success: {
                    50: '#f0fdf4',
                    100: '#dcfce7',
                    500: '#22c55e',
                    600: '#16a34a',
                    700: '#15803d',
                },
                warning: {
                    50: '#fffbeb',
                    100: '#fef3c7',
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                },
                error: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                },
                info: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                },
            },
            spacing: {
                '18': '4.5rem',
                '88': '22rem',
                '128': '32rem',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            boxShadow: {
                'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                'medium': '0 4px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
                'large': '0 10px 40px -10px rgba(0, 0, 0, 0.1), 0 20px 25px -5px rgba(0, 0, 0, 0.04)',
                'navy': '0 10px 25px -5px rgba(17, 34, 80, 0.1), 0 4px 6px -2px rgba(17, 34, 80, 0.05)',
                'beige': '0 10px 25px -5px rgba(216, 193, 141, 0.2), 0 4px 6px -2px rgba(216, 193, 141, 0.1)',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'fade-in-up': 'fadeInUp 0.5s ease-in-out',
                'fade-in-down': 'fadeInDown 0.5s ease-in-out',
                'fade-out': 'fadeOut 0.3s ease-in-out',
                'slide-in-left': 'slideInLeft 0.5s ease-in-out',
                'slide-in-right': 'slideInRight 0.5s ease-in-out',
                'scale-in': 'scaleIn 0.3s ease-in-out',
                'float': 'float 6s ease-in-out infinite',
                'pulse-soft': 'pulseSoft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeInDown: {
                    '0%': { opacity: '0', transform: 'translateY(-30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeOut: {
                    '0%': { opacity: '1' },
                    '100%': { opacity: '0' },
                },
                slideInLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideInRight: {
                    '0%': { opacity: '0', transform: 'translateX(50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.9)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                pulseSoft: {
                    '0%, 100%': { opacity: '1' },
                    '50%': { opacity: '0.8' },
                },
            },
        },
    },

    plugins: [
        forms,
        function({ addUtilities }) {
            const newUtilities = {
                '.text-balance': {
                    'text-wrap': 'balance',
                },
                '.text-pretty': {
                    'text-wrap': 'pretty',
                },
            }
            addUtilities(newUtilities);
        }
    ],
};
