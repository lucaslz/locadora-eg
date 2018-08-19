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
    'public/datatables/datatables.css'
], 'public/css/all.css');

mix.scripts([
    'public/js/jquery/jquery-1.11.1.min.js',
    'public/bootstrap-3.3.7/js/bootstrap.js',
    'public/js/jquery/lumino.glyphs.js',
    'public/datatables/datatables.js',
    'public/js/jquery-mask/jquery.mask.js'
], 'public/js/all.js');
