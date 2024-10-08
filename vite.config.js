import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'; // Importa path desde el módulo de Node.js

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/admin-lte/dist/css/adminlte.min.css',
                'node_modules/admin-lte/dist/js/adminlte.min.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$adminlte': path.resolve(__dirname, 'node_modules/admin-lte'),
        },
    },
});
