/** @type {import('tailwindcss').Config} */

import tailwind_scrollbar from "tailwind-scrollbar";

export default {
    darkMode: 'class',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './storage/framework/views/*.php',
    ],
    theme: {
        extend: {
            colors: {
                'custom-light-bg': '#f8fafc',
                'custom-dark-bg': '#1a202c',
                'pawx-orange': '#DF6B2C',
                'pawx-grey': '#ECECEC',
                'pawx-brown': '#322C28',
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['dark'],
            textColor: ['dark'],
            borderColor: ['dark'],
        },
    },

    plugins: [
        tailwind_scrollbar,
    ],
};

