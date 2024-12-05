import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        rollupOptions: {
            output: {
                assetFileNames: 'images/[name][extname]',
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/vendor/**', '**/node_modules/**']
        },
    },
});
