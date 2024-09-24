import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.php.css',
                'resources/js/app.php.js',
            ],
            refresh: true,
        }),
    ],
});
