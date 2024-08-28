import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/css/filament-base-theme.css',
        'resources/js/filament-base-theme.js',
        'public/css/owl-carousel-custom.css',
        'public/js/owl-carousel-settings.js',
        'public/js/global.js',
        'public/js/cursor.js',
        'public/js/navbar.js',
        'public/js/button.js',
        'public/js/preloader.js',
        'public/js/cookies.js',
      ],
      refresh: [
        ...refreshPaths,
        'app/Livewire/**',
      ],
    }),
  ],
});
