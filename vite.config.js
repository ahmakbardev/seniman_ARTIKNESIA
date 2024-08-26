import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        sourcemap: true
    },
    plugins: [
        //     .js("resources/js/theme.js", "public/js/theme.js")
        laravel({
            input: ['resources/css/app.css', 'resources/js/theme.js', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        port: 1264,
    },
});
