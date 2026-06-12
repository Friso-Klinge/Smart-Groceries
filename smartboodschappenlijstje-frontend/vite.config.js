import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/auth.css',
                'resources/css/dashboard.css',
                'resources/css/my-lists.css',
                'resources/css/navigation.css',
                'resources/js/app.js',
                'resources/js/route-map.js',
            ],
            refresh: true,
        }),
    ],
});