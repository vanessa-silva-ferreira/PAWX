module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './storage/framework/views/*.php',
    ],
    theme: {
        extend: {
            colors: {
                'pawx-orange': '#DF6B2C',
                'pawx-grey': '#ECECEC',
                'pawx-brown': '#322C28',
            },
        },
    },


    plugins: [
        require('tailwind-scrollbar'),
    ],
};
