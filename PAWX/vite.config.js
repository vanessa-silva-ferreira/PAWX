import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import glob from 'fast-glob';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...glob.sync('resources/css/**/*.css'),
                ...glob.sync('resources/js/**/*.js'),
            ],
            refresh: true,
        }),
    ],
    // build: {
    //     outDir: 'public/js',
    // },
    server: {
        watch: {
            ignored: ['**/vendor/**', '**/node_modules/**']
        },
    },
});
