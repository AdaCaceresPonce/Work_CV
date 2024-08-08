import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                cabin: ['Cabin', 'sans-serif'],
            },

            colors: {
                'primary-color': '#116C36',
                'primary-contrast-color-1': '#FFFFFF',
                'primary-contrast-color-2': '#dafee7',
                'primary-contrast-color-3': '#7ff6ad',

                'secondary-color': '#b7fbd1',
                'secondary-contrast-color-1': '#023117',
            }
        },
    },

    plugins: [forms, typography],
};
