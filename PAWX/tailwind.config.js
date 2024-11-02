module.exports = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                'custom-light-bg': '#f8fafc',
                'custom-dark-bg': '#1a202c',
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
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
