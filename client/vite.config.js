import { sveltekit } from '@sveltejs/kit/vite';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [sveltekit()],
  server: {
    host: '0.0.0.0',
    port: 8000,
    proxy: {
      '/api': process.env.BACKEND_URL || 'http://127.0.0.1:8000',
    },
  },
});
