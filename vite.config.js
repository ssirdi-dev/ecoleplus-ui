import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    build: {
        lib: {
            entry: resolve(__dirname, 'resources/js/index.js'),
            name: 'EcolePlusUi',
            fileName: 'ecoleplus-ui',
        },
        rollupOptions: {
            external: ['alpinejs'],
            output: {
                globals: {
                    alpinejs: 'Alpine',
                },
            },
        },
    },
}); 