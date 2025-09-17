import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Include all entry points referenced via @vite in Blade
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/index.js',
                'resources/js/pages/about.js',
            ],
            refresh: true,
        }),
    ],
});
