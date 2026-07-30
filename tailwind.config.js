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
            // Brutalist system — inventory-stencil / manifest-tag aesthetic
            colors: {
                ink:    '#2D2D2D', // softened dark gray for borders/text/structure
                paper:  '#F5F3EB', // slightly lighter, softer paper background
                tag:    '#E8C847', // softened yellow accent
                go:     '#4A9F6D', // softened green
                wire:   '#4A7DB8', // softened blue
                hold:   '#E8C847', // softened yellow (reuses accent)
                signal: '#C45A52', // softened red
            },
            fontFamily: {
                display: ['"Archivo Black"', ...defaultTheme.fontFamily.sans],
                sans: ['"Space Grotesk"', ...defaultTheme.fontFamily.sans],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
            },
            borderWidth: {
                3: '3px',
            },
            boxShadow: {
                'brutal-sm': '3px 3px 0 0 #2D2D2D',
                brutal: '6px 6px 0 0 #2D2D2D',
                'brutal-lg': '10px 10px 0 0 #2D2D2D',
                'brutal-tag': '6px 6px 0 0 #E8C847',
            },
            borderRadius: {
                none: '0px',
                DEFAULT: '0px',
                md: '0px',
                lg: '0px',
                xl: '0px',
                full: '0px',
            },
        },
    },

    plugins: [forms],
};
