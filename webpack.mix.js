const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix.styles([
    'public/frontend/assets/css/bootstrap.min.css',
    'public/frontend/assets/css/bootstrap-rtl.css',
], 'public/frontend/minified/bootstrap.css');

mix.styles([
    'public/frontend/assets/css/main-rtl.css',
    'public/frontend/assets/css/responsive.css',
], 'public/frontend/minified/style.css');


mix.js([
    'public/js/lazyloading.js',
    'public/js/ajaxReq.js',
    'public/js/favorite.js',
], 'public/frontend/minified/custom.js')