let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/css/app.css',
    'public/css/styles.css',
    'public/font-awesome/css/font-awesome.css',
    'public/datatables/datatables.css'
], 'public/css/all.css');

mix.scripts([
    'public/js/app.js',
    'public/js/jquery/lumino.glyphs.js',
    'public/datatables/datatables.js',
    'public/js/jquery-mask/jquery.mask.js'
], 'public/js/all.js');
