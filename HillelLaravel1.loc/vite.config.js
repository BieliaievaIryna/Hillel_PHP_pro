import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/animate.css',
                'resources/css/bootstrap.min.css',
                'resources/css/font-awesome.min.css',
                'resources/css/jquery.fancybox.css',
                'resources/css/style.css',
                'resources/js/jquery.min.js',
                'resources/js/app.js',
                'resources/js/bootstrap.min.js',
                'resources/js/custom.js',
            ],
            refresh: true,
        }),
    ],
});
