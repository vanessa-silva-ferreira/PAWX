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
        outDir: 'public/build', // Ensure assets go into public/build
        manifest: true, // Generate the manifest file for Laravel
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[name].[hash][extname]', // Organize assets in a subfolder
                chunkFileNames: 'js/[name].[hash].js',
                entryFileNames: 'js/[name].[hash].js',
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/vendor/**', '**/node_modules/**']
        },
        origin: 'http://localhost:3000', // Ensure Vite uses the correct dev server URL
    },
});
