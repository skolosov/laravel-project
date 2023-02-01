import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue"
import laravel from 'laravel-vite-plugin';
import Components from 'unplugin-vue-components/vite';
import { AntDesignVueResolver } from 'unplugin-vue-components/resolvers';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        Components({
            resolvers: [AntDesignVueResolver()],
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@root': '/resources/js',
            '@images': '/resources/images',
            '@': '/resources/js/components',
            '@pages': '/resources/js/views/pages',
            '@views': '/resources/js/views',
        },
    },
});
