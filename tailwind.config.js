import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                playfair: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                navy: {
                    50: '#f0f4ff',
                    100: '#e0e8ff',
                    200: '#c7d2fe',
                    300: '#a5b4fc',
                    400: '#818cf8',
                    500: '#6366f1',
                    600: '#4f46e5',
                    700: '#4338ca',
                    800: '#3730a3',
                    900: '#312e81',
                    950: '#112250',
                },
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
                primary: '#112250',
                secondary: '#d8c18d',
            },
        },
    },

    plugins: [forms],
};
