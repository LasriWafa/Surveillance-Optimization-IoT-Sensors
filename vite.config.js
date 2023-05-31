import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import tailwindConfig from './tailwind.config.js';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
       
        require('tailwindcss')(tailwindConfig),
        autoprefixer(),
    ],
});
