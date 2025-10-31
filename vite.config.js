import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { glob } from 'glob';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/index.js',
                'resources/js/pages/about.js',
                // Include all images from resources/images directory
                ...glob.sync('resources/images/**/*.{png,jpg,jpeg,gif,svg,webp}'),
            ],
            refresh: true,
        }),
    ],
    build: {
        // Enhanced manifest generation with detailed asset information
        manifest: 'manifest.json',
        outDir: 'public/build',
        assetsDir: 'assets',
        rollupOptions: {
            output: {
                manualChunks: undefined,
                // Ensure consistent asset naming for better caching
                assetFileNames: (assetInfo) => {
                    const info = assetInfo.name.split('.');
                    const ext = info[info.length - 1];
                    
                    // Group assets by type for better organization
                    if (/\.(png|jpe?g|gif|svg|webp|ico)$/i.test(assetInfo.name)) {
                        return `assets/images/[name]-[hash][extname]`;
                    }
                    if (/\.(css)$/i.test(assetInfo.name)) {
                        return `assets/css/[name]-[hash][extname]`;
                    }
                    if (/\.(js)$/i.test(assetInfo.name)) {
                        return `assets/js/[name]-[hash][extname]`;
                    }
                    
                    return `assets/[name]-[hash][extname]`;
                },
            },
        },
    },
    // Ensure assets work with both www and non-www domains
    base: '/',
    server: {
        host: true,
    },
    // Resolve configuration for better asset handling
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources'),
            '@images': path.resolve(__dirname, 'resources/images'),
        },
    },
    // Asset handling configuration
    assetsInclude: ['**/*.png', '**/*.jpg', '**/*.jpeg', '**/*.gif', '**/*.svg', '**/*.webp'],
});
