import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Enables dark mode with the 'class' strategy

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'logo-light': '#000000', // Light mode color for the logo
                'logo-dark': '#FFFFFF',  // Dark mode color for the logo
            },
            boxShadow: {
                'lg-dark': '0 10px 15px -3px rgba(0, 0, 0, 0.4), 0 4px 6px -2px rgba(0, 0, 0, 0.3)',
            },
        },
    },

    variants: {
        extend: {
            boxShadow: ['dark'], // Enable dark variant for boxShadow
        },
    },

    plugins: [forms],
};
