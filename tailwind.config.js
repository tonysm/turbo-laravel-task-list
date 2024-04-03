import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import plugin from 'tailwindcss/plugin';

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
            },
            animation: {
                'appear-then-fade-out': 'appear-then-fade-out 3s both',
            },

            keyframes: () => ({
                ['appear-then-fade-out']: {
                    '0%, 100%': { opacity: 0 },
                    '10%, 80%': { opacity: 1 },
                },
            }),
        },
    },

    plugins: [
        forms,
        plugin(function ({ addVariant }) {
            return addVariant('native', ['&.native', '.native &']);
        }),
    ],
};
