const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

// 自動リロード
mix.browserSync({
    proxy: {
        target: 'dev.book',
        ws: true // web socket
    },
    open: true,
    notify: {
        styles: {
            top: 'auto',
            bottom: '0'
        }
    },
    reloadOnRestart: true // BrowserSync起動時にブラウザにリロード命令おくる
});
