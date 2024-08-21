import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/css/app-tailwind.css',
        'resources/css/filament-base-theme.css',
        'resources/js/filament-base-theme.js',
        'public/css/owl-carousel-custom.css',
        'public/js/owl-carousel-settings.js',
        'public/js/global.js',
        'public/js/parallax.js',
        'public/js/preloader.js',
      ],
      refresh: [
        ...refreshPaths,
        'app/Livewire/**',
      ],
    }),
  ],
});
