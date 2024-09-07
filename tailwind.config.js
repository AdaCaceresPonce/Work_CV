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

                primary: {
                    DEFAULT: '#689F38',            // Primary color
                    'contrast-1': '#FFFFFF',       // First contrast
                    'contrast-2': '#dafee7',       // Second contrast
                    'contrast-3': '#7ff6ad',       // Third contrast
                    border: '#40e882',             // Primary border color
                },

                secondary: {
                    DEFAULT: '#EDFFEA',            // Secondary color
                    'contrast-1': '#023117',
                    border: '#17d060'        // First contrast for secondary color
                },

                tertiary: {
                    DEFAULT: '#E1E1B7',
                    'contrast-1': '#468189',
                    border: '#CFB53B',
                }
            }
        },
    },

    plugins: [forms, typography],
};
