import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    // darkMode: "class",
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                //tidak perlu konfigurasi pagination untuk build prject nya agar tidak error
                // "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
            ],
            refresh: true,
        }),
        tailwindcss(),
            {
            safelist: ["bg-blue-100", "bg-red-100", "bg-yellow-100"],
        }
    ],
});
