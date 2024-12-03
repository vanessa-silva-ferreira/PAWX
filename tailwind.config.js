module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
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
    plugins: [],
};


// module.exports = {
//     darkMode: 'class',
//     content: [
//         "./resources/**/*.blade.php",
//         "./resources/**/*.js",
//         "./resources/**/*.vue",
//     ],
//     theme: {
//         extend: {
//             colors: {
//                 'custom-light-bg': '#f8fafc',
//                 'custom-dark-bg': '#1a202c',
//                 'pawx-orange': '#DF6B2C',
//                 'pawx-grey': '#ECECEC',
//                 'pawx-brown': '#322C28',
//             },
//         },
//     },
//     variants: {
//         extend: {
//             backgroundColor: ['dark'],
//             textColor: ['dark'],
//             borderColor: ['dark'],
//         },
//     },
//     plugins: [
//         require('daisyui'),
//         // require('@tailwindcss/forms'),
//         // require('@tailwindcss/typography'),
//     ],
// };
//
//
// module.exports = {
//     mode: 'jit',
//     purge: ['./*.html'],
//     theme: {
//         extend: {},
//     },
//     plugins: [],
// };
